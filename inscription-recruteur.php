<?php
// Connexion à la base de données
session_start();

// Connexion à la base de données
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_entreprise = $id->real_escape_string($_POST['companyName']);
    $contact_rh = $id->real_escape_string($_POST['contactName']);
    $email_professionnel = $id->real_escape_string($_POST['professionalEmail']);
    $telephone = $id->real_escape_string($_POST['phoneNumber']);
    $mot_de_passe = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hachage du mot de passe
    $secteur_activite = $id->real_escape_string($_POST['industry']);
    $taille_entreprise = $id->real_escape_string($_POST['companySize']);
    $adresse_siege = $id->real_escape_string($_POST['headquartersAddress']);
    $disponibilite = 

    // Préparer la requête SQL
    $sql = "INSERT INTO entreprise (nom_entreprise, contact_rh, email_professionnel, telephone, mot_de_passe, secteur_activite, taille_entreprise, adresse_siege)
            VALUES ('$nom_entreprise', '$contact_rh', '$email_professionnel', '$telephone', '$mot_de_passe', '$secteur_activite', '$taille_entreprise', '$adresse_siege', now())";

    // Exécuter la requête
    if ($id->query($sql) === TRUE) {
        echo "<script>alert('Compte créé avec succès !');</script>";
        header("Location: connexion-recruteur.php"); // Rediriger vers la page de connexion
        exit();
    } else {
        echo "Erreur : " . $sql . "<br>" . $id->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace recruteur - Plateforme de Recrutement Intelligent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index-CSS/styles.css">
</head>
<body>
    <main class="container-fluid px-0">
        <!-- Hero Section -->
        <section class="custom-hero">
            <div class="container text-center py-5">
                <h1 class="display-4 mb-4">Espace Recruteur</h1>
                <p class="lead mb-5">On s'efface quand vous entrez en scène, <strong>à vous de jouer.</strong></p>
                <a href="index.php" class="btn btn-outline-light btn-lg">Retour à l'accueil</a>
            </div>
        </section>

        <!-- Formulaire Création de Compte Entreprise -->
        <section class="py-5 form-section">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Création de Compte Entreprise</h2>
                <form class="row g-4" method="POST" action="">
                    <div class="col-md-6">
                        <label class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" name="companyName" placeholder="Entrez le nom de l'entreprise" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nom/prénom du contact RH</label>
                        <input type="text" class="form-control" name="contactName" placeholder="Entrez le nom et prénom du contact RH" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email professionnel</label>
                        <input type="email" class="form-control" name="professionalEmail" placeholder="Entrez l'email professionnel" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Numéro de téléphone</label>
                        <input type="tel" class="form-control" name="phoneNumber" placeholder="Entrez le numéro de téléphone" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Entrez un mot de passe" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Secteur d'activité</label>
                        <input type="text" class="form-control" name="industry" placeholder="Entrez le secteur d'activité" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Taille de l'entreprise</label>
                        <input type="text" class="form-control" name="companySize" placeholder="Entrez la taille de l'entreprise" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Adresse du siège</label>
                        <input type="text" class="form-control" name="headquartersAddress" placeholder="Entrez l'adresse du siège" required>
                    </div>
                    <div class="col-12 d-flex gap-3 justify-content-center">
                        <button type="submit" class="btn btn-dark">Créer un compte</button>
                        <a href="connexion-recruteur.php" class="btn btn-outline-dark btn-lg">Se connecter</a>
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-light py-4 mt-5">
            <div class="container text-center">
                <p class="mb-0">© 2022 Plateforme de Recrutement Intelligent. Tous droits réservés.</p>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>