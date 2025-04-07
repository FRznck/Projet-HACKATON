<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page IA & Matching</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="matchingAI-CSS/styles.css">
</head>
<body>

    <nav class="top-bar navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <div class="logo-placeholder rounded-circle bg-opacity-10 bg-dark" style="width: 40px; height: 40px;"></div>
            <h1 class="navbar-brand fs-3 fw-medium mb-0 mx-3">Page IA & Matching</h1>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item"><a href="accueil.php" class="nav-link fw-medium">Accueil</a></li>
                    <li class="nav-item"><a href="parametres-candidat.php" class="nav-link fw-medium">Paramètres</a></li>
                    <li class="nav-item"><a href="dashboard-candidat.php" class="nav-link fw-medium">Mes suivis</a></li>
                </ul>
                
                <form class="d-flex" role="search">
                    <div class="input-group border rounded-3">
                        <input type="search" class="form-control border-0 bg-transparent" placeholder="Search in site">
                        <button class="btn btn-link text-muted" type="submit">
                            <img src="https://c.animaapp.com/m8wtyxboDu4nyY/img/ic-search.svg" alt="Search" width="20">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <main class="container-fluid p-0">
       
        <section class="py-5 bg-white">
            <div class="container text-center py-5">
                <h2 class="display-5 fw-bold mb-4">AI & Matching Page</h2>
                <p class="lead mb-5">Interface de mise en relation intelligente entre offres et candidats.</p>
                <div class="vector-line"></div>
            </div>
        </section>

        
        <section class="py-5 bg-white">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-md-6">
                        <div class="feature-image"></div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="display-6 fw-bold mb-4">Suggestions d'offres automatiques</h3>
                        <p class="fs-5 text-muted">Recevez des recommandations d'offres automatisées en fonction du profil du candidat.</p>
                        
                        <div class="card border mt-4">
                            <div class="card-body position-relative">
                                <span class="tag fw-medium">Recommandations intelligentes</span>
                                <h5 class="card-title fs-5 mt-3">AI Offer Matcher</h5>
                                <p class="card-text fw-medium">Get matched offers instantly</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vector-line my-5"></div>
            </div>
        </section>

   
        <section class="py-5 bg-white">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-md-6 order-md-2">
                        <div class="feature-image"></div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <h3 class="display-6 fw-bold mb-4">Assistante CV et lettre de motivation</h3>
                        <p class="fs-5 text-muted">Un outil pour aider à rédiger des CV et des lettres de motivation avec l'IA.</p>
                        
                        <div class="card border mt-4">
                            <div class="card-body">
                                <div class="d-flex gap-3">
                                    <div class="flex-shrink-0">
                                        <div class="bg-light rounded-3" style="width: 100px; height: 100px;"></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-5 fw-medium">Assistant de rédaction de CV</h5>
                                        <p class="text-muted">Créez des CV professionnels avec l'aide de l'IA</p>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-light" style="width: 20px; height: 20px;"></div>
                                            <span class="small fw-medium">AI Writing Team</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vector-line my-5"></div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>