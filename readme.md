/Projet-HACKATON
│── /backend
│   ├── /api
│   │   ├── offres.php       # API pour gérer les offres
│   │   ├── candidatures.php # API pour gérer les candidatures
│   │   ├── utilisateurs.php # API pour gérer l'inscription/connexion
│   │   ├── matching_ia.php  # API pour l'IA de matching
│   ├── config.php           # Configuration de la BDD et des constantes
│   ├── functions.php        # Fonctions utilitaires
│── /database
│   ├── database.sql         # Script SQL pour créer la base de données
│   ├── seed.sql             # Données de test (facultatif)
│── /frontend
│   ├── /css
│   │   ├── styles.css       # Styles CSS
│   ├── /js
│   │   ├── main.js          # Code JS global
│   │   ├── auth.js          # Gestion de l'authentification
│   │   ├── api.js           # Fonctions pour interagir avec le backend
│   ├── /pages
│   │   ├── index.html       # Page d'accueil
│   │   ├── login.html       # Page de connexion
│   │   ├── register.html    # Page d'inscription
│   │   ├── dashboard.html   # Tableau de bord utilisateur
│   │   ├── offres.html      # Liste des offres d’emploi
│   │   ├── profil.html      # Profil candidat/recruteur
│   ├── index.php            # Redirection vers index.html si PHP est utilisé
│── /security
│   ├── auth_middleware.php  # Vérification des sessions et rôles
│   ├── csrf_protection.php  # Protection contre les attaques CSRF
│── /ai
│   ├── matching.py          # Algorithme IA de matching (si Python est utilisé)
│   ├── cv_assistant.py      # Assistance à la rédaction de CV (si Python est utilisé)
│── .gitignore               # Fichiers à ignorer dans Git
│── README.md                # Explication du projet et guide d'installation
