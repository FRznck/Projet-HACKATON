<?php
session_start();
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$offre_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($offre_id > 0) {
    $sql = "SELECT * FROM offres WHERE id_offre = ?";
    $stmt = mysqli_prepare($id, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $offre_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $offre = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
} else {
    $offre = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'offre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php if ($offre): ?>
        <h1><?= htmlspecialchars($offre['titre']) ?></h1>
        
        <?php if (!empty($offre['description'])): ?>
            <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($offre['description'])) ?></p>
        <?php endif; ?>
        
        <?php if (!empty($offre['competences_requises'])): ?>
            <p><strong>Compétences requises :</strong> <?= htmlspecialchars($offre['competences_requises']) ?></p>
        <?php endif; ?>
        
        <?php if (!empty($offre['type_contrat'])): ?>
            <p><strong>Type de contrat :</strong> <?= htmlspecialchars($offre['type_contrat']) ?></p>
        <?php endif; ?>
        
        <?php if (!empty($offre['lieu'])): ?>
            <p><strong>Lieu :</strong> <?= htmlspecialchars($offre['lieu']) ?></p>
        <?php endif; ?>
        
        <?php if (!empty($offre['salaire'])): ?>
            <p><strong>Salaire :</strong> <?= htmlspecialchars($offre['salaire']) ?></p>
        <?php endif; ?>
        
        <?php if (!empty($offre['date_publication'])): ?>
            <p><strong>Date de publication :</strong> <?= htmlspecialchars($offre['date_publication']) ?></p>
        <?php endif; ?>
        
        <?php if (!empty($offre['entreprise_nom'])): ?>
            <p><strong>Entreprise :</strong> <?= htmlspecialchars($offre['entreprise_nom']) ?></p>
        <?php endif; ?>

        <a href="postuler.php?id=<?= $offre['id_offre'] ?>" class="btn btn-primary">Postuler</a>
    <?php else: ?>
        <div class="alert alert-danger">Offre introuvable.</div>
    <?php endif; ?>
</div>
</body>
</html>
