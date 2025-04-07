<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Candidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
    </style>
</head>
<body>

    <nav class="top-bar navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <div class="logo-placeholder bg-light rounded-3" style="width: 40px; height: 40px;"></div>
            <h1 class="navbar-brand fs-4 fw-medium mb-0 mx-3">Tableau de bord Candidat</h1>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a href="accueil.php" class="nav-link fw-medium">Accueil</a></li>
                    <li class="nav-item"><a href="Page-ai.php" class="nav-link fw-medium">Découvrez l'IA</a></li>
                    <li class="nav-item"><a href="parametres-candidat.php" class="nav-link fw-medium">Paramètres</a></li>
                </ul>
                
                <form class="d-flex" role="search">
                    <div class="input-group border rounded-3">
                        <input type="search" class="form-control border-0" placeholder="Rechercher">
                        <button class="btn btn-link text-muted" type="submit">
                            <img src="https://c.animaapp.com/m8wrk06yj1nBSo/img/ic-search.svg" alt="Search" width="20">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <main class="container py-4">
      
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 fw-bold">Offres disponibles</h2>
                <a href="accueil.php" class="btn btn-primary">Postuler</a>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <article class="card offer-card h-100 p-3">
                        <div class="d-flex align-items-center">
                            <span class="job-icon">💼</span>
                            <div class="flex-grow-1">
                                <h3 class="h5 mb-1">Offre 1</h3>
                                <p class="text-muted mb-1">Salaire: $50,000</p>
                                <p class="text-muted mb-0">Secteur: Informatique</p>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div class="col-md-6">
                    <article class="card offer-card h-100 p-3">
                        <div class="d-flex align-items-center">
                            <span class="job-icon">💼</span>
                            <div class="flex-grow-1">
                                <h3 class="h5 mb-1">Offre 2</h3>
                                <p class="text-muted mb-1">Salaire: $45,000</p>
                                <p class="text-muted mb-0">Secteur: Marketing</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            
            <div class="vector-line my-5"></div>
        </section>

        
        <section class="mb-5">
            <h2 class="h3 fw-bold mb-4">Candidatures envoyées</h2>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <article class="card h-100">
                        <div class="card-body">
                            <div class="d-flex gap-3">
                                <div class="bg-light rounded-3" style="width: 100px; height: 100px;"></div>
                                <div class="flex-grow-1">
                                    <h3 class="h5">Offre 1</h3>
                                    <span class="badge bg-warning text-dark status-badge">En attente</span>
                                    <div class="mt-2">
                                        <span class="d-block text-muted">Salaire: $50,000</span>
                                        <span class="d-block text-muted">Secteur: Informatique</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div class="col-md-6">
                    <article class="card h-100">
                        <div class="card-body">
                            <div class="d-flex gap-3">
                                <div class="bg-light rounded-3" style="width: 100px; height: 100px;"></div>
                                <div class="flex-grow-1">
                                    <h3 class="h5">Offre 2</h3>
                                    <span class="badge bg-success status-badge">Acceptée</span>
                                    <div class="mt-2">
                                        <span class="d-block text-muted">Salaire: $45,000</span>
                                        <span class="d-block text-muted">Secteur: Marketing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            
            <div class="vector-line my-5"></div>
        </section>

       
        <section>
            <h2 class="h3 fw-bold mb-4">Contacter le recruteur</h2>
            
            <form class="row g-4">
                <div class="col-12">
                    <label class="form-label">Nom du RH ou de l'entreprise</label>
                    <input type="text" class="form-control" disabled>
                </div>
                
                <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" rows="4" placeholder="Exprimez votre intérêt..." disabled></textarea>
                </div>
                
                <div class="col-12 d-flex gap-3">
                    <button class="btn btn-outline-secondary" disabled>Premium requis</button>
                    <button class="btn btn-primary" type="submit" disabled>Envoyer</button>
                </div>
            </form>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>