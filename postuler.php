<?php

session_start();
if (!isset($_SESSION['email'])) {
   // $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header("Location: connexion.php");
    exit();
}




$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

//if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'candidat') {
//    header("Location: connexion.php");
//    exit();
//}

$id_offre = isset($_GET['id_offre']) ? intval($_GET['id_offre']) : 0;

$sql_offre = "SELECT * FROM offres WHERE id_offre = '$id_offre'";
$resultat_offre = mysqli_query($id, $sql_offre);
if (!$resultat_offre || mysqli_num_rows($resultat_offre) === 0) {
    echo "<script>alert('Offre introuvable.');</script>";
    header("Location: dashboard-candidat.php");
    exit();
}
$offre = mysqli_fetch_assoc($resultat_offre);

$id_candidat = $_SESSION['user']['id_utilisateur'];
$message_confirmation = "";

// Gérer la candidature
if (isset($_POST['postuler'])) {
    $lettre_motivation = mysqli_real_escape_string($id, $_POST['lettre_motivation']);
    $date_candidature = date("Y-m-d H:i:s");

    $cv_filename = null;
    $lettre_filename = null;

    // Upload du CV
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $cv_tmp = $_FILES['cv']['tmp_name'];
        $cv_filename = 'uploads/cv_' . time() . '_' . basename($_FILES['cv']['name']);
        move_uploaded_file($cv_tmp, $cv_filename);
    }

    // Upload de la lettre de motivation
    if (isset($_FILES['lettre_fichier']) && $_FILES['lettre_fichier']['error'] === UPLOAD_ERR_OK) {
        $lettre_tmp = $_FILES['lettre_fichier']['tmp_name'];
        $lettre_filename = 'uploads/lettre_' . time() . '_' . basename($_FILES['lettre_fichier']['name']);
        move_uploaded_file($lettre_tmp, $lettre_filename);
    }

    // Vérifie si déjà postulé
    $verif_candidature = "SELECT * FROM candidatures WHERE id_candidat = '$id_candidat' AND id_offre = '$id_offre'";
    $resultat_verif = mysqli_query($id, $verif_candidature);

    if (mysqli_num_rows($resultat_verif) > 0) {
        $message_confirmation = "⚠️ Vous avez déjà postulé à cette offre.";
    } else {
        $requete_candidature = "
            INSERT INTO candidatures (id_candidat, id_offre, lettre_motivation, cv_fichier, lettre_fichier, date_candidature)
            VALUES ('$id_candidat', '$id_offre', '$lettre_motivation', '$cv_filename', '$lettre_filename', '$date_candidature')
        ";

        if (mysqli_query($id, $requete_candidature)) {
            $message_confirmation = "✅ Votre candidature a été envoyée avec succès !";
            // Redirection vers le tableau de bord
            //header("Location: dashboard-candidat.php");
            //exit();
        } else {
            $message_confirmation = "❌ Erreur : " . mysqli_error($id);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postuler à une offre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container py-5">
        <h1 class="h3 mb-4">Postuler à l'offre : <?php echo htmlspecialchars($offre['titre']); ?></h1>
        <div class="mb-4">
            <h2 class="h5">Détails de l'offre</h2>
            <p><strong>Compétences requises :</strong> <?php echo htmlspecialchars($offre['competences_requises']); ?></p>
            <p><strong>Description :</strong> <?php echo htmlspecialchars($offre['description']); ?></p>
        </div>

        <!-- Affichage du message de confirmation -->
        <?php if (!empty($message_confirmation)): ?>
            <div class="alert alert-info">
                <?php echo htmlspecialchars($message_confirmation); ?>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="lettre_motivation" class="form-label">Lettre de motivation (texte)</label>
        <textarea id="lettre_motivation" name="lettre_motivation" class="form-control" rows="5" placeholder="Écrivez ici..." required></textarea>
    </div>

    <div class="mb-3">
        <label for="cv" class="form-label">Télécharger votre CV (PDF)</label>
        <input type="file" name="cv" class="form-control" accept=".pdf">
    </div>

    <div class="mb-3">
        <label for="lettre_fichier" class="form-label">Lettre de motivation (PDF)</label>
        <input type="file" name="lettre_fichier" class="form-control" accept=".pdf">
    </div>

    <button type="submit" name="postuler" class="btn btn-primary">Envoyer ma candidature</button>
</form>

    </main>
</body>
</html>