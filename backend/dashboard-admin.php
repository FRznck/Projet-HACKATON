<?php
session_start();
// Connexion à la base de données
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Vérifiez si l'utilisateur est un admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: connexion.php");
    exit();
}

// Ajouter un utilisateur
if (isset($_POST['ajouter_utilisateur'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role =  $_POST['role'];
    $mot_de_passe = password_hash("default_password", PASSWORD_BCRYPT); // Mot de passe par défaut

    $requete = "INSERT INTO utilisateurs (nom, email, role, mot_de_passe) VALUES ('$nom', '$email', '$role', '$mot_de_passe')";
    if (mysqli_query($id, $requete)) {
        echo "<script>alert('Utilisateur ajouté avec succès.');</script>";
        header("Location: dashboard-admin.php");
        exit();
    } else {
        echo "<script>alert('Erreur lors de l\'ajout de l\'utilisateur : " . mysqli_error($id) . "');</script>";
    }
}

// Modifier un utilisateur
if (isset($_POST['modifier_utilisateur'])) {
    $id_utilisateur = $_POST['id_utilisateur'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role =  $_POST['role'];

    $requete = "UPDATE utilisateurs SET nom = '$nom', email = '$email', role = '$role' WHERE id_utilisateur = '$id_utilisateur'";
    if (mysqli_query($id, $requete)) {
        echo "<script>alert('Utilisateur modifié avec succès.');</script>";
        header("Location: dashboard-admin.php");
        exit();
    } else {
        echo "<script>alert('Erreur lors de la modification de l\'utilisateur : " . mysqli_error($id) . "');</script>";
    }
}

// Supprimer un utilisateur
if (isset($_GET['supprimer_utilisateur'])) {
    $id_utilisateur = $_GET['supprimer_utilisateur'];
    $requete = "DELETE FROM utilisateurs WHERE id_utilisateur = '$id_utilisateur'";
    if (mysqli_query($id, $requete)) {
        echo "<script>alert('Utilisateur supprimé avec succès.');</script>";
        header("Location: dashboard-admin.php");
        exit();
    } else {
        echo "<script>alert('Erreur lors de la suppression de l\'utilisateur : " . mysqli_error($id) . "');</script>";
    }
}

// Publier une offre
if (isset($_POST['publier_offre'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $competences = $_POST['competences'];
    $date_publication = date('Y-m-d');

    $requete = "INSERT INTO offres (titre, description, competences_requises, date_publication) 
                VALUES ('$titre', '$description', '$competences', '$date_publication')";
    if (mysqli_query($id, $requete)) {
        echo "<script>alert('Offre publiée avec succès.');</script>";
        header("Location: dashboard-admin.php");
        exit();
    } else {
        echo "<script>alert('Erreur lors de la publication de l\'offre : " . mysqli_error($id) . "');</script>";
    }
}

// Supprimer une offre
if (isset($_GET['supprimer_offre'])) {
    $id_offre = $_GET['supprimer_offre'];
    $requete = "DELETE FROM offres WHERE id_offre = '$id_offre'";
    if (mysqli_query($id, $requete)) {
        echo "<script>alert('Offre supprimée avec succès.');</script>";
        header("Location: dashboard-admin.php");
        exit();
    } else {
        echo "<script>alert('Erreur lors de la suppression de l\'offre : " . mysqli_error($id) . "');</script>";
    }
}

// Récupérer les utilisateurs
$sql_utilisateurs = "SELECT id_utilisateur, nom, email, role FROM utilisateurs";
$resultat_utilisateurs = mysqli_query($id, $sql_utilisateurs);

// Récupérer les offres
$sql_offres = "SELECT id_offre, titre, description, competences_requises, date_publication FROM offres";
$resultat_offres = mysqli_query($id, $sql_offres);
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tableau de bord Admin - Plateforme de recrutement intelligente</title>
    <link rel="stylesheet" href="dashboard-admin-CSS/globals.css" />
    <link rel="stylesheet" href="dashboard-admin-CSS/styles.css" />
  </head>
  <body>
    <div class="frame">
      <header class="top-bar">
        <div class="rectangle" role="img" aria-label="Logo"></div>
        <h1 class="title">Tableau de bord Admin</h1>
        <nav class="navbar">
          <a href="#" class="tab">Tableau de bord Admin</a>
          <a href="#" class="tab">Gestion des utilisateurs</a>
          <a href="#" class="tab">Publication d'offres</a>
          <a href="#" class="tab">Suivi des paiements</a>
        </nav>
      </header>
      <main>
        <!-- Gestion des utilisateurs -->
        <section class="div-2">
          <h2 class="title-3">Gestion des utilisateurs</h2>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($utilisateur = mysqli_fetch_assoc($resultat_utilisateurs)) { ?>
                <tr>
                  <td><?php echo $utilisateur['id_utilisateur']; ?></td>
                  <td><?php echo $utilisateur['nom']; ?></td>
                  <td><?php echo $utilisateur['email']; ?></td>
                  <td><?php echo $utilisateur['role']; ?></td>
                  <td>
                    <a href="dashboard-admin.php?supprimer_utilisateur=<?php echo $utilisateur['id_utilisateur']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </section>

        <!-- Publication d'offres -->
        <section class="div-2">
          <h2 class="title-3">Publier une offre</h2>
          <form action="dashboard-admin.php" method="POST">
            <div class="row-2">
              <div class="input-2">
                <label for="titre" class="title-5">Titre de l'offre</label>
                <input id="titre" name="titre" class="textfield-2" type="text" placeholder="Entrez le titre de l'offre" required />
              </div>
              <div class="input-2">
                <label for="description" class="title-5">Description</label>
                <textarea id="description" name="description" class="textfield-2" rows="4" placeholder="Entrez la description de l'offre" required></textarea>
              </div>
              <div class="input-2">
                <label for="competences" class="title-5">Compétences requises</label>
                <input id="competences" name="competences" class="textfield-2" type="text" placeholder="Entrez les compétences requises" required />
              </div>
            </div>
            <button type="submit" name="publier_offre" class="button">
              <span class="primary">Publier l'offre</span>
            </button>
          </form>
        </section>

        <!-- Liste des offres -->
        <section class="div-2">
          <h2 class="title-3">Offres d'emploi actives</h2>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Compétences</th>
                <th>Date de publication</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($offre = mysqli_fetch_assoc($resultat_offres)) { ?>
                <tr>
                  <td><?php echo $offre['id_offre']; ?></td>
                  <td><?php echo $offre['titre']; ?></td>
                  <td><?php echo $offre['description']; ?></td>
                  <td><?php echo $offre['competences_requises']; ?></td>
                  <td><?php echo $offre['date_publication']; ?></td>
                  <td>
                    <a href="dashboard-admin.php?supprimer_offre=<?php echo $offre['id_offre']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </section>
      </main>
      <footer class="section-4">
        <div class="container-5">
          <p class="title-9">Plateforme de recrutement intelligente | © 2021 Tous droits réservés</p>
        </div>
      </footer>
    </div>
  </body>
</html>