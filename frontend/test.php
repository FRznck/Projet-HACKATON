<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plateforme de Recrutement Intelligent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="index-CSS/test.css">
    <script type="module" src="js/inscription.js" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <main class="container-fluid px-0">
        <!-- Hero Section -->
        <section class="custom-hero">
            <div class="container text-center py-5">
                <h1 class="display-4 mb-4 animate__animated animate__fadeInDown">Bienvenue sur notre Plateforme de Recrutement Intelligent</h1>
                <p class="lead mb-5 animate__animated animate__fadeIn animate__delay-1s">L'emploi parfait ? Le candidat idéal ? <strong>On vous les sert sur un plateau.</strong></p>
                <div class="animate__animated animate__fadeIn animate__delay-2s">
                    <button class="btn btn-primary btn-lg btn-pulse" onclick="document.querySelector('.form-section').scrollIntoView({ behavior: 'smooth' });">
                        S'inscrire <i class="fas fa-arrow-down ms-2"></i>
                    </button>
                </div>
                <div class="mt-5 animate__animated animate__fadeIn animate__delay-3s">
                    <div class="d-flex justify-content-center gap-3">
                        <div class="text-center">
                            <div class="fs-1 mb-2">🚀</div>
                            <div>+10 000 offres</div>
                        </div>
                        <div class="text-center">
                            <div class="fs-1 mb-2">👥</div>
                            <div>+50 000 candidats</div>
                        </div>
                        <div class="text-center">
                            <div class="fs-1 mb-2">💼</div>
                            <div>+1 000 entreprises</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Offres en Vedette -->
        <section class="py-5">
            <div class="container">
                <h2 class="text-center display-5 mb-5 animate-fade-in">Offres en Vedette</h2>
                <div class="row g-4">
                    <div class="col-md-4 animate-fade-in delay-1">
                        <article class="job-card">
                            <div class="icon-wrapper mb-3"><i class="fas fa-laptop-code"></i></div>
                            <h3>Ingénieur Logiciel Senior</h3>
                            <p class="text-muted">Rejoignez une équipe technique dynamique et travaillez sur des projets innovants.</p>
                            <div class="d-flex gap-2">
                                <span class="badge bg-primary">Temps plein</span>
                                <span class="badge bg-success">Télétravail</span>
                            </div>
                            <div class="mt-3">
                                <span class="text-primary fw-bold">90K€ - 110K€</span>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 animate-fade-in delay-2">
                        <article class="job-card">
                            <div class="icon-wrapper mb-3"><i class="fas fa-bullseye"></i></div>
                            <h3>Spécialiste Marketing</h3>
                            <p class="text-muted">Créez des campagnes marketing percutantes pour une marque mondiale.</p>
                            <div class="d-flex gap-2">
                                <span class="badge bg-warning text-dark">Temps partiel</span>
                                <span class="badge bg-info">Hybride</span>
                            </div>
                            <div class="mt-3">
                                <span class="text-primary fw-bold">45K€ - 60K€</span>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 animate-fade-in delay-3">
                        <article class="job-card">
                            <div class="icon-wrapper mb-3"><i class="fas fa-users"></i></div>
                            <h3>Responsable RH</h3>
                            <p class="text-muted">Dirigez les stratégies d'acquisition de talents pour une entreprise en croissance.</p>
                            <div class="d-flex gap-2">
                                <span class="badge bg-primary">Temps plein</span>
                                <span class="badge bg-dark">CDI</span>
                            </div>
                            <div class="mt-3">
                                <span class="text-primary fw-bold">65K€ - 80K€</span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="#" class="btn btn-outline-primary">Voir toutes les offres <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </section>

        <!-- Statistiques -->
        <section class="py-5 bg-primary text-white">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-3 mb-4 mb-md-0">
                        <div class="display-4 fw-bold">98%</div>
                        <p class="mb-0">Satisfaction clients</p>
                    </div>
                    <div class="col-md-3 mb-4 mb-md-0">
                        <div class="display-4 fw-bold">24h</div>
                        <p class="mb-0">Temps moyen de réponse</p>
                    </div>
                    <div class="col-md-3 mb-4 mb-md-0">
                        <div class="display-4 fw-bold">10K+</div>
                        <p class="mb-0">Emplois pourvus</p>
                    </div>
                    <div class="col-md-3">
                        <div class="display-4 fw-bold">95%</div>
                        <p class="mb-0">Taux de réussite</p>
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
                            <div class="card h-100 text-center p-4 hover-effect">
                                <div class="icon-wrapper mx-auto mb-3"><i class="fas fa-user-graduate"></i></div>
                                <h3>Candidat</h3>
                                <p class="text-muted">Trouvez l'emploi de vos rêves</p>
                                <div class="mt-3">
                                    <span class="badge rounded-pill bg-primary">+50 000 opportunités</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="inscription-recruteur.php" class="text-decoration-none">
                            <div class="card h-100 text-center p-4 hover-effect">
                                <div class="icon-wrapper mx-auto mb-3"><i class="fas fa-briefcase"></i></div>
                                <h3>Recruteur</h3>
                                <p class="text-muted">Trouvez les meilleurs talents</p>
                                <div class="mt-3">
                                    <span class="badge rounded-pill bg-success">+10 000 profils</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Témoignages -->
        <section class="py-5">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Ils nous font confiance</h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 p-4">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://randomuser.me/api/portraits/women/43.jpg" class="rounded-circle me-3" width="60" height="60" alt="Témoignage">
                                <div>
                                    <h5 class="mb-0">Marie Dupont</h5>
                                    <p class="text-muted mb-0">Marketing Manager @TechCorp</p>
                                </div>
                            </div>
                            <p class="mb-0">"Grâce à cette plateforme, j'ai trouvé le poste parfait en moins d'une semaine. L'interface est intuitive et les offres sont de qualité."</p>
                            <div class="mt-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 p-4">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-3" width="60" height="60" alt="Témoignage">
                                <div>
                                    <h5 class="mb-0">Jean Martin</h5>
                                    <p class="text-muted mb-0">CEO @StartUpInnov</p>
                                </div>
                            </div>
                            <p class="mb-0">"Nous avons recruté 3 développeurs seniors en un temps record. La qualité des profils est exceptionnelle."</p>
                            <div class="mt-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulaire Inscription -->
        <section class="py-5 form-section">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Inscription Candidat</h2>
                <form class="row g-4 needs-validation" novalidate>
                    
                    <div class="col-md-6">
                        <label class="form-label">Nom</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" required>
                            <div class="invalid-feedback">
                                Veuillez entrer votre nom.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Prénom</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" required>
                            <div class="invalid-feedback">
                                Veuillez entrer votre prénom.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" placeholder="Entrez votre email" required>
                            <div class="invalid-feedback">
                                Veuillez entrer un email valide.
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" id="phone" placeholder="Entrez votre téléphone">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="invalid-feedback">
                                Veuillez entrer un mot de passe.
                            </div>
                        </div>
                        <div class="form-text">Minimum 8 caractères avec chiffres et lettres</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmez votre mot de passe" required>
                            <div class="invalid-feedback">
                                Les mots de passe ne correspondent pas.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Profil LinkedIn</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                            <input type="url" class="form-control" placeholder="Entrez l'URL de votre profil LinkedIn" required>
                            <div class="invalid-feedback">
                                Veuillez entrer une URL LinkedIn valide.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">CV</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-file-pdf"></i></span>
                            <input type="file" class="form-control" accept=".pdf, .doc, .docx" required>
                            <div class="invalid-feedback">
                                Veuillez uploader votre CV.
                            </div>
                        </div>
                        <div class="form-text">Formats acceptés: PDF, DOC, DOCX</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Photo de profil</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-camera"></i></span>
                            <input type="file" class="form-control" accept="image/*" required>
                            <div class="invalid-feedback">
                                Veuillez uploader une photo.
                            </div>
                        </div>
                        <div class="form-text">Format: JPG, PNG (max 5MB)</div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">conditions d'utilisation</a>
                            </label>
                            <div class="invalid-feedback">
                                Vous devez accepter les conditions.
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex gap-3 justify-content-center flex-wrap">
                        <button type="submit" id="submit" class="btn btn-primary btn-lg">
                            Créer un compte <i class="fas fa-user-plus ms-2"></i>
                        </button>
                        
                        <a href="connexion.php" class="btn btn-outline-primary btn-lg">
                            Se connecter <i class="fas fa-sign-in-alt ms-2"></i>
                        </a>
                        
                        <button type="button" class="btn btn-light btn-lg d-flex align-items-center shadow-sm border rounded-pill px-4 py-2" id="google-login-btn">
                            <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google Logo" class="me-2" width="24" height="24">
                            <span>S'inscrire avec Google</span>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Modal Conditions -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Conditions d'utilisation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.</p>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">J'ai compris</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Premium -->
        <section class="py-5 bg-dark text-white position-relative overflow-hidden">
            <div class="position-absolute top-0 end-0 opacity-10">
                <i class="fas fa-crown fa-10x"></i>
            </div>
            <div class="container text-center position-relative">
                <h2 class="display-5 mb-4">Fonctionnalités Premium</h2>
                <p class="lead mb-5">Passez à la version premium pour des avantages exclusifs</p>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="premium-card bg-gradient-primary">
                            <div class="p-5">
                                <div class="badge bg-white text-primary mb-3">POPULAIRE</div>
                                <h3 class="mb-4">Abonnement Premium</h3>
                                <div class="display-4 fw-bold mb-4">9,99€<small class="fs-6 text-white-50">/mois</small></div>
                                
                                <ul class="list-unstyled text-start mb-5">
                                    <li class="mb-3"><i class="fas fa-check-circle me-2 text-success"></i> Profil mis en avant</li>
                                    <li class="mb-3"><i class="fas fa-check-circle me-2 text-success"></i> Accès aux offres exclusives</li>
                                    <li class="mb-3"><i class="fas fa-check-circle me-2 text-success"></i> Statistiques détaillées</li>
                                    <li class="mb-3"><i class="fas fa-check-circle me-2 text-success"></i> Support prioritaire</li>
                                    <li><i class="fas fa-check-circle me-2 text-success"></i> Coaching carrière</li>
                                </ul>
                                
                                <button class="btn btn-light btn-lg px-5 py-3 fw-bold">
                                    Essai gratuit 7 jours <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mb-4">Restez informé</h2>
                        <p class="lead mb-5">Abonnez-vous à notre newsletter pour recevoir les dernières offres d'emploi et conseils carrière.</p>
                        
                        <form class="row g-3 justify-content-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-lg" placeholder="Votre email">
                                    <button class="btn btn-primary btn-lg" type="submit">S'abonner</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-dark text-white py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <h4 class="mb-4">Plateforme de Recrutement Intelligent</h4>
                        <p>La solution innovante pour connecter les talents aux meilleures opportunités professionnelles.</p>
                        <div class="d-flex gap-3 mt-4">
                            <a href="#" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-linkedin-in fa-lg"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-lg-2">
                        <h5 class="mb-4">Liens rapides</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Accueil</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Offres d'emploi</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Entreprises</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Blog</a></li>
                            <li><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-md-4 col-lg-3">
                        <h5 class="mb-4">Ressources</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Conseils carrière</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Préparation entretien</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Modèles CV</a></li>
                            <li><a href="#" class="text-white-50 text-decoration-none">FAQ</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-md-4 col-lg-3">
                        <h5 class="mb-4">Contact</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Paris, France</li>
                            <li class="mb-2"><i class="fas fa-phone me-2"></i> +33 1 23 45 67 89</li>
                            <li class="mb-2"><i class="fas fa-envelope me-2"></i> contact@recrutement.com</li>
                        </ul>
                    </div>
                </div>
                
                <hr class="my-4 bg-secondary">
                
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0">© 2023 Plateforme de Recrutement Intelligent. Tous droits réservés.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <a href="#" class="text-white-50 text-decoration-none me-3">Confidentialité</a>
                        <a href="#" class="text-white-50 text-decoration-none">Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.animate-fade-in');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            animateElements.forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
            
            // Validation du formulaire
            const form = document.querySelector('.needs-validation');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                form.classList.add('was-validated');
            }, false);
            
            // Toggle password visibility
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
            
            // Confirmation mot de passe
            const confirmPassword = document.querySelector('#confirmPassword');
            confirmPassword.addEventListener('input', function() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Les mots de passe ne correspondent pas");
                } else {
                    confirmPassword.setCustomValidity("");
                }
            });
            
            // Effet hover sur les cartes
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                    this.style.boxShadow = '';
                });
            });
        });
    </script>
</body>

</html>