<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SmartCity — Signalez les Dégradations Urbaines</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@400;500&display=swap"
        rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        @stack('extra-css')
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar-SmartCity d-flex align-items-center justify-content-between">
        <a href="#" class="brand">
            <span class="brand-icon"><i class="bi bi-geo-alt-fill"></i></span>
            Smart-City
        </a>
        <div class="d-none d-md-flex align-items-center gap-1">
            <div class="d-flex gap-2 ms-2">
                <a href="{{route('connexion')}}" class="btn btn-nav-outline">Connexion</a>
                <a href="{{route('inscrit')}}" class="btn btn-nav-solid">Inscription</a>
            </div>
        </div>
        <button class="btn d-md-none" style="color:#fff;font-size:1.4rem;border:none;" data-bs-toggle="offcanvas"
            data-bs-target="#mobileMenu">
            <i class="bi bi-list"></i>
        </button>
    </nav>

    <!-- Mobile menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header" style="background:var(--blue-primary)">
            <span class="brand text-white" style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800"><i
                    class="bi bi-geo-alt-fill me-2"></i>Smart-City</span>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column gap-3 pt-4">
            <a href="#" class="text-decoration-none fw-600" style="color:var(--blue-primary)"><i
                    class="bi bi-flag me-2"></i>Signaler un incident</a>
            <a href="#" class="text-decoration-none fw-600" style="color:var(--blue-primary)"><i
                    class="bi bi-list-check me-2"></i>Mes Signalements</a>
            <hr />
            <a href="" class="btn"
                style="background:var(--blue-primary);color:#fff;font-weight:700;border-radius:10px">Connexion</a>
            <a href="" class="btn"
                style="background:var(--blue-light);color:var(--blue-primary);font-weight:700;border-radius:10px">Inscription</a>
        </div>
    </div>

    <!--HERO-->
    <section class="hero">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <div class="hero-badge">
                        <span class="dot"></span>
                        Plateforme citoyenne active
                    </div>
                    <h1>Signalez les <span>Dégradations</span><br>Urbaines facilement</h1>
                    <p class="hero-subtitle">
                        Aidez à maintenir la ville en bon état en signalant les problèmes autour de vous via notre
                        plateforme <strong>Smart-city</strong>. Rapide, simple et efficace.
                    </p>
                    <div class="hero-actions">
                        <a class="btn-hero-ghost" href="#">
                            <i class="bi bi-flag-fill"></i>
                            Signaler un Incident
                        </a>
                        <a href="#" class="btn-hero-ghost">
                            <i class="bi bi-search"></i>
                            Suivre mes Signalements
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-card position-relative">
                        <div class="hero-pin"><i class="bi bi-geo-alt-fill"></i> 3 signalements près de vous</div>
                        <div class="hero-card-inner">
                            <div class="stat-pill">
                                <span class="val count-up" data-target="1284">0</span>
                                <span class="lbl">Incidents signalés</span>
                            </div>
                            <div class="stat-pill green">
                                <span class="val count-up" data-target="896">0</span>
                                <span class="lbl">Problèmes résolus</span>
                            </div>
                            <div class="stat-pill accent">
                                <span class="val count-up" data-target="342">0</span>
                                <span class="lbl">En cours de traitement</span>
                            </div>
                            <div class="stat-pill">
                                <span class="val count-up" data-target="47">0</span>
                                <span class="lbl">Quartiers couverts</span>
                            </div>
                        </div>
                        <div class="mt-3 p-3 rounded-3"
                            style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25)">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div
                                    style="width:8px;height:8px;background:#4ade80;border-radius:50%;flex-shrink:0;animation:pulse 1.5s infinite">
                                </div>
                                <span style="color:#fff;font-size:.82rem;font-weight:600">Dernier signalement</span>
                            </div>
                            <div
                                style="background:#fff;border-radius:10px;padding:.75rem 1rem;display:flex;align-items:center;gap:.75rem">
                                <div
                                    style="background:var(--blue-light);width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--blue-primary);font-size:1.1rem;flex-shrink:0">
                                    🕳️</div>
                                <div>
                                    <div style="font-weight:700;font-size:.85rem;color:var(--text-dark)">Nid-de-poule —
                                        Rue Joss</div>
                                    <div style="font-size:.75rem;color:var(--text-muted)">Il y a 4 minutes · En attente
                                    </div>
                                </div>
                                <span
                                    style="margin-left:auto;background:#fef3c7;color:#d97706;font-size:.7rem;font-weight:700;border-radius:99px;padding:.2rem .6rem">Nouveau</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--CATEGORIES-->
    <section class="section-categories">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <div class="section-label">Catégories d'incidents</div>
                <h2 class="section-title">Que souhaitez-vous signaler ?</h2>
                <p class="text-muted mt-2" style="font-size:.95rem;max-width:500px;margin:auto">Sélectionnez le type
                    de problème pour commencer votre signalement en quelques clics.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-4 col-lg-2 reveal reveal-d1">
                    <div class="cat-card h-100">
                        <div class="cat-icon">🛣 </div>
                        <div class="cat-name">Etat Routier</div>
                        <div class="cat-count">248 signalements</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 reveal reveal-d2">
                    <div class="cat-card h-100">
                        <div class="cat-icon">💡</div>
                        <div class="cat-name">Éclairage</div>
                        <div class="cat-count">134 signalements</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 reveal reveal-d3">
                    <div class="cat-card h-100">
                        <div class="cat-icon">💧</div>
                        <div class="cat-name">Fuite d'eau</div>
                        <div class="cat-count">87 signalements</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 reveal reveal-d4">
                    <div class="cat-card h-100">
                        <div class="cat-icon">🗑️</div>
                        <div class="cat-name">Ordures</div>
                        <div class="cat-count">311 signalements</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 reveal reveal-d5">
                    <div class="cat-card h-100">
                        <div class="cat-icon">🌲</div>
                        <div class="cat-name">Espaces verts</div>
                        <div class="cat-count">56 signalements</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 reveal reveal-d5">
                    <div class="cat-card h-100">
                        <div class="cat-icon">🚨</div>
                        <div class="cat-name">Incidents</div>
                        <div class="cat-count">139 signalements</div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <span class="more-pill">
                    <i class="bi bi-plus-circle"></i>
                    Et d'autres catégories...
                </span>
            </div>
        </div>
    </section>

    <!--HOW IT WORK-->
    <section class="section-how">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 reveal">
                    <div class="section-label">Comment ça marche</div>
                    <h2 class="section-title">Simple, rapide,<br>efficace</h2>
                    <p class="text-muted mt-3" style="font-size:.95rem;line-height:1.7">
                        SmartCity transforme chaque citoyen en acteur de l'amélioration de sa ville. En 3 étapes, votre
                        signalement est transmis aux autorités compétentes.
                    </p>
                    <a href="#" class="btn-hero-primary mt-4 d-inline-flex"
                        style="color:var(--blue-primary);background:var(--blue-primary);color:#fff;font-weight:700;border-radius:12px;padding:.75rem 1.6rem;text-decoration:none;gap:.5rem">
                        <i class="bi bi-lightning-fill"></i>
                        Commencer maintenant
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex gap-3 align-items-stretch reveal reveal-d1">
                        <div class="step-line">
                            <div class="step-number">1</div>
                            <div class="step-connector"></div>
                            <div class="step-number">2</div>
                            <div class="step-connector"></div>
                            <div class="step-number">3</div>
                        </div>
                        <div class="d-flex flex-column gap-3 flex-grow-1">
                            <div class="step-card">
                                <h5><i class="bi bi-camera text-primary me-2"></i>Photographiez le problème</h5>
                                <p>Prenez une photo et décrivez le problème que vous observez dans votre quartier.</p>
                            </div>
                            <div class="step-card">
                                <h5><i class="bi bi-geo-alt text-primary me-2"></i>Localisez l'incident</h5>
                                <p>Utilisez votre GPS ou entrez l'adresse exacte pour que les équipes puissent
                                    intervenir rapidement.</p>
                            </div>
                            <div class="step-card">
                                <h5><i class="bi bi-bell text-primary me-2"></i>Suivez le traitement</h5>
                                <p>Recevez des notifications en temps réel sur l'avancement de votre signalement jusqu'à
                                    sa résolution.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- communaute-->
    <section class="cta-band">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7 reveal">
                    <h2>Rejoignez Nous sur Smart-City</h2>
                    <p class="mt-2 mb-0">Plus de <strong style="color:#fff">500 citoyens</strong> ont déjà amélioré
                        leur ville grâce à leurs signalements. C'est votre tour.</p>
                </div>
                <div class="col-lg-5 text-lg-end reveal reveal-d2">
                    <a href="#" class="btn-cta">
                        <i class="bi bi-person-plus-fill"></i>
                        Créer mon compte gratuitement
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--FOOTER-->
    <footer>
        <div class="container">
            <div class="row g-4 mb-2">
                <div class="col-md-4">
                    <a href="#" class="brand d-flex align-items-center gap-2 mb-3">
                        <span class="brand-icon" style="background:var(--blue-primary);color:#fff"><i
                                class="bi bi-geo-alt-fill"></i></span>
                        S-C
                    </a>
                    <p style="font-size:.85rem;line-height:1.7">La plateforme citoyenne pour signaler et suivre les
                        problèmes urbains.</p>
                </div>
                <div class="col-6 col-md-2 offset-md-2">
                    <h6 style="color:#fff;font-weight:700;margin-bottom:.8rem">Plateforme</h6>
                    <div class="d-flex flex-column gap-2">
                        <a href="#">Signaler</a>
                        <a href="#">Mes signalements</a>
                        <a href="#">Carte en direct</a>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <h6 style="color:#fff;font-weight:700;margin-bottom:.8rem">Société</h6>
                    <div class="d-flex flex-column gap-2">
                        <a href="#">À propos</a>
                        <a href="#">Contact</a>
                        <a href="#">Confidentialité</a>
                    </div>
                </div>
            </div>
            <hr class="footer-divider" />
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span>© 2026 SmartCity. Tous droits réservés.</span>
                <div class="d-flex gap-3">
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /* ── Scroll reveal ── */
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.12
        });
        reveals.forEach(el => observer.observe(el));

        /* ── Count-up animation ── */
        function animateCount(el) {
            const target = +el.dataset.target;
            const duration = 1600;
            const step = target / (duration / 16);
            let current = 0;
            const timer = setInterval(() => {
                current = Math.min(current + step, target);
                el.textContent = Math.floor(current).toLocaleString('fr-FR');
                if (current >= target) clearInterval(timer);
            }, 16);
        }
        const countEls = document.querySelectorAll('.count-up');
        const countObs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    animateCount(e.target);
                    countObs.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.4
        });
        countEls.forEach(el => countObs.observe(el));

        /* ── Navbar shadow on scroll ── */
        const navbar = document.querySelector('.navbar-SmartCity');
        window.addEventListener('scroll', () => {
            navbar.style.boxShadow = window.scrollY > 10 ?
                '0 4px 24px rgba(26,111,212,.40)' : '0 4px 20px rgba(26,111,212,.30)';
        });

        /* ── Cat card ripple ── */
        document.querySelectorAll('.cat-card').forEach(card => {
            card.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                ripple.style.cssText = `
        position:absolute; border-radius:50%;
        background:rgba(26,111,212,.15);
        width:${size}px; height:${size}px;
        left:${e.clientX - rect.left - size/2}px;
        top:${e.clientY - rect.top - size/2}px;
        animation:rippleAnim .6s ease-out forwards;
        pointer-events:none;
      `;
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>
    <style>
        @keyframes rippleAnim {
            from {
                transform: scale(0);
                opacity: 1;
            }

            to {
                transform: scale(2.5);
                opacity: 0;
            }
        }
    </style>
</body>

</html>
