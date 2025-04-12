<?php
session_start();
if(isset($_POST["bout"])){
    $email = $_POST["email"];
    $mot_de_passe = $_POST["password"];
    //                   ad serv    user   mdp   BDD
    $id = mysqli_connect("localhost", "root", "", "hackathon");
    $req = "select * from utilisateurs where email='$email' and mot_de_passe='$mot_de_passe'";

$res = mysqli_query($id,$req);
    if(mysqli_num_rows($res) > 0){
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["prenom"] = $ligne["prenom"];
        $_SESSION["email"] = $ligne["email"];
        $_SESSION["role"] = $ligne["role"];
       
        echo "<h3>Connexion réussie, vous allez être redirigé....";

        // Redirection après la connexion
        header("Location: accueil.php");
        exit();
    } else {
        // Si la connexion échoue
        echo "<script>alert('Erreur de connexion, veuillez réessayer.');</script>";
    }

    // Fermer la connexion à la base de données
    mysqli_close($id);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - Plateforme de Recrutement Intelligent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index-CSS/styles.css">
    <script type="module" src="js/connexion.js" defer></script>
</head>
<body>
    <main class="container-fluid px-0">
        <section class="custom-hero">
            <div class="container text-center py-5">
                <h1 class="display-4 mb-4">Connexion à votre compte</h1>
                <p class="lead mb-5">Accédez à votre espace personnel et commencez votre expérience.</p>
                <a href="index.php" class="btn btn-outline-light btn-lg">Retour à l'accueil</a>
            </div>
        </section>

        <section class="py-5 form-section">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Connexion Utilisateur</h2>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="" class="row g-3">

                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" name="bout" class="btn btn-dark">Se connecter</button>
                        <a href="index.php" class="btn btn-outline-dark">Créer un compte</a>
                    </div>
                </form>
            </div>
        </section>

        <footer class="bg-light py-4 mt-5">
            <div class="container text-center">
                <p class="mb-0">© 2022 Plateforme de Recrutement Intelligent. Tous droits réservés.</p>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
