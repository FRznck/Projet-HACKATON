<?php
session_start();

// Connexion à la base de données
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Vérification de la session
if (!isset($_SESSION['id'])) {
    header("Location: connexion-recruteur.php");
    exit();
}

// Publier une offre
if (isset($_POST['publier_offre'])) {
    $id_recruteur = $_SESSION['id'];
    $titre = mysqli_real_escape_string($id, $_POST['titre']);
    $competences = mysqli_real_escape_string($id, $_POST['competences']);
    $type_contrat = mysqli_real_escape_string($id, $_POST['type_contrat']);
    $duree = mysqli_real_escape_string($id, $_POST['duree']);
    $salaire = mysqli_real_escape_string($id, $_POST['salaire']);
    $description = mysqli_real_escape_string($id, $_POST['description']);
    $lieu = mysqli_real_escape_string($id, $_POST['lieu']);

    $requete = "
        INSERT INTO offres (id_recruteur, titre, competences_requises, type_contrat, duree, salaire, description, lieu, date_publication)
        VALUES ('$id_recruteur', '$titre', '$competences', '$type_contrat', '$duree', '$salaire', '$description', '$lieu', NOW())";

    if (mysqli_query($id, $requete)) {
        echo "<script>alert('Offre publiée avec succès.');</script>";
        header("Location: dashboard-recruteur.php");
        exit();
    } else {
        echo "<script>alert('Erreur lors de la publication de l\'offre : " . mysqli_error($id) . "');</script>";
    }
}

// Supprimer une offre
if (isset($_GET['supprimer_offre'])) {
    $id_offre = mysqli_real_escape_string($id, $_GET['supprimer_offre']);
    $id_recruteur = $_SESSION['id']; // Assure-toi que 'id' est bien défini dans $_SESSION

    $requete = "DELETE FROM offres WHERE id_offre = '$id_offre' AND id_recruteur = '$id_recruteur'";
    
    if (mysqli_query($id, $requete)) {
        // Utilise uniquement header() pour rediriger, sans echo avant
        header("Location: dashboard-recruteur.php?message=offre_supprimee");
        exit();
    } else {
        echo "<script>alert('Erreur lors de la suppression de l\\'offre : " . mysqli_error($id) . "');</script>";
    }
}


// Modifier une offre
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_offre'])) {
    $id_recruteur = $_SESSION['nom_entreprise'];
   // $id_recruteur = $_SESSION['id'];
    $id_offre = mysqli_real_escape_string($id, $_POST['id_offre']);
    $titre = mysqli_real_escape_string($id, $_POST['titre']);
    $description = mysqli_real_escape_string($id, $_POST['description']);
    $lieu = mysqli_real_escape_string($id, $_POST['lieu']);
    $salaire = mysqli_real_escape_string($id, $_POST['salaire']);
    $type_contrat = mysqli_real_escape_string($id, $_POST['type_contrat']);
    $duree = mysqli_real_escape_string($id, $_POST['duree']);
    $competences = mysqli_real_escape_string($id, $_POST['competences']);

    $sql = "
        UPDATE offres
        SET titre = '$titre', description = '$description', lieu = '$lieu', salaire = '$salaire', 
            type_contrat = '$type_contrat', duree = '$duree', competences_requises = '$competences'
        WHERE id_offre = '$id_offre' AND id_recruteur = '{$_SESSION['id']}'
    ";

    if (mysqli_query($id, $sql)) {
        echo "<script>alert('Offre modifiée avec succès !');</script>";
        header("Location: dashboard-recruteur.php");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($id);
    }
}

// Récupérer les offres publiées
$sql_offres = "SELECT * FROM offres WHERE id_recruteur = ?";
$stmt_offres = $id->prepare($sql_offres);
$stmt_offres->bind_param("i", $_SESSION['id']);
$stmt_offres->execute();
$result_offres = $stmt_offres->get_result();
$offres = [];
while ($row = $result_offres->fetch_assoc()) {
    $offres[] = $row;
}

// Récupérer les candidatures reçues
$sql_candidatures = "
    SELECT c.*, o.titre AS offre
    FROM candidatures c
    JOIN offres o ON c.id_offre = o.id_offre
    WHERE o.id_recruteur = ?
";
$stmt_candidatures = $id->prepare($sql_candidatures);
$stmt_candidatures->bind_param("i", $_SESSION['id']);
$stmt_candidatures->execute();
$result_candidatures = $stmt_candidatures->get_result();
$candidatures = [];
while ($row = $result_candidatures->fetch_assoc()) {
    $candidatures[] = $row;
}
// Récupérer les messages premium
$sql_messages = "
    SELECT m.id_message, m.contenu, m.date_envoi, c.nom AS candidat_nom, c.email AS candidat_email, c.id AS id_candidat
    FROM messages m
    JOIN candidats c ON m.id_expediteur = c.id
    WHERE m.id_destinataire = ?
    ORDER BY m.date_envoi DESC
";
$stmt_messages = $id->prepare($sql_messages);
$stmt_messages->bind_param("i", $_SESSION['id']);
$stmt_messages->execute();
$result_messages = $stmt_messages->get_result();
$messages = [];
while ($row = $result_messages->fetch_assoc()) {
    $messages[] = $row;
}

// Répondre à un message premium
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['repondre_message'])) {
    $id_candidat = mysqli_real_escape_string($id, $_POST['id_candidat']);
    $reponse = mysqli_real_escape_string($id, $_POST['reponse']);
    $id_recruteur = $_SESSION['id'];

    $sql_reponse = "
        INSERT INTO messages (id_expediteur, id_destinataire, contenu, date_envoi)
        VALUES ('$id_recruteur', '$id_candidat', '$reponse', NOW())
    ";

    if (mysqli_query($id, $sql_reponse)) {
        echo "<script>alert('Réponse envoyée avec succès.');</script>";
        header("Location: dashboard-recruteur.php");
        exit();
    } else {
        echo "<script>alert('Erreur lors de l\'envoi de la réponse : " . mysqli_error($id) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tableau de Bord Recruteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard-recruteur-CSS/styles.css"/>
</head>
<body>
    <nav class="navbar fixed-top custom-top-bar">
        <div class="container-fluid">
            <h1 class="navbar-brand fs-3 fw-medium mb-0">Tableau de Bord Recruteur</h1>
            <a href="deconnexion.php" class="btn btn-outline-dark">Déconnexion</a>
        </div>
    </nav>
    <main class="container-fluid" style="margin-top: 100px;">
        <!-- Ajouter une Offre -->
        <section class="py-5">
            <div class="container">
                <h2 class="h1 text-center mb-5">Publier une offre</h2>
                <form class="row g-4" method="POST">
                    <div class="col-md-6">
                        <label for="titre" class="form-label">Titre de l'offre</label>
                        <input type="text" id="titre" name="titre" class="form-control" placeholder="Entrez le titre de l'offre" required>
                    </div>
                    <div class="col-md-6">
                        <label for="competences" class="form-label">Compétences requises</label>
                        <input type="text" id="competences" name="competences" class="form-control" placeholder="Entrez les compétences requises" required>
                    </div>
                    <div class="col-md-6">
                        <label for="type_contrat" class="form-label">Type de contrat</label>
                        <select id="type_contrat" name="type_contrat" class="form-select" required>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                            <option value="Stage">Stage</option>
                            <option value="Apprentissage">Contrat d'apprentissage</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="duree" class="form-label">Durée</label>
                        <input type="text" id="duree" name="duree" class="form-control" placeholder="Exemple : 6 mois">
                    </div>
                    <div class="col-md-6">
                        <label for="salaire" class="form-label">Salaire</label>
                        <input type="number" id="salaire" name="salaire" class="form-control" placeholder="Exemple : 2500" step="0.01">
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Entrez la description de l'offre" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="lieu" class="form-label">Lieu</label>
                        <input type="text" id="lieu" name="lieu" class="form-control" placeholder="Entrez le lieu de travail" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="publier_offre" class="btn btn-dark btn-lg">Publier l'offre</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Offres Publiées -->
        <section class="row justify-content-center mb-5">
            <div class="col-12 col-lg-10">
                <h2 class="section-title mb-4">Offres Publiées</h2>
                <div class="row g-4">
                    <?php if (!empty($offres)): ?>
                        <?php foreach ($offres as $offre): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="job-card">
                                    <h3><?= htmlspecialchars($offre['titre']); ?></h3>
                                    <p class="text-muted"><?= htmlspecialchars($offre['description']); ?></p>
                                    <p><strong>Lieu :</strong> <?= htmlspecialchars($offre['lieu']); ?></p>
                                    <p><strong>Salaire :</strong> <?= htmlspecialchars($offre['salaire'] ? $offre['salaire'] . ' €' : 'Non précisé'); ?></p>
                                    <p class="text-muted"><small>Publié le : <?= htmlspecialchars($offre['date_publication']); ?></small></p>
                                    <form method="GET" class="mt-2">
                                        <input type="hidden" name="supprimer_offre" value="<?= $offre['id_offre']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modifierOffreModal<?= $offre['id_offre']; ?>">Modifier</button>
                                    </div>
                            </div>

                                    

                        <!-- Modal Modifier Offre -->
                        <div class="modal fade" id="modifierOffre<?= $offre['id_offre']; ?>" tabindex="-1" aria-labelledby="modifierOffreLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modifierOffreLabel">Modifier l'Offre</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_offre" value="<?= $offre['id_offre']; ?>">
                                                <div class="form-group">
                                                    <label>Titre</label>
                                                    <input type="text" class="form-control" name="titre" value="<?= htmlspecialchars($offre['titre']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="description" rows="4" required><?= htmlspecialchars($offre['description']); ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Lieu</label>
                                                    <input type="text" class="form-control" name="lieu" value="<?= htmlspecialchars($offre['lieu']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Salaire</label>
                                                    <input type="text" class="form-control" name="salaire" value="<?= htmlspecialchars($offre['salaire']); ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" name="modifier_offre" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">Aucune offre publiée pour le moment.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Affichage des candidatures reçues -->
<section class="row justify-content-center mb-5">
    <div class="col-12 col-lg-10">
        <h2 class="section-title mb-4">Candidatures Reçues</h2>
        <div class="row g-4">
            <?php if (!empty($candidatures)): ?>
                <?php foreach ($candidatures as $candidature): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="candidate-card d-flex gap-3">
                            <div>
                                <h3><?= htmlspecialchars($candidature['nom'] ?? 'Nom inconnu'); ?></h3>
                                <p class="text-muted mb-0"><?= htmlspecialchars($candidature['email'] ?? 'Email non dispo'); ?></p>
                                <p><strong>Postulé pour :</strong> <?= htmlspecialchars($candidature['offre'] ?? 'Offre inconnue'); ?></p>
                                <p><strong>Date de candidature :</strong> <?= htmlspecialchars($candidature['date_candidature'] ?? 'Non précisée'); ?></p>

                                <form method="POST" action="update-statut.php">
                                    <input type="hidden" name="id_utilisateur" value="<?= htmlspecialchars($candidature['id_utilisateur']); ?>">
                                    <input type="hidden" name="id_offre" value="<?= htmlspecialchars($candidature['id_offre']); ?>">

                                    <label for="statut">Statut :</label>
                                    <select name="statut" class="form-select mb-2">
                                        <option value="En attente" <?= ($candidature['statut'] ?? '') === 'En attente' ? 'selected' : '' ?>>🟡 En attente</option>
                                        <option value="Acceptée" <?= ($candidature['statut'] ?? '') === 'Acceptée' ? 'selected' : '' ?>>🟢 Acceptée</option>
                                        <option value="Refusée" <?= ($candidature['statut'] ?? '') === 'Refusée' ? 'selected' : '' ?>>🔴 Refusée</option>
                                        <option value="Entretien planifié" <?= ($candidature['statut'] ?? '') === 'Entretien planifié' ? 'selected' : '' ?>>📩 Entretien planifié</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Mettre à jour</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune candidature reçue pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>


        <!-- Messages Premium -->
        <section class="row justify-content-center mb-5">
            <div class="col-12 col-lg-10">
                <h2 class="section-title mb-4">Messages Premium Reçus</h2>
                <?php if (!empty($messages)): ?>
                    <div class="accordion" id="messagesAccordion">
                        <?php foreach ($messages as $index => $message): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $index; ?>">
                                    <button class="accordion-button <?= $index > 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index; ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false'; ?>" aria-controls="collapse<?= $index; ?>">
                                        Message de <?= htmlspecialchars($message['candidat_nom']); ?> (<?= htmlspecialchars($message['candidat_email']); ?>)
                                    </button>
                                </h2>
                                <div id="collapse<?= $index; ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : ''; ?>" aria-labelledby="heading<?= $index; ?>" data-bs-parent="#messagesAccordion">
                                    <div class="accordion-body">
                                        <p><strong>Message :</strong> <?= htmlspecialchars($message['contenu']); ?></p>
                                        <p><strong>Envoyé le :</strong> <?= htmlspecialchars($message['date_envoi']); ?></p>
                                        <form method="POST" action="dashboard-recruteur.php">
                                            <input type="hidden" name="id_candidat" value="<?= $message['id_candidat']; ?>">
                                            <div class="mb-3">
                                                <label for="reponse" class="form-label">Votre réponse :</label>
                                                <textarea id="reponse" name="reponse" class="form-control" rows="3" required></textarea>
                                            </div>
                                            <button type="submit" name="repondre_message" class="btn btn-primary">Envoyer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-center">Aucun message reçu pour le moment.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>