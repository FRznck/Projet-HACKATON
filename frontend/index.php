<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plateforme de Recrutement Intelligent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index-CSS/styles.css">
    <script type="module" src="js/inscription.js" defer></script>
</head>

<body>
    <main class="container-fluid px-0">
        <!-- Hero Section -->
        <section class="custom-hero">
            <div class="container text-center py-5">
                <h1 class="display-4 mb-4">Bienvenue sur notre Plateforme de Recrutement Intelligent</h1>
                <p class="lead mb-5">L'emploi parfait ? Le candidat idéal ? <strong>On vous les sert sur un plateau.</strong> </p>
                <button class="btn btn-dark btn-lg" onclick="document.querySelector('.form-section').scrollIntoView({ behavior: 'smooth' });">S'inscrire</button>
            </div>
        </section>

        <!-- Offres en Vedette -->
        <section class="py-5">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Offres en Vedette</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="job-card">
                            <div class="icon-wrapper mb-3">💼</div>
                            <h3>Ingénieur Logiciel Senior</h3>
                            <p class="text-muted">Rejoignez une équipe technique dynamique et travaillez sur des projets innovants.</p>
                            <div class="d-flex gap-2">
                                <span class="badge bg-secondary">Temps plein</span>
                                <span class="badge bg-secondary">Télétravail</span>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="job-card">
                            <div class="icon-wrapper mb-3">🔍</div>
                            <h3>Spécialiste Marketing</h3>
                            <p class="text-muted">Créez des campagnes marketing percutantes pour une marque mondiale.</p>
                            <div class="badge bg-secondary">Temps partiel</div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="job-card">
                            <div class="icon-wrapper mb-3">📊</div>
                            <h3>Responsable RH</h3>
                            <p class="text-muted">Dirigez les stratégies d'acquisition de talents pour une entreprise en croissance.</p>
                            <div class="badge bg-secondary">Temps plein</div>
                        </article>
                    </div>
                </div>
            </div>
        </section>


        <!-- Connexion/Inscription -->
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Connexion ou Inscription</h2>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6">
                        <a href="connexion.php" class="text-decoration-none">
                            <div class="card h-100 text-center p-4">
                                <div class="icon-wrapper mx-auto mb-3">👤</div>
                                <h3>Candidat</h3>
                                <p class="text-muted">Trouvez l'emploi de vos rêves</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="inscription-recruteur.php" class="text-decoration-none">
                            <div class="card h-100 text-center p-4">
                                <div class="icon-wrapper mx-auto mb-3">💼</div>
                                <h3>Recruteur</h3>
                                <p class="text-muted">Trouvez les meilleurs talents</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulaire Inscription -->
        <section class="py-5 form-section">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Inscription Candidat </h2>
                <form class="row g-4">
                    
                    <div class="col-md-6">
                        <label class="form-label">Nom </label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Prénom </label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez votre prénom" required>
                    </div>

                   
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Entrez votre email" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    
                    <div class="col-12">
                        <label class="form-label">Profil LinkedIn</label>
                        <input type="url" class="form-control" placeholder="Entrez l'URL de votre profil LinkedIn" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">CV</label>
                        <input type="file" class="form-control" accept=".pdf, .doc, .docx" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Photo de profil</label>
                        <input type="file" class="form-control" accept="image/*" required>
                    </div>
                    <div class="col-12">
                    
                    
            </div>
            <div class="col-12 d-flex gap-3 justify-content-center">
            <button type="submit" id="submit" class="btn btn-dark">Créer un compte</button>
                <button type="button" class="btn btn-outline-dark">
                    <a href="connexion.php" style="text-decoration: none;">Se connecter ?</a>
                </button>
                
                <div class="input">
                    <button class="btn btn-light btn-lg d-flex align-items-center shadow-sm border rounded-pill px-4 py-2" id="google-login-btn" >
                        <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google Logo" class="me-2" width="24" height="24">
                        <span class="">S'inscrire avec Google</span> <!-- se connecte avec son compte, après on enverra un mail au candidat pour qu'il termine son inscription-->
                    </button>
                </div>
            </div>
            </form>
            </div>
        </section>

        <!-- Section Premium -->
        <section class="py-5 bg-dark text-white">
            <div class="container text-center">
                <h2 class="display-5 mb-4">Fonctionnalités Premium</h2>
                <p class="lead mb-5">Passez à la version premium pour des avantages exclusifs</p>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="premium-card">
                            <div class="p-4 bg-light text-dark">
                                <h3>Badge Premium</h3>
                                <div class="badge bg-primary mb-3">À partir de 9,99 $/mois</div>
                                <h4>Abonnement Premium</h4>
                                <p class="text-muted">Débloquez toutes les fonctionnalités</p>
                                <div class="fs-1">💎</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-light py-4">
            <div class="container text-center">
                <p class="mb-0">© 2022 Plateforme de Recrutement Intelligent. Tous droits réservés.</p>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>