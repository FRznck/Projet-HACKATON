<?php
session_start();

// Connexion à la base de données
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $id->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe dans la base de données
    $sql = "SELECT * FROM entreprise WHERE email_professionnel = ?";
    $stmt = $id->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $user['mot_de_passe'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom_entreprise'] = $user['nom_entreprise'];
            $_SESSION['email_professionnel'] = $user['email_professionnel'];
            $_SESSION['role'] = $user['role'];

            cho "<h3>Connexion réussie, vous allez être redirigé....";
            // Rediriger vers le tableau de bord
            header("Location: dashboard-recruteur.php");
            exit();
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Aucun compte trouvé avec cet email.";
    }
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
</head>
<body>
    <main class="container-fluid px-0">
        <!-- Hero Section -->
        <section class="custom-hero">
            <div class="container text-center py-5">
                <h1 class="display-4 mb-4">Espace Recruteur</h1>
                <p class="lead mb-5">Le terrain est prêt, <strong>à vous de jouer.</strong></p>
                <a href="index.php" class="btn btn-outline-light btn-lg">Retour à l'accueil</a>
            </div>
        </section>

        <!-- Formulaire Connexion -->
        <section class="py-5 form-section">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Vos talents vous attendent !</h2>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger text-center"><?= htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <form class="row g-4" method="POST" action="">
                    <div class="col-md-6">
                        <label class="form-label">Email professionnel</label>
                        <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="col-12 d-flex gap-3 justify-content-center">
                        <button type="submit" class="btn btn-dark">Se connecter</button>
                        <a href="inscription-recruteur.php" class="btn btn-outline-dark">Créer un compte</a>
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