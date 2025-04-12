<?php
session_start();

// Connexion à la base de données
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    die("Accès non autorisé. Veuillez vous connecter.");
}

$email = $_SESSION['email'];

// Récupérer les informations de l'utilisateur
$sql = "SELECT id_utilisateur, nom, prenom, email, mot_de_passe, role, profil_linkedin, competences, cv_url, avatar, type_contrat, disponibilite
        FROM utilisateurs
        WHERE email = '$email'";
$result = mysqli_query($id, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    die("Utilisateur non trouvé.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Mon Profil</h2>

    <div class="mb-3">
        <!-- Avatar -->
        <img src="avatars/<?= $user['avatar'] ?: 'default-avatar.png' ?>" alt="Avatar" style="width:150px;" class="rounded-circle border">
    </div>

    <!-- Infos en lecture seule -->
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['nom']) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Prénom</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['prenom']) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Role</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['role']) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Profil LinkedIn</label>
            <input type="url" class="form-control" value="<?= htmlspecialchars($user['profil_linkedin']) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Type de contrat</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['type_contrat']) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Disponibilité</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['disponibilite']) ?>" readonly>
        </div>
        <div class="col-md-12">
            <label class="form-label">Compétences</label>
            <textarea class="form-control" rows="3" readonly><?= htmlspecialchars($user['competences']) ?></textarea>
        </div>
        <?php if ($user['cv_url']) : ?>
            <div class="col-md-12 mt-3">
                <a href="cv/<?= htmlspecialchars($user['cv_url']) ?>" class="btn btn-outline-secondary" target="_blank">Voir le CV</a>
            </div>
        <?php endif; ?>
    

    <!-- Boutons -->
    <div class="mt-4">
        <a href="parametres-candidat.php" class="btn btn-primary">Modifier mon profil</a>
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
    </div>
</div>
</body>
</html>
