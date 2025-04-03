<?php
// Connexion à la base de données
$id = mysqli_connect("localhost", "root", "", "hackathon");
if (!$id) {
    echo("Erreur de connexion : " . mysqli_connect_error());
}
session_start();

// Création du dossier uploads s'il n'existe pas
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if (isset($_POST['bout'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    $role = $_POST['role'];
    $profil_linkedin = $_POST['linkedin'];
    $competences = isset($_POST['competences']) ? $_POST['competences'] : '';

    // Vérification si le mail existe déjà
    $req = "SELECT * FROM utilisateurs WHERE email = '$email'";
    $res = mysqli_query($id, $req);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('L\\'email existe déjà.');</script>";
    } else {
        // Gestion de l'upload du CV
        $cv_name = $_FILES['cv']['name'];
        $cv_tmp_name = $_FILES['cv']['tmp_name'];
        $cv_destination = 'uploads/' . basename($cv_name);
        if (move_uploaded_file($cv_tmp_name, $cv_destination)) {
            // Gestion de l'upload de la photo de profil
            $photo_name = $_FILES['profile_picture']['name'];
            $photo_tmp_name = $_FILES['profile_picture']['tmp_name'];
            $photo_destination = 'uploads/' . basename($photo_name);
            
            if (move_uploaded_file($photo_tmp_name, $photo_destination)) {
                // Insertion des données dans la base de données
                $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, profil_linkedin, competences, cv_url, photo_profil_url)
                        VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', '$role', '$profil_linkedin', '$competences', '$cv_destination', '$photo_destination')";
                
                if (mysqli_query($id, $sql)) {
                    $_SESSION['message'] = 'Inscription réussie.';
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<script>alert('Erreur : " . addslashes(mysqli_error($id)) . "');</script>";
                }
            } else {
                echo "<script>alert('Erreur lors de l\\'upload de la photo de profil.');</script>";
            }
        } else {
            echo "<script>alert('Erreur lors de l\\'upload du CV.');</script>";
        }
    }
}

// Fermeture de la connexion
mysqli_close($id);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plateforme de Recrutement Intelligent</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="index-CSS/globals.css" />
  <link rel="stylesheet" href="index-CSS/styles.css" />
</head>

<body>
  <main class="wireframe">
    <section class="section">
      <div class="container text-center py-5">
        <h1 class="title">Bienvenue sur notre Plateforme de Recrutement Intelligent</h1>
        <p class="description">Trouvez l'emploi de vos rêves ou le candidat idéal en toute simplicité.</p>
        <button class="button">
          <div class="primary"><span class="text-wrapper">S'inscrire</span></div>
        </button>
      </div>
    </section>
    <section class="div">
      <div class="container-2">
        <h2 class="title-2">Offres en Vedette</h2>
      </div>
      <div class="list">
        <div class="row">
          <article class="article">
            <div class="image-container">
              <div class="image" role="img" aria-label="Image d'emploi"></div>
            </div>
            <div class="frame">
              <h3 class="title-3">Ingénieur Logiciel Senior</h3>
              <p class="subtitle">Rejoignez une équipe technique dynamique et travaillez sur des projets innovants.</p>
              <div class="selection">
                <span class="badge bg-secondary"><span class="label-text">Temps plein</span></span>
                <span class="badge bg-secondary"><span class="label-text">Télétravail</span></span>
              </div>
            </div>
          </article>
          <article class="article-2">
            <div class="image-container">
              <div class="image" role="img" aria-label="Image d'emploi"></div>
            </div>
            <div class="frame">
              <h3 class="title-3">Spécialiste Marketing</h3>
              <p class="subtitle">Créez des campagnes marketing percutantes pour une marque mondiale.</p>
              <div class="selection">
                <span class="badge bg-secondary"><span class="label-text">Temps partiel</span></span>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="image-container">
              <div class="image" role="img" aria-label="Image d'emploi"></div>
            </div>
            <div class="frame">
              <h3 class="title-3">Responsable des Ressources Humaines</h3>
              <p class="subtitle">Dirigez les stratégies d'acquisition de talents pour une entreprise en croissance.</p>
              <div class="selection">
                <span class="badge bg-secondary"><span class="label-text">Temps plein</span></span>
              </div>
            </div>
          </article>
        </div>
      </div>
      <img class="img" src="https://c.animaapp.com/m8vd57wcKtDQSX/img/vector-200.svg" alt="Vecteur décoratif" />
    </section>
    <section class="div-2">
      <div class="container-3">
        <h2 class="title-4">Connexion ou Inscription</h2>
      </div>
      <div class="list-2">
        <div class="div-wrapper">
          <div class="item">
            <div class="icon-wrapper" aria-hidden="true">
              <div class="icon">👤</div>
            </div>
            <div class="frame-2">
              <h3 class="title-5">Candidat</h3>
              <p class="subtitle-2">Trouvez l'emploi de vos rêves</p>
            </div>
            <img class="vector-2" src="https://c.animaapp.com/m8vd57wcKtDQSX/img/vector-200.svg"
              alt="Vecteur décoratif" />
          </div>
        </div>
        <div class="div-wrapper">
          <div class="item">
            <div class="icon-wrapper" aria-hidden="true">
              <div class="icon">💼</div>
            </div>
            <div class="frame-2">
              <h3 class="title-5">Recruteur</h3>
              <p class="subtitle-2">Trouvez les meilleurs talents</p>
            </div>
            <img class="vector-2" src="https://c.animaapp.com/m8vd57wcKtDQSX/img/vector-200.svg"
              alt="Vecteur décoratif" />
          </div>
        </div>
      </div>
      <img class="vector-3" src="https://c.animaapp.com/m8vd57wcKtDQSX/img/vector-200.svg" alt="Vecteur décoratif" />
    </section>

    <section class="div">
      <div class="container-2">
        <h2 class="title-2">Inscription Utilisateur</h2>
        <p class="p">Créez votre compte pour accéder à toutes les fonctionnalités</p>
      </div>
      <form class="list-3" action="index.php" method="POST" enctype="multipart/form-data">
  <div class="row-2">
    <div class="input">
      <label for="name" class="title-6">Nom</label>
      <input type="text" id="name" name="nom" class="form-control" placeholder="Entrez votre nom" required />
    </div>
    <div class="input">
      <label for="prenom" class="title-6">Prenom</label>
      <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Entrez votre prenom" required />
    </div>
    <div class="input">
      <label for="email" class="title-6">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email" required />
    </div>
  </div>
  <div class="row-2">
    <div class="input">
      <label for="password" class="title-6">Mot de passe</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required />
    </div>
  </div>
  <div class="row-2">
    <div class="input">
      <label for="linkedin" class="title-6">Profil LinkedIn</label>
      <input type="url" id="linkedin" name="linkedin" class="form-control" placeholder="Entrez l'URL de votre profil LinkedIn" required />
    </div>
  </div>
  <div class="row-2">
    <div class="input">
        <label for="competences" class="title-6">Compétences</label>
        <input type="text" id="competences" name="competences" class="form-control" placeholder="Listez vos compétences" />
    </div>
</div>
  <div class="row-2">
    <div class="input">
      <label for="cv" class="title-6">CV</label>
      <input type="file" id="cv" name="cv" class="form-control" accept=".pdf, .doc, .docx" required />
    </div>
  </div>
  <div class="row-2">
    <div class="input">
      <label for="profile-picture" class="title-6">Photo de profil</label>
      <input type="file" id="profile-picture" name="profile_picture" class="form-control" accept="image/*" required />
    </div>
  </div>
  <div class="selection-2">
    <span class="title-6">Rôle</span>
    <div class="chip-group">
      <label class="chip">
        <input type="radio" name="role" value="candidate" class="visually-hidden" required />
        <span class="text-2">Candidat</span>
      </label>
      <label class="chip">
        <input type="radio" name="role" value="recruiter" class="visually-hidden" required />
        <span class="text-2">Recruteur</span>
      </label>
      <label class="chip-2">
        <input type="radio" name="role" value="admin" class="visually-hidden" required />
        <span class="text-2">Admin</span>
      </label>
    </div>
  </div>
  <div class="button-2">
    <button type="submit" name="bout" class="title-wrapper"><span class="text-wrapper">Créer un compte</span></button>
</div>
<div class="container text-center py-3">
  <button class="btn btn-primary" onclick="window.location.href='connexion.php'">Se connecter</button>
</div>
</form>
    </section>
    <section class="div-2">
      <div class="container-3">
        <h2 class="title-4">Fonctionnalités Premium</h2>
        <p class="description-2">Passez à la version premium pour des avantages exclusifs</p>
      </div>
      <div class="row-wrapper">
        <div class="div-wrapper">
          <div class="card">
            <div class="image-wrapper">
              <div class="image">
                <h3 class="title-8">Badge Premium</h3>
                <div class="tag"><span class="text-3">À partir de 9,99 $/mois</span></div>
              </div>
            </div>
            <div class="text-content">
              <h4 class="title-9">Abonnement Premium</h4>
              <p class="subtitle-3">Débloquez toutes les fonctionnalités</p>
              <div class="icon-buttons" aria-hidden="true"><span class="icon-2">💎</span></div>
            </div>
          </div>
        </div>
      </div>
      <img class="vector-5" src="https://c.animaapp.com/m8vd57wcKtDQSX/img/vector-200.svg" alt="Vecteur décoratif" />
    </section>
    <section class="div-2">
      <div class="image-container-2">
        <div class="image-2">
          <p class="title-10">Passez à la version Premium pour une expérience de recrutement améliorée.</p>
          <div class="pagination" aria-label="Navigation du diaporama">
            <span class="rectangle" aria-current="true"></span>
            <span class="rectangle-2"></span>
            <span class="rectangle-2"></span>
            <span class="rectangle-2"></span>
          </div>
        </div>
      </div>
      <img class="vector-6" src="https://c.animaapp.com/m8vd57wcKtDQSX/img/vector-200.svg" alt="Vecteur décoratif" />
    </section>
    <footer class="container-wrapper">
      <div class="container-4">
        <p class="title-11">© 2022 Plateforme de Recrutement Intelligent. Tous droits réservés.</p>
      </div>
    </footer>
  </main>
</body>

</html>