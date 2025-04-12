<?php
session_start();

// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "hackathon");
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Requête SQL pour récupérer toutes les offres
$sql_offres = "
    SELECT o.*, e.nom_entreprise, o.competences_requises
    FROM offres o
    LEFT JOIN entreprise e ON o.id_entreprise = e.id
    ORDER BY o.date_publication DESC
";

$resultat_offres = mysqli_query($conn, $sql_offres);

// Traitement du formulaire d'inscription
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    $profil_linkedin = $_POST['profil_linkedin'];
    $disponibilite = $_POST['disponibilite'];
    $type_contrat = $_POST['type_contrat'];
    $competences = $_POST['competence'];

    // Vérifier si l'email existe déjà
    $verif = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE email = '$email'");
    if (mysqli_num_rows($verif) > 0) {
        echo "<h3>Le mail est déjà utilisé...</h3>";
        exit();
    }

    // Générer un nouvel ID utilisateur
    $res_max_id = mysqli_query($conn, "SELECT MAX(id_utilisateur) AS maxi FROM utilisateurs");
    $ligne = mysqli_fetch_assoc($res_max_id);
    $newId = $ligne['maxi'] + 1;

    // Créer les dossiers si besoin
    if (!is_dir('uploads/photos')) mkdir('uploads/photos', 0777, true);
    if (!is_dir('uploads/cv')) mkdir('uploads/cv', 0777, true);

// Gestion avatar (photo de profil)
$avatar = "";
if (isset($_FILES['photo_profil']) && $_FILES['photo_profil']['error'] === 0) {
    $ext = pathinfo($_FILES['photo_profil']['name'], PATHINFO_EXTENSION);
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array(strtolower($ext), $allowed_ext)) {
        $avatar = $newId . '.' . $ext;
        move_uploaded_file($_FILES['photo_profil']['tmp_name'], "uploads/photos/$avatar");
    } else {
        echo "<h3>Extension de photo non autorisée !</h3>";
        exit();
    }
}


// Gestion du CV
$cv_url = "";
if (isset($_FILES['cv']) && $_FILES['cv']['error'] === 0) {
    $ext_cv = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
    $allowed_cv_ext = ['pdf', 'doc', 'docx'];
    if (in_array(strtolower($ext_cv), $allowed_cv_ext)) {
        $cv_url = $newId . '.' . $ext_cv;
        move_uploaded_file($_FILES['cv']['tmp_name'], "uploads/cv/$cv_url");
    } else {
        echo "<h3>Extension de CV non autorisée !</h3>";
        exit();
    }
}


// Créer le mot de passe sécurisé
$mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

// Insertion des données avec le mot de passe haché
$sql_insert = "INSERT INTO utilisateurs (
    id_utilisateur, nom, prenom, email, mot_de_passe, profil_linkedin, competences, cv_url, avatar, disponibilite, type_contrat
) VALUES (
    '$newId', '$nom', '$prenom', '$email', '$mot_de_passe_hash', '$profil_linkedin', '$competences', '$cv_url', '$avatar', '$disponibilite', '$type_contrat'
)";



    if (mysqli_query($conn, $sql_insert)) {
        $_SESSION['message'] = "<h3>Inscription réussie !</h3>";
        header("Location: connexion.php");
        exit();
    } else {
        echo "<h3>Erreur : " . mysqli_error($conn) . "</h3>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plateforme de Recrutement Intelligent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index-CSS/styles.css">
    <script type="module" src="js/inscription.js" defer></script>
</head>

<body>
    <main class="container-fluid px-0">
        <!-- Hero Section -->
        <section class="custom-hero">
        <div class="container text-center py-5">
            <h1 class="display-4 mb-4">Bienvenue sur notre Plateforme de Recrutement Intelligent</h1>
            <p class="lead mb-5">Trouvez l'emploi de vos rêves ou le candidat idéal en toute simplicité.</p>
            <div class="d-flex justify-content-center gap-3">
                <?php if (!isset($_SESSION['user'])): ?>
                    <a href="inscription.php" class="btn btn-dark btn-lg">S'inscrire</a>
                    <a href="connexion.php" class="btn btn-outline-dark btn-lg">Se connecter</a>
                <?php else: ?>
                    <a href="dashboard-<?php echo $_SESSION['user']['role']; ?>.php" class="btn btn-dark btn-lg">Mon Tableau de Bord</a>
                    <a href="deconnexion.php" class="btn btn-outline-dark btn-lg">Se Déconnecter</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

        <!-- Toutes les Offres -->
        <section class="py-5">
        <div class="container">
            <h2 class="text-center display-5 mb-5">Toutes les Offres</h2>
            <div class="row g-4">
                <?php if (mysqli_num_rows($resultat_offres) > 0): ?>
                    <?php while ($offre = mysqli_fetch_assoc($resultat_offres)): ?>
                        <div class="col-md-4">
                            <article class="job-card">
                                <div class="icon-wrapper mb-3">💼</div>
                                <h3><?= htmlspecialchars($offre['titre']); ?></h3>
                                <p class="text-muted"><?= htmlspecialchars($offre['description']); ?></p>
                                <p><strong>Type de contrat :</strong> <?= htmlspecialchars($offre['type_contrat']); ?></p>
                                <p><strong>Disponibilité :</strong> <?= htmlspecialchars($offre['disponibilite'] ?? 'Non précisée'); ?></p>
                                <p><strong>Durée :</strong> <?= htmlspecialchars($offre['duree'] ?? 'Non précisée'); ?></p>
                                <p><strong>Lieu :</strong> <?= htmlspecialchars($offre['lieu']); ?></p>
                                <p><strong>Compétences requises :</strong> <?= htmlspecialchars($offre['competences_requises'] ?? 'Non spécifiées'); ?></p>
                                <p><strong>Date de publication :</strong> <?= htmlspecialchars(date('d/m/Y', strtotime($offre['date_publication']))); ?></p>
                                <p><strong>Entreprise :</strong> <?= htmlspecialchars($offre['entreprise'] ?? 'Non précisée'); ?></p>
                                <p><strong>Salaire :</strong> <?= htmlspecialchars($offre['salaire'] ? $offre['salaire'] . ' €' : 'Non précisé'); ?></p>
                                <a href="postuler.php?id_offre=<?= $offre['id_offre']; ?>" class="btn btn-primary mt-3">Postuler</a>
                            </article>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center">Aucune offre disponible pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
        <!-- Connexion/Inscription -->
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Connexion ou Inscription</h2>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6">
                        <a href="connexion.php" class="text-decoration-none">
                            <div class="card h-100 text-center p-4">
                                <div class="icon-wrapper mx-auto mb-3">👤</div>
                                <h3>Candidat</h3>
                                <p class="text-muted">Trouvez l'emploi de vos rêves</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="inscription-recruteur.php" class="text-decoration-none">
                            <div class="card h-100 text-center p-4">
                                <div class="icon-wrapper mx-auto mb-3">💼</div>
                                <h3>Recruteur</h3>
                                <p class="text-muted">Trouvez les meilleurs talents</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulaire Inscription -->
<section class="py-5 form-section">
    <div class="container">
        <h2 class="text-center display-5 mb-5">Inscription Candidat </h2>
        <form class="row g-4" method="POST" enctype="multipart/form-data">
            
            <div class="col-md-6">
                <label class="form-label">Nom </label>
                <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Prénom </label>
                <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prénom" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
            </div>

            <div class="col-12">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="col-12">
                        <label for="description" class="form-label">competences</label>
                        <textarea id="competence" name="competence" class="form-control" rows="4" placeholder="Entrez vos competences" required></textarea>
            </div>
            
            <div class="col-12">
                <label class="form-label">Profil LinkedIn</label>
                <input type="url" class="form-control" name="profil_linkedin" placeholder="Entrez l'URL de votre profil LinkedIn" required>
            </div>
            
            <div class="col-12">
                <label class="form-label">CV</label>
                <input type="file" class="form-control" name="cv" accept=".pdf, .doc, .docx" required>
            </div>
            
            <div class="col-12">
                <label class="form-label">Photo de profil</label>
                <input type="file" class="form-control" name="photo_profil" accept="image/*" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Disponibilité</label>
                <select class="form-select" name="disponibilite" required>
                    <option value="">Choisir...</option>
                    <option value="immédiate">Immédiate</option>
                    <option value="1 mois">Dans 1 mois</option>
                    <option value="2 mois">Dans 2 mois</option>
                    <option value="3 mois ou plus">Dans 3 mois ou plus</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Type de contrat recherché</label>
                <select class="form-select" name="type_contrat" required>
                    <option value="">Choisir...</option>
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="Alternance">Alternance</option>
                    <option value="Stage">Stage</option>
                </select>
            </div>

            <div class="col-12 d-flex gap-3 justify-content-center">
                <button type="submit" name="submit" class="btn btn-dark">Créer un compte</button>
                <button type="button" class="btn btn-outline-dark">
                    <a href="connexion.php" style="text-decoration: none;">Se connecter ?</a>
                </button>
                
                <div class="input">
                    <button class="btn btn-light btn-lg d-flex align-items-center shadow-sm border rounded-pill px-4 py-2" id="google-login-btn">
                        <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google Logo" class="me-2" width="24" height="24">
                        <span class="">S'inscrire avec Google</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

        <!-- Section Premium -->
        <section class="py-5 bg-dark text-white">
            <div class="container text-center">
                <h2 class="display-5 mb-4">Fonctionnalités Premium</h2>
                <p class="lead mb-5">Passez à la version premium pour des avantages exclusifs</p>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="premium-card">
                            <div class="p-4 bg-light text-dark">
                                <h3>Badge Premium</h3>
                                <div class="badge bg-primary mb-3">À partir de 9,99 $/mois</div>
                                <h4>Abonnement Premium</h4>
                                <p class="text-muted">Débloquez toutes les fonctionnalités</p>
                                <div class="fs-1">💎</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-light py-4">
            <div class="container text-center">
                <p class="mb-0">© 2022 Plateforme de Recrutement Intelligent. Tous droits réservés.</p>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>