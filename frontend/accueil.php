<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Plateforme de Recrutement Intelligente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="accueil-CSS/styles.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="accueil.php">
        <div class="logo-custom me-2" role="img" aria-label="Logo de la plateforme"></div>
        <span class="h4 mb-0">Plateforme de Recrutement Intelligente</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
        aria-controls="mainNavbar" aria-expanded="false" aria-label="Basculer la navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="accueil.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Page-ai.php">Découvrez l'IA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard-candidat.php">Mes suivis</a>
          </li>
        </ul>

        <form class="d-flex ms-lg-3" role="search">
          <input class="form-control" type="search" placeholder="Rechercher sur le site" aria-label="Rechercher">
          <button class="btn btn-outline-secondary ms-2" type="submit" aria-label="Rechercher">Rechercher</button>
        </form>
      </div>
    </div>
  </nav>


  <main class="mt-5 pt-5">

    <section class="custom-section bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Trouvez l'emploi idéal en un clic!</h2>
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="input-group mb-3">
              <!-- utiliser api google maps pour la localisation -->
              <input type="text" class="form-control"
                placeholder="Recherchez par mots-clés, localisation, type de contrat" aria-label="Recherche d'emploi">
              <button class="btn btn-secondary" type="button">Rechercher</button>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="custom-section">
      <div class="container">
        <h2 class="text-center mb-5">Offres d'Emploi</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100 text-center border-0">
              <div class="card-body">
                <div class="mb-3" style="font-size: 62.5px;">💼</div>
                <h3 class="card-title">Développeur Full Stack</h3>
                <p class="card-text">CDI</p>
                <p class="fw-bold">Paris, France</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 text-center border-0">
              <div class="card-body">
                <div class="mb-3" style="font-size: 62.5px;">💰</div>
                <h3 class="card-title">Data Scientist</h3>
                <p class="card-text">CDI</p>
                <p class="fw-bold">Berlin, Germany</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 text-center border-0">
              <div class="card-body">
                <div class="mb-3" style="font-size: 62.5px;">💼</div>
                <h3 class="card-title">UX/UI Designer</h3>
                <p class="card-text">CDD</p>
                <p class="fw-bold">Cupertino, USA</p>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">
          <img src="https://c.animaapp.com/m8wq0iljLnvmI1/img/vector-200.svg" alt="Décoration" class="img-fluid">
        </div>
      </div>
    </section>


    <section class="custom-section bg-light">
      <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4">
          <h2>Entreprises Recruteuses</h2>
          <a href="#" class="btn btn-secondary">Voir les offres</a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="card h-100 border-0">
              <div class="position-relative">
                <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 240px;">
                  <h3 class="text-white">Logo de l'entreprise</h3>
                </div>
                <div class="position-absolute top-0 start-0 bg-light px-2 py-1 rounded-bottom">
                  <span class="small">15 offres disponibles</span>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Google Inc.</h4>
                <p class="card-text">Tech</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 border-0">
              <div class="position-relative">
                <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 240px;">
                  <h3 class="text-white">Logo de l'entreprise</h3>
                </div>
                <div class="position-absolute top-0 start-0 bg-light px-2 py-1 rounded-bottom">
                  <span class="small">10 offres disponibles</span>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Amazon</h4>
                <p class="card-text">E-commerce</p>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">
          <img src="https://c.animaapp.com/m8wq0iljLnvmI1/img/vector-200.svg" alt="Décoration" class="img-fluid">
        </div>
      </div>
    </section>


    <section class="custom-section">
      <div class="container">
        <h2 class="text-center mb-5">Témoignages & Success Stories</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="card h-100 border p-3">
              <div class="d-flex mb-3">
                <div class="me-3" style="width:100px; height:100px; background-color:#d8d8d880;"></div>
                <div>
                  <h3>Témoignage</h3>
                  <p>Grâce à cette plateforme, j'ai décroché un emploi de rêve chez Google Inc. en moins de deux
                    semaines !</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 border p-3">
              <div class="d-flex mb-3">
                <div class="me-3" style="width:100px; height:100px; background-color:#d8d8d880;"></div>
                <div>
                  <h3>Success Story</h3>
                  <p>Notre entreprise a trouvé des talents exceptionnels pour renforcer notre équipe grâce au système de
                    matching intelligent.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">
          <img src="https://c.animaapp.com/m8wq0iljLnvmI1/img/vector-200.svg" alt="Décoration" class="img-fluid">
        </div>
      </div>
    </section>
  </main>


  <footer class="bg-white py-4">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <a href="#" class="d-block mb-2">À propos</a>
        </div>
        <div class="col">
          <a href="#" class="d-block mb-2">Contact</a>
        </div>
        <div class="col">
          <a href="#" class="d-block mb-2">FAQ</a>
        </div>
        <div class="col">
          <a href="#" class="d-block mb-2">Mentions légales</a>
        </div>
        <div class="col">
          <a href="#" class="d-block mb-2">Politique de confidentialité</a>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>