<?php
session_start();
$id = mysqli_connect("localhost", "root", "", "hackathon");

if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit();
}

$email = $_SESSION['email'];

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['save_profil'])) {
    $nom_complet = mysqli_real_escape_string($conn, $_POST['nom_complet']);
    $email_user = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = mysqli_real_escape_string($conn, $_POST['telephone']);
    $localisation = mysqli_real_escape_string($conn, $_POST['localisation']);
    $titre = mysqli_real_escape_string($conn, $_POST['titre']);
    $secteur = mysqli_real_escape_string($conn, $_POST['secteur']);
    $experience = intval($_POST['experience']);
    $competences = mysqli_real_escape_string($conn, $_POST['competences']);
    $type_contrat = implode(',', $_POST['type_contrat'] ?? []);
    $disponibilite = implode(',', $_POST['disponibilite'] ?? []);
    $salaire = mysqli_real_escape_string($conn, $_POST['salaire']);

    // Gestion du fichier CV
    if ($_FILES['cv']['error'] == 0) {
        $cv_name = basename($_FILES['cv']['name']);
        move_uploaded_file($_FILES['cv']['tmp_name'], "cv/$cv_name");
    }

    // Mise à jour dans la base de données
    $update = "UPDATE utilisateurs SET nom = '$nom_complet', email = '$email_user', telephone = '$tel',
                localisation = '$localisation', titre = '$titre', secteur = '$secteur', experience = $experience,
                competences = '$competences', type_contrat = '$type_contrat', disponibilite = '$disponibilite',
                salaire = '$salaire'";

    if (isset($cv_name)) {
        $update .= ", cv_url = '$cv_name'";
    }

    $update .= " WHERE email = '$email'";

    mysqli_query($id, $update);

    // 🔒 Mise à jour du mot de passe et 2FA
if (isset($_POST['update_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $enable_2fa = isset($_POST['enable_2fa']) ? 1 : 0;

    if ($new_password === $confirm_password && !empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $query = "UPDATE utilisateurs SET mot_de_passe = '$hashed_password', double_facteur = '$enable_2fa' WHERE email = '$email'";
        mysqli_query($conn, $query);
        echo "<script>alert('Mot de passe mis à jour avec succès.');</script>";
    } else {
        echo "<script>alert('Les mots de passe ne correspondent pas ou sont vides.');</script>";
    }
}

    // Gestion de la désactivation et suppression du compte
    if (isset($_POST['deactivate_account'])) {
        $deactivate_query = "UPDATE utilisateurs SET actif = 0 WHERE email = '$email'";
        mysqli_query($id, $deactivate_query);
        echo "<script>alert('Votre compte a été désactivé.');</script>";
    }

    if (isset($_POST['delete_account'])) {
        $delete_query = "DELETE FROM utilisateurs WHERE email = '$email'";
        mysqli_query($id, $delete_query);
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paramètres Candidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="parametres-candidat-CSS/styles.css">
    <style>
    
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="bg-secondary bg-opacity-10 rounded-circle me-3" style="width: 40px; height: 40px;"></div>
                <a class="navbar-brand fw-medium fs-4" href="#">Plateforme de Recrutement Intelligente</a>
            </div>
            <div class="d-flex align-items-center gap-4">
                <a href="accueil.php" class="text-dark text-decoration-none">Accueil</a>
                <span class="text-dark">Paramètres du compte</span>
            </div>
        </div>
    </nav>

    <main class="container pt-5 mt-5">
        <!-- En-tête -->
        <section class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-4">Paramètres du compte</h1>
            <hr class="mx-auto mb-5" style="width: 95%;">
        </section>

        <!-- Section Profil -->
        <section class="settings-section">
            <div class="row align-items-center mb-5">
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="avatar-upload">
                        <span class="fs-4 text-muted">📷</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <h2 class="form-section-title">Informations Personnelles</h2>
                    <form class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Photo de profil</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nom complet</label>
                            <input type="text" class="form-control" placeholder="Jean Dupont">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" placeholder="jean.dupont@email.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" placeholder="+33 6 12 34 56 78">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Localisation</label>
                            <input type="text" class="form-control" placeholder="Ville, Pays">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Section Professionnelle -->
        <section class="settings-section">
            <h2 class="form-section-title">Informations Professionnelles</h2>
            <form class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Titre professionnel</label>
                    <input type="text" class="form-control" placeholder="Développeur Full Stack, Alternance Développeur Web">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Secteur d'activité</label>
                    <select class="form-select">
                        <option>Choisissez un secteur</option>
                        <option>Informatique</option>
                        <option>Marketing</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Expérience (années)</label>
                    <input type="number" class="form-control" placeholder="5">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Compétences clés</label>
                    <input type="text" class="form-control" placeholder="JavaScript, React, Node.js">
                </div>
                <div class="col-12">
                    <label class="form-label">CV & Lettre de motivation</label>
                    <input type="file" class="form-control" accept=".pdf,.doc,.docx">
                </div>
                <div class="col-12">
                    <button class="btn btn-secondary">Enregistrer</button>
                </div>
            </form>
        </section>

        <!-- Section Préférences -->
        <section class="settings-section">
            <h2 class="form-section-title">Préférences de Recherche</h2>
            <form class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Type de contrat</label>
                    <select class="form-select" multiple size="3">
                        <option>CDI</option>
                        <option>CDD</option>
                        <option>Stage</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Disponibilité</label>
                    <select class="form-select" multiple size="3">
                        <option>Immédiate</option>
                        <option>En recherche active</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Salaire souhaité</label>
                    <input type="text" class="form-control" placeholder="45k€ - 55k€">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Notifications</label>
                    <input type="text" class="form-control" placeholder="Préférences">
                </div>
                <div class="col-12">
                    <button class="btn btn-secondary">Enregistrer</button>
                </div>
            </form>
        </section>
<!-- Section Sécurité -->
<section class="settings-section">
    <h2 class="form-section-title">Sécurité</h2>
    <form method="POST" class="row g-4">
        <div class="col-md-6">
            <label class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" name="new_password">
        </div>
        <div class="col-md-6">
            <label class="form-label">Confirmation</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="enable_2fa" id="2faCheck">
                <label class="form-check-label" for="2faCheck">Authentification à deux facteurs</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="update_password" type="submit">Mettre à jour la sécurité</button>
            <button class="btn btn-warning" name="deactivate_account" type="submit">Désactiver le compte</button>
            <button class="btn btn-danger" name="delete_account" type="submit">Supprimer le compte</button>
        </div>
    </form>
</section>


        <!-- Section Notifications
        <section class="settings-section">
            <h2 class="form-section-title">Notifications</h2>
            <form method="POST" class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Notifications par e-mail</label>
                    <input type="text" class="form-control" placeholder="Préférences">
                </div>
            </form>
        </section>  -->
                

        <!-- Boutons de validation -->
        <div class="text-center py-5">
            <button class="btn btn-success btn-lg px-5">Enregistrer tout</button>
            <div class="mt-3">
                <a href="dashboard-candidat.html" class="text-decoration-none">← Retour au tableau de bord</a>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>