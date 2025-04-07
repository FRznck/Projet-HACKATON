<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paramètres Candidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="parametres-candidat-CSS/styles.css">
    <style>
    
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="bg-secondary bg-opacity-10 rounded-circle me-3" style="width: 40px; height: 40px;"></div>
                <a class="navbar-brand fw-medium fs-4" href="#">Plateforme de Recrutement Intelligente</a>
            </div>
            <div class="d-flex align-items-center gap-4">
                <a href="accueil.php" class="text-dark text-decoration-none">Accueil</a>
                <span class="text-dark">Paramètres du compte</span>
            </div>
        </div>
    </nav>

    <main class="container pt-5 mt-5">
        <!-- En-tête -->
        <section class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-4">Paramètres du compte</h1>
            <hr class="mx-auto mb-5" style="width: 95%;">
        </section>

        <!-- Section Profil -->
        <section class="settings-section">
            <div class="row align-items-center mb-5">
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="avatar-upload">
                        <span class="fs-4 text-muted">📷</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <h2 class="form-section-title">Informations Personnelles</h2>
                    <form class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Photo de profil</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nom complet</label>
                            <input type="text" class="form-control" placeholder="Jean Dupont">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" placeholder="jean.dupont@email.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" placeholder="+33 6 12 34 56 78">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Localisation</label>
                            <input type="text" class="form-control" placeholder="Ville, Pays">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Section Professionnelle -->
        <section class="settings-section">
            <h2 class="form-section-title">Informations Professionnelles</h2>
            <form class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Titre professionnel</label>
                    <input type="text" class="form-control" placeholder="Développeur Full Stack, Alternance Développeur Web">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Secteur d'activité</label>
                    <select class="form-select">
                        <option>Choisissez un secteur</option>
                        <option>Informatique</option>
                        <option>Marketing</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Expérience (années)</label>
                    <input type="number" class="form-control" placeholder="5">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Compétences clés</label>
                    <input type="text" class="form-control" placeholder="JavaScript, React, Node.js">
                </div>
                <div class="col-12">
                    <label class="form-label">CV & Lettre de motivation</label>
                    <input type="file" class="form-control" accept=".pdf,.doc,.docx">
                </div>
                <div class="col-12">
                    <button class="btn btn-secondary">Enregistrer</button>
                </div>
            </form>
        </section>

        <!-- Section Préférences -->
        <section class="settings-section">
            <h2 class="form-section-title">Préférences de Recherche</h2>
            <form class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Type de contrat</label>
                    <select class="form-select" multiple size="3">
                        <option>CDI</option>
                        <option>CDD</option>
                        <option>Stage</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Disponibilité</label>
                    <select class="form-select" multiple size="3">
                        <option>Immédiate</option>
                        <option>En recherche active</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Salaire souhaité</label>
                    <input type="text" class="form-control" placeholder="45k€ - 55k€">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Notifications</label>
                    <input type="text" class="form-control" placeholder="Préférences">
                </div>
                <div class="col-12">
                    <button class="btn btn-secondary">Enregistrer</button>
                </div>
            </form>
        </section>

        <!-- Section Sécurité -->
        <section class="settings-section">
            <h2 class="form-section-title">Sécurité</h2>
            <form class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">Nouveau mot de passe</label>
                    <input type="password" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirmation</label>
                    <input type="password" class="form-control">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Authentification à deux facteurs</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-warning">Désactiver le compte</button>
                    <button class="btn btn-danger">Supprimer le compte</button>
                </div>
                

            </form>
        </section>

        <!-- Boutons de validation -->
        <div class="text-center py-5">
            <button class="btn btn-success btn-lg px-5">Enregistrer tout</button>
            <div class="mt-3">
                <a href="dashboard-candidat.html" class="text-decoration-none">← Retour au tableau de bord</a>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>