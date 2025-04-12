<?php
session_start();

// Vérifier si l'utilisateur est connecté

if (!isset($_SESSION['email'])) {
   //$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header("Location: connexion.php");
    exit();
}


$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

//$candidat_id = $_SESSION['user']['id_utilisateur'];

// Récupérer les candidatures
$sql = "SELECT offres.titre, offres.salaire, offres.secteur, candidatures.statut 
        FROM candidatures
        INNER JOIN offres ON candidatures.id_offre = offres.id_offre
        WHERE candidatures.id_candidat = ?";
$stmt = mysqli_prepare($id, $sql);
mysqli_stmt_bind_param($stmt, 'i', $candidat_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$candidatures = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

// Message de retour (optionnel)
$message = '';
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 'success':
            $message = "✅ Votre candidature a été envoyée avec succès.";
            break;
        case 'already_applied':
            $message = "⚠️ Vous avez déjà postulé à cette offre.";
            break;
        case 'error':
            $message = "❌ Une erreur s'est produite. Veuillez réessayer.";
            break;
    }

$nom_rh = mysqli_real_escape_string($conn, $_POST['nom_rh']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$id_candidat = $_SESSION['user']['id_utilisateur'];

// Pour cet exemple, on enregistre juste dans une table "messages"
$sql = "INSERT INTO messages (id_candidat, nom_rh, contenu) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iss", $id_candidat, $nom_rh, $message);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($ok) {
    header("Location: dashboard-candidat.php?message=success_message");
} else {
    header("Location: dashboard-candidat.php?message=error_message");
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Candidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white sticky-top border-bottom">
    <div class="container">
        <h1 class="navbar-brand fs-4">Tableau de bord Candidat</h1>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="accueil.php" class="nav-link">Accueil</a></li>
            <li class="nav-item"><a href="Page-ai.php" class="nav-link">Découvrez l'IA</a></li>
            <li class="nav-item"><a href="parametres-candidat.php" class="nav-link">Paramètres</a></li>
        </ul>
    </div>
</nav>

<main class="container py-4">
    <?php if ($message): ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <section class="mb-5">
    <h2 class="h3 mb-4">Candidatures envoyées</h2>
    <div class="row g-4">
        <?php if (!empty($candidatures)): ?>
            <?php foreach ($candidatures as $candidature): ?>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5><?= htmlspecialchars($candidature['titre']) ?></h5>

                            <?php
                            $statut = $candidature['statut'];
                            // Définir les couleurs des badges selon le statut
                            switch ($statut) {
                                case 'Acceptée':
                                    $badge_color = '🟢'; // Vert pour "Acceptée"
                                    break;
                                case 'Refusée':
                                    $badge_color = '🔴'; // Rouge pour "Refusée"
                                    break;
                                case 'Entretien planifié':
                                    $badge_color = '🟡'; // Jaune pour "Entretien planifié"
                                    break;
                                default:
                                    $badge_color = '🟡'; // Jaune pour "En attente"
                            }

                            $date = date("d/m/Y", strtotime($candidature['date_candidature']));
                            ?>

                        <span class="badge <?= $candidature['statut'] == 'Acceptée' ? 'bg-success' : ($candidature['statut'] == 'Refusée' ? 'bg-danger' : 'bg-warning') ?>">
                                <?= htmlspecialchars($candidature['statut']) ?>
                        </span>

                            <p class="mt-2 mb-0"><strong>Entreprise :</strong> <?= htmlspecialchars($candidature['entreprise']) ?></p>
                            <p class="mb-0 text-muted">Candidaté le <?= $date ?></p>
                            <p class="mb-0 text-muted"><strong>Salaire :</strong> <?= htmlspecialchars($candidature['salaire']) ?> €</p>
                            <p class="mb-0 text-muted"><strong>Secteur :</strong> <?= htmlspecialchars($candidature['secteur']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune candidature envoyée.</p>
        <?php endif; ?>
    </div>
</section>

    <section>
    <h2 class="h3 mb-4">Contacter le recruteur</h2>

    <?php if ($_SESSION['user']['premium']): ?>
        <form class="row g-3" action="envoyer_message.php" method="post">
            <div class="col-12">
                <label class="form-label">Nom du RH ou de l'entreprise</label>
                <input type="text" name="nom_rh" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="4" required></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Envoyer le message</button>
            </div>
        </form>
    <?php else: ?>
        <form class="row g-3">
            <div class="col-12">
                <label class="form-label">Nom du RH ou de l'entreprise</label>
                <input type="text" class="form-control" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">Message</label>
                <textarea class="form-control" rows="4" disabled></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-secondary" disabled>Premium requis</button>
            </div>
        </form>
    <?php endif; ?>
</section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
