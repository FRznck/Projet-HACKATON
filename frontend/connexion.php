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
        <!-- Hero Section -->
        <section class="custom-hero">
            <div class="container text-center py-5">
                <h1 class="display-4 mb-4">Connexion à votre compte</h1>
                <p class="lead mb-5">Accédez à votre espace personnel et commencez votre expérience.</p>
                <a href="index.php" class="btn btn-outline-light btn-lg">Retour à l'accueil</a>
            </div>
        </section>

        <!-- Formulaire Connexion -->
        <section class="py-5 form-section">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Connexion Utilisateur</h2>
                <form class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Entrez votre email" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="col-12 d-flex gap-3 justify-content-center">
                        <button type="submit" id="submit" class="btn btn-dark">Se connecter</button>
                        <a href="index.php" class="btn btn-outline-dark">Créer un compte</a>
                        <div class="input">

                </div>
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
