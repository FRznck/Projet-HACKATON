<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recrutement Humain - Plateforme Authentique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=DM+Sans:opsz@9..40&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --clr-primary: #2A2A2A;
            --clr-accent: #E74C3C;
            --clr-secondary: #F1C40F;
            --clr-soft-bg: #FFF5EB;
            --clr-organic-green: #27AE60;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--clr-soft-bg);
            background-image: 
                radial-gradient(circle at 90% 10%, rgba(231, 76, 60, 0.05) 0%, transparent 30%),
                radial-gradient(circle at 10% 90%, rgba(241, 196, 15, 0.05) 0%, transparent 30%);
        }

        h1, h2, h3 {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.03em;
        }

        .custom-hero {
            background: 
                linear-gradient(45deg, rgba(42, 42, 42, 0.95) 30%, rgba(231, 76, 60, 0.15)),
                url('https://images.unsplash.com/photo-1497864149936-d3163f0c0f4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: 60% center;
            padding: 120px 0 80px;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        }

        .organic-shape {
            position: absolute;
            width: 300px;
            height: 300px;
            right: -50px;
            top: -50px;
            opacity: 0.3;
            z-index: 0;
        }

        .job-card {
            background: 
                linear-gradient(var(--clr-soft-bg), var(--clr-soft-bg)),
                url('data:image/svg+xml,<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><filter id="n"><feTurbulence type="fractalNoise" baseFrequency="0.005" numOctaves="3"/></filter><rect width="100%" height="100%" filter="url(%23n)" opacity="0.4"/></svg>');
            border: 2px solid var(--clr-primary);
            box-shadow: 8px 8px 0 var(--clr-primary);
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
        }

        .job-card:hover {
            transform: translate(-3px, -3px);
            box-shadow: 12px 12px 0 var(--clr-primary);
        }

        .job-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--clr-accent);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .job-card:hover::after {
            transform: scaleX(1);
        }

        .input-field {
            position: relative;
            margin: 2rem 0;
        }

        .input-field input {
            background: transparent;
            border: none;
            border-bottom: 2px solid var(--clr-primary);
            border-radius: 0;
            padding: 0.5rem 0;
            width: 100%;
        }

        .input-field .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--clr-secondary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .input-field input:focus ~ .underline {
            transform: scaleX(1);
        }

        .btn-organic {
            background: var(--clr-accent);
            color: white;
            padding: 12px 24px;
            border: 2px solid var(--clr-primary);
            box-shadow: 4px 4px 0 var(--clr-primary);
            transition: all 0.2s ease;
            position: relative;
        }

        .btn-organic:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 var(--clr-primary);
        }

        .testimonial-card {
            background: white;
            border: 2px solid var(--clr-primary);
            padding: 2rem;
            position: relative;
            margin-top: 40px;
        }

        .testimonial-card::before {
            content: "“";
            position: absolute;
            top: -30px;
            left: 20px;
            font-size: 80px;
            color: var(--clr-accent);
            font-family: 'Space Grotesk', sans-serif;
        }

        .cursor-dot {
            width: 10px;
            height: 10px;
            background: var(--clr-accent);
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: 999;
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="cursor-dot"></div>

    <main class="container-fluid px-0">
        <!-- Hero Section -->
        <section class="custom-hero text-white position-relative">
            <div class="organic-shape">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20,-40C25,-35 35,-25 40,-15C45,-5 45,5 40,20C35,35 25,50 15,55C5,60 -5,55 -20,50C-35,45 -50,40 -55,30C-60,20 -55,5 -50,-10C-45,-25 -35,-40 -25,-45C-15,-50 -5,-45 10,-40Z" 
                          fill="var(--clr-accent)"/>
                </svg>
            </div>
            
            <div class="container text-center position-relative" style="z-index: 1">
                <h1 class="display-3 fw-bold mb-4">
                    Trouvez votre <span style="color: var(--clr-accent)">place</span><br>
                    <span class="text-mark">pas juste un job</span>
                </h1>
                <p class="lead mb-5">Des connexions humaines dans un monde numérique</p>
                <button class="btn-organic">Explorer les opportunités</button>
            </div>
        </section>

        <!-- Offres en Vedette -->
        <section class="py-5">
            <div class="container">
                <h2 class="text-center display-5 mb-5">Offres sélectionnées avec soin</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="job-card p-4">
                            <h3 class="mb-3">Artisan Développeur</h3>
                            <p class="text-muted">Créez avec passion dans un environnement humain</p>
                            <div class="d-flex gap-2 flex-wrap">
                                <span class="badge bg-dark">Temps plein</span>
                                <span class="badge" style="background: var(--clr-organic-green)">Éthique</span>
                            </div>
                        </article>
                    </div>
                    <!-- Ajouter d'autres cartes similaires -->
                </div>
            </div>
        </section>

        <!-- Formulaire -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form class="row g-4">
                            <div class="col-12">
                                <div class="input-field">
                                    <input type="email" placeholder="Votre email" required>
                                    <div class="underline"></div>
                                </div>
                            </div>
                            <!-- Ajouter d'autres champs -->
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-organic">Créer mon profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Témoignages -->
        <section class="py-5">
            <div class="container">
                <div class="testimonial-card">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" 
                             class="rounded-circle me-3" 
                             width="80" 
                             height="80"
                             alt="Marie">
                        <div>
                            <h5 class="mb-1">Marie, Designer</h5>
                            <p class="text-muted mb-0">"Enfin une plateforme qui comprend l'humain derrière le CV"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Curseur personnalisé
        const cursor = document.querySelector('.cursor-dot');
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = `${e.pageX - 5}px`;
            cursor.style.top = `${e.pageY - 5}px`;
        });

        // Effet tilt sur les cartes
        document.addEventListener('mousemove', (e) => {
            const cards = document.querySelectorAll('.job-card');
            cards.forEach(card => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                card.style.transform = `
                    perspective(1000px)
                    rotateX(${(y - rect.height/2) * 0.02}deg)
                    rotateY(${(x - rect.width/2) * -0.03}deg)
                `;
            });
        });

        // Animation au scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.job-card, .testimonial-card').forEach(el => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>