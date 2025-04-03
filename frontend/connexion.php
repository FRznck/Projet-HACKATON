<?php
// Connexion à la base de données
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
session_start();

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($id, $_POST['email']);
    $mot_de_passe = mysqli_real_escape_string($id, $_POST['password']);

    // Vérification des informations de connexion
    $req = "SELECT * FROM utilisateurs WHERE email = '$email'";
    $res = mysqli_query($id, $req);

    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);

        // Vérification du mot de passe
        if ($mot_de_passe === $user['mot_de_passe']) { // Remplacez par `password_verify` si les mots de passe sont hachés
            $_SESSION['user'] = $user;
            echo "<script>alert('Connexion réussie.');</script>";
            header("Location: dashboard.php"); // Redirigez vers une page tableau de bord
            exit();
        } else {
            echo "<script>alert('Mot de passe incorrect.');</script>";
        }
    } else {
        echo "<script>alert('Aucun compte trouvé avec cet email.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-5">
    <h2 class="text-center">Connexion</h2>
    <form action="connexion.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required />
      </div>
      <div class="text-center">
        <button type="submit" name="login" class="btn btn-primary">Se connecter</button>
      </div>
    </form>
  </div>
</body>

</html>