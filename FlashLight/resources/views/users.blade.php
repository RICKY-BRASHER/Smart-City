@extends('Layout.app')
@section('title', 'Smart-city')

@push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endpush

@section('content')
    <div class="admin-wrap">

        <!-- Mobile Overlay -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <div class="brand-logo"><i class="bi bi-geo-alt-fill"></i></div>
                <span class="brand-name">Smart<span>City</span></span>
            </div>

            <nav class="sidebar-nav">
                <ul style="list-style:none;padding:0;margin:0">
                    <li class="sidebar-section-title">Navigation</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf active" data-section="accueil">
                            <i class="bi bi-house-fill nav-icon"></i>
                            <span class="nav-label">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="signaler">
                            <i class="bi bi-plus-circle-fill nav-icon"></i>
                            <span class="nav-label">Signaler un problème</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="carte">
                            <i class="bi bi-map-fill nav-icon"></i>
                            <span class="nav-label">Carte des incidents</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Mon espace</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="mes-signalements">
                            <i class="bi bi-flag-fill nav-icon"></i>
                            <span class="nav-label">Mes signalements</span>
                            <span class="nav-badge">3</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="notifications">
                            <i class="bi bi-bell-fill nav-icon"></i>
                            <span class="nav-label">Notifications</span>
                            <span class="nav-badge">5</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="profil">
                            <i class="bi bi-person-circle nav-icon"></i>
                            <span class="nav-label">Mon profil</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Aide</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="faq">
                            <i class="bi bi-question-circle-fill nav-icon"></i>
                            <span class="nav-label">FAQ & Aide</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-user">
                <div class="user-avatar">JM</div>
                <div class="user-info">
                    <div class="user-name">Jean Mbarga</div>
                    <div class="user-role">Citoyen · Akwa, Douala</div>
                </div>
                <a href="#" title="Déconnexion"
                    style="color:rgba(255,255,255,.3);font-size:1rem;text-decoration:none;transition:color .2s"
                    onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,.3)'">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
        </aside>

        <!-- Main Area -->
        <div class="main-area" id="mainArea">

            <!-- Topbar -->
            <header class="topbar">
                <button class="btn-sidebar-toggle" id="sidebarToggle"><i class="bi bi-layout-sidebar-inset"></i></button>
                <div class="topbar-breadcrumb">
                    <i class="bi bi-house-fill" style="font-size:.75rem"></i>
                    <span>/</span>
                    <span class="current" id="currentPageTitle">Accueil</span>
                </div>
                <div class="topbar-search">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" placeholder="Rechercher un incident, une rue…" />
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn" title="Notifications" onclick="goTo('notifications')">
                        <i class="bi bi-bell-fill"></i>
                        <span class="badge-dot"></span>
                    </button>
                    <div class="topbar-avatar" title="Mon profil" onclick="goTo('profil')">JM</div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">

                <!--ACCUEIL-->
                <div id="accueilSection" class="page-section active">
                    <div class="hero-banner anim-1">
                        <div class="hero-illus">🏙️</div>
                        <div class="hero-title">Bonjour, Jean 👋</div>
                        <div class="hero-sub">Signalez un problème dans votre quartier et contribuez à améliorer votre
                            ville.</div>
                        <div class="hero-stats">
                            <div>
                                <div class="hero-stat-val">12</div>
                                <div class="hero-stat-lbl">Mes signalements</div>
                            </div>
                            <div>
                                <div class="hero-stat-val">8</div>
                                <div class="hero-stat-lbl">Résolus</div>
                            </div>
                            <div>
                                <div class="hero-stat-val">1 284</div>
                                <div class="hero-stat-lbl">Incidents dans la ville</div>
                            </div>
                            <button class="btn-report ms-auto" onclick="goTo('signaler')"><i
                                    class="bi bi-plus-circle-fill"></i> Signaler un problème</button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-xl-3 anim-2">
                            <div class="stat-card blue">
                                <div class="stat-icon blue"><i class="bi bi-flag-fill"></i></div>
                                <div class="stat-val">12</div>
                                <div class="stat-lbl">Mes signalements</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +2 ce mois</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-2">
                            <div class="stat-card green">
                                <div class="stat-icon green"><i class="bi bi-check-circle-fill"></i></div>
                                <div class="stat-val">8</div>
                                <div class="stat-lbl">Problèmes résolus</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +1 cette
                                    semaine</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-3">
                            <div class="stat-card orange">
                                <div class="stat-icon orange"><i class="bi bi-hourglass-split"></i></div>
                                <div class="stat-val">3</div>
                                <div class="stat-lbl">En attente</div>
                                <span class="stat-trend flat"><i class="bi bi-dash"></i> Stable</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-4">
                            <div class="stat-card red">
                                <div class="stat-icon red"><i class="bi bi-star-fill"></i></div>
                                <div class="stat-val">47</div>
                                <div class="stat-lbl">Points citoyen</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +5 pts</span>
                            </div>
                        </div>
                    </div>

                    <!--Feed + Sidebarright -->
                    <div class="row g-3 anim-5">
                        <div class="col-lg-8">
                            <div class="cf-card mb-3">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-geo-alt-fill"></i></div>
                                    <h5>Incidents près de chez moi</h5>
                                    <select class="filter-select ms-auto" style="font-size:.75rem;padding:.25rem .6rem">
                                        <option>500 m</option>
                                        <option>1 km</option>
                                        <option>2 km</option>
                                    </select>
                                </div>
                                <div style="padding:1rem">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="incident-card high" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">🕳️</div>
                                                <div class="incident-card-title">Nid-de-poule profond</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Rue Joss, Akwa — 120 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge new"><span
                                                            class="dot"></span>Nouveau</span>
                                                    <span class="cat-pill">🕳️ Voirie</span>
                                                    <span class="incident-card-time">Il y a 4 min</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="incident-card medium" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">💡</div>
                                                <div class="incident-card-title">Lampadaire éteint</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Bd de la Liberté — 340 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span>
                                                    <span class="cat-pill">💡 Éclairage</span>
                                                    <span class="incident-card-time">Il y a 2h</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="incident-card high" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">💧</div>
                                                <div class="incident-card-title">Fuite d'eau importante</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Carrefour Ndokotti — 480 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span>
                                                    <span class="cat-pill">💧 Eau</span>
                                                    <span class="incident-card-time">Il y a 5h</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="incident-card low" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">🗑️</div>
                                                <div class="incident-card-title">Dépôt sauvage d'ordures</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Quartier New Bell — 490 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge resolved"><span
                                                            class="dot"></span>Résolu</span>
                                                    <span class="cat-pill">🗑️ Ordures</span>
                                                    <span class="incident-card-time">Hier</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex flex-column gap-3">
                            <!--Mini mapLeaflet -->
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                                    <h5>Carte de mon quartier</h5>
                                    <a href="#" onclick="goTo('carte')"
                                        style="font-size:.78rem;color:var(--blue);font-weight:600;text-decoration:none;margin-left:auto">Agrandir</a>
                                </div>
                                <div class="cf-card-body" style="padding-bottom:1rem">
                                    <div id="miniMap" class="leaflet-map" style="height:200px; width:100%;"></div>
                                </div>
                            </div>

                            <div class="cf-card flex-grow-1">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-activity"></i></div>
                                    <h5>Mes activités récentes</h5>
                                </div>
                                <div class="cf-card-body" style="padding-top:.5rem;padding-bottom:.5rem">
                                    <div class="activity-item">
                                        <div class="activity-dot new"><i class="bi bi-flag-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Vous avez signalé un
                                                <strong>nid-de-poule</strong> Rue Joss
                                            </div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 4 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot comment"><i class="bi bi-chat-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Un agent a commenté <strong>#CF-1279</strong>
                                            </div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 1h</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot resolved"><i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">Votre signalement <strong>#CF-1268</strong> a
                                                été
                                                résolu</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Hier, 14h32</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot assign"><i class="bi bi-person-check-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text"><strong>#CF-1275</strong> assigné à Agent Kouam
                                            </div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 2 jours</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--SIGNALER-->
                <div id="signalerSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Signaler un problème</h1>
                            <p>Décrivez le problème que vous avez constaté dans votre quartier.</p>
                        </div>
                    </div>
                    <div class="row g-3 anim-2">
                        <div class="col-lg-8">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-plus-circle-fill"></i></div>
                                    <h5>Nouveau signalement</h5>
                                </div>
                                <div class="cf-card-body">
                                    <div class="step-indicator mb-4">
                                        <div>
                                            <div class="step-dot done" id="step1dot">✓</div>
                                            <div class="step-lbl">Catégorie</div>
                                        </div>
                                        <div class="step-line done" id="line12"></div>
                                        <div>
                                            <div class="step-dot active" id="step2dot">2</div>
                                            <div class="step-lbl">Détails</div>
                                        </div>
                                        <div class="step-line" id="line23"></div>
                                        <div>
                                            <div class="step-dot" id="step3dot">3</div>
                                            <div class="step-lbl">Localisation</div>
                                        </div>
                                        <div class="step-line" id="line34"></div>
                                        <div>
                                            <div class="step-dot" id="step4dot">4</div>
                                            <div class="step-lbl">Confirmation</div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Catégorie du problème <span
                                                style="color:var(--red)">*</span></label>
                                        <div class="row g-2">
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card selected"
                                                    style="border:2px solid var(--blue);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:var(--blue-xlight);transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">🕳️</div>
                                                    <div style="font-size:.78rem;font-weight:700;color:var(--blue)">
                                                        Nid-de-poule</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">💡</div>
                                                    <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Éclairage</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">🗑️</div>
                                                    <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Ordures</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">💧</div>
                                                    <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Fuite d'eau</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">🌲</div>
                                                    <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Espaces verts</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">⚡</div>
                                                    <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Autre</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Titre du signalement <span
                                                style="color:var(--red)">*</span></label>
                                        <input type="text" class="form-control"
                                            placeholder="Ex : Nid-de-poule dangereux devant l'école" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description <span
                                                style="color:var(--red)">*</span></label>
                                        <textarea class="form-control"
                                            placeholder="Décrivez le problème en détail : taille, danger, depuis combien de temps…"></textarea>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Quartier <span
                                                    style="color:var(--red)">*</span></label>
                                            <select class="form-select">
                                                <option>Akwa</option>
                                                <option>Bepanda</option>
                                                <option>New Bell</option>
                                                <option>Bonamoussadi</option>
                                                <option>Deido</option>
                                                <option>Ndokotti</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Rue / Adresse <span
                                                    style="color:var(--red)">*</span></label>
                                            <input type="text" class="form-control" placeholder="Ex : Rue Joss" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Niveau d'urgence</label>
                                        <div class="d-flex gap-2">
                                            <label style="flex:1;cursor:pointer">
                                                <input type="radio" name="urgence" class="d-none" />
                                                <div class="urgence-opt"
                                                    style="border:2px solid var(--border);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--green);background:#fff;cursor:pointer;transition:all .2s"
                                                    onclick="selectUrgence(this,'green','#16a34a')">🟢 Basse</div>
                                            </label>
                                            <label style="flex:1;cursor:pointer">
                                                <input type="radio" name="urgence" class="d-none" />
                                                <div class="urgence-opt"
                                                    style="border:2px solid var(--border);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--orange);background:#fff;cursor:pointer;transition:all .2s"
                                                    onclick="selectUrgence(this,'orange','#ea580c')">🟡 Moyenne</div>
                                            </label>
                                            <label style="flex:1;cursor:pointer">
                                                <input type="radio" name="urgence" class="d-none" />
                                                <div class="urgence-opt selected-urgence"
                                                    style="border:2px solid var(--red);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--red);background:var(--red-light);cursor:pointer;transition:all .2s"
                                                    onclick="selectUrgence(this,'red','#dc2626')">🔴 Haute</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Photo(s) du problème</label>
                                        <div class="upload-zone" onclick="showToast('info','Fonctionnalité à venir !')">
                                            <i class="bi bi-cloud-arrow-up"></i>
                                            <p style="font-weight:700;margin-bottom:.2rem;color:var(--text-mid)">
                                                Glissez
                                                vos photos ici</p>
                                            <p>ou <span style="color:var(--blue);font-weight:600;cursor:pointer">parcourez
                                                    vos fichiers</span></p>
                                            <p style="margin-top:.4rem;font-size:.72rem">JPG, PNG · Max 5 Mo · 3 photos
                                                max</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end gap-2">
                                        <button class="btn btn-light"
                                            style="border-radius:10px;font-weight:600;font-family:inherit">Annuler</button>
                                        <button class="btn-report"
                                            onclick="showToast('success','Signalement envoyé avec succès !')">
                                            <i class="bi bi-send-fill"></i> Envoyer le signalement
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex flex-column gap-3">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header" style="background:#fef3c7;color:#d97706"><i
                                            class="bi bi-lightbulb-fill"></i></div>
                                    <h5>Conseils</h5>
                                </div>
                                <div class="cf-card-body" style="font-size:.83rem;color:var(--text-mid)">
                                    <div class="d-flex flex-column gap-3">
                                        <div class="d-flex gap-2">
                                            <div
                                                style="width:28px;height:28px;border-radius:8px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.9rem">
                                                <i class="bi bi-camera-fill"></i>
                                            </div>
                                            <div><strong style="color:var(--text-dark)">Ajoutez une
                                                    photo</strong><br>Les signalements avec photos sont traités 2× plus
                                                vite.</div>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <div
                                                style="width:28px;height:28px;border-radius:8px;background:var(--green-light);color:var(--green);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.9rem">
                                                <i class="bi bi-geo-alt-fill"></i>
                                            </div>
                                            <div><strong style="color:var(--text-dark)">Localisation
                                                    précise</strong><br>Indiquez des repères proches : école, carrefour,
                                                etc.</div>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <div
                                                style="width:28px;height:28px;border-radius:8px;background:var(--orange-light);color:var(--orange);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.9rem">
                                                <i class="bi bi-pencil-fill"></i>
                                            </div>
                                            <div><strong style="color:var(--text-dark)">Description
                                                    claire</strong><br>Plus vous êtes précis, plus vite le problème sera
                                                résolu.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bar-chart-fill"></i></div>
                                    <h5>Statistiques de la ville</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-2">
                                    <div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <span style="font-size:.8rem;font-weight:600">Taux de résolution</span>
                                            <span style="font-size:.8rem;font-weight:700;color:var(--blue)">70%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:70%;background:var(--blue)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <span style="font-size:.8rem;font-weight:600">Délai moyen de
                                                traitement</span>
                                            <span style="font-size:.8rem;font-weight:700;color:var(--green)">3.2
                                                j</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:80%;background:var(--green)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 p-2 rounded-3"
                                        style="background:var(--blue-xlight);border:1px solid var(--blue-light)">
                                        <div style="font-size:.72rem;color:var(--text-muted)">Signalement le plus
                                            signalé</div>
                                        <div style="font-size:.88rem;font-weight:700;color:var(--blue)">🕳️
                                            Nid-de-poule
                                            (311)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--CARTE-->
                <div id="carteSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Carte des incidents</h1>
                            <p>Visualisez les incidents signalés dans votre ville en temps réel.</p>
                        </div>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                            <h5>Carte en direct — Douala, Cameroun</h5>
                            <div class="d-flex gap-1 ms-auto">
                                <select class="filter-select" style="font-size:.75rem;padding:.25rem .6rem">
                                    <option>Tous les incidents</option>
                                    <option>Nid-de-poule</option>
                                    <option>Éclairage</option>
                                    <option>Ordures</option>
                                    <option>Eau</option>
                                </select>
                                <select class="filter-select" style="font-size:.75rem;padding:.25rem .6rem">
                                    <option>Tous statuts</option>
                                    <option>Nouveau</option>
                                    <option>En cours</option>
                                    <option>Résolu</option>
                                </select>
                            </div>
                        </div>
                        <div class="cf-card-body" style="padding-bottom:0">
                            <!-- Légende au-dessus -->
                            <div class="d-flex gap-3 flex-wrap mb-3">
                                <div class="d-flex align-items-center gap-1"
                                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--red)"></span>Haute
                                    priorité</div>
                                <div class="d-flex align-items-center gap-1"
                                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--orange)"></span>Moyenne
                                    priorité</div>
                                <div class="d-flex align-items-center gap-1"
                                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--green)"></span>Résolu
                                </div>
                                <div class="d-flex align-items-center gap-1"
                                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--blue)"></span>Nouveau
                                </div>
                            </div>
                            <div id="mainMap" class="leaflet-map" style="height:440px;width:100%;border-radius:12px;">
                            </div>
                        </div>
                        <!-- Stats sous carte -->
                        <div class="row g-0 mt-0" style="border-top:1px solid var(--border)">
                            <div class="col-3 text-center p-3" style="border-right:1px solid var(--border)">
                                <div style="font-size:1.3rem;font-weight:800;color:var(--red)">18</div>
                                <div style="font-size:.72rem;color:var(--text-muted)">Haute priorité</div>
                            </div>
                            <div class="col-3 text-center p-3" style="border-right:1px solid var(--border)">
                                <div style="font-size:1.3rem;font-weight:800;color:var(--orange)">22</div>
                                <div style="font-size:.72rem;color:var(--text-muted)">En cours</div>
                            </div>
                            <div class="col-3 text-center p-3" style="border-right:1px solid var(--border)">
                                <div style="font-size:1.3rem;font-weight:800;color:var(--blue)">7</div>
                                <div style="font-size:.72rem;color:var(--text-muted)">Nouveaux</div>
                            </div>
                            <div class="col-3 text-center p-3">
                                <div style="font-size:1.3rem;font-weight:800;color:var(--green)">896</div>
                                <div style="font-size:.72rem;color:var(--text-muted)">Résolus total</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--MES SIGNALEMENTS-->
                <div id="mes-signalementsSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Mes signalements</h1>
                            <p>Suivez l'avancement de vos signalements en temps réel.</p>
                        </div>
                        <button class="btn-report ms-auto" onclick="goTo('signaler')"><i
                                class="bi bi-plus-circle-fill"></i> Nouveau signalement</button>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-flag-fill"></i></div>
                            <h5>Historique de mes signalements</h5>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher…" /></div>
                            <select class="filter-select">
                                <option>Tous statuts</option>
                                <option>Nouveau</option>
                                <option>En cours</option>
                                <option>Résolu</option>
                                <option>Rejeté</option>
                            </select>
                            <select class="filter-select">
                                <option>Catégorie</option>
                                <option>Nid-de-poule</option>
                                <option>Éclairage</option>
                                <option>Ordures</option>
                                <option>Fuite d'eau</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Incident</th>
                                        <th>Catégorie</th>
                                        <th>Statut</th>
                                        <th>Priorité</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="incident-id">#CF-1284</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">
                                                Nid-de-poule profond</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Rue Joss, Akwa
                                            </div>
                                        </td>
                                        <td><span class="cat-pill">🕳️ Nid-de-poule</span></td>
                                        <td><span class="status-badge new"><span class="dot"></span>Nouveau</span>
                                        </td>
                                        <td><span class="prio high">● Haute</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1275</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">
                                                Lampadaire éteint</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Bd de la
                                                Liberté
                                            </div>
                                        </td>
                                        <td><span class="cat-pill">💡 Éclairage</span></td>
                                        <td><span class="status-badge progress"><span class="dot"></span>En
                                                cours</span>
                                        </td>
                                        <td><span class="prio medium">● Moyenne</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 2
                                                jours</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1268</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">Fuite
                                                d'eau importante</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Carrefour
                                                Ndokotti</div>
                                        </td>
                                        <td><span class="cat-pill">💧 Fuite d'eau</span></td>
                                        <td><span class="status-badge resolved"><span class="dot"></span>Résolu</span>
                                        </td>
                                        <td><span class="prio high">● Haute</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Hier, 14h32</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1251</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">Dépôt
                                                sauvage d'ordures</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Rue Castelnau
                                            </div>
                                        </td>
                                        <td><span class="cat-pill">🗑️ Ordures</span></td>
                                        <td><span class="status-badge resolved"><span class="dot"></span>Résolu</span>
                                        </td>
                                        <td><span class="prio low">● Basse</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">13 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination">
                            <button class="cf-page-btn"><i class="bi bi-chevron-left"></i></button>
                            <button class="cf-page-btn active">1</button>
                            <button class="cf-page-btn">2</button>
                            <button class="cf-page-btn"><i class="bi bi-chevron-right"></i></button>
                            <span class="cf-page-info">Affichage 1–4 sur 12 signalements</span>
                        </div>
                    </div>
                </div>

                <!--NOTIFICATIONS-->
                <div id="notificationsSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Notifications</h1>
                            <p>Restez informé de l'avancement de vos signalements.</p>
                        </div>
                        <button class="btn-add ms-auto"
                            onclick="showToast('success','Toutes les notifications marquées comme lues !')"><i
                                class="bi bi-check2-all"></i> Tout marquer lu</button>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
                            <h5>Toutes les notifications</h5>
                            <span
                                style="margin-left:auto;background:var(--blue);color:#fff;font-size:.65rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">5
                                non lues</span>
                        </div>
                        <div class="notif-item unread" onclick="showToast('info','Notification : Signalement résolu')">
                            <div class="notif-dot" style="background:var(--green-light);color:var(--green)"><i
                                    class="bi bi-check-circle-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1268</strong> a été
                                    <strong>résolu</strong> par l'Agent Kouam Pierre.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                                    45
                                    min</div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread" onclick="showToast('info','Notification : Signalement assigné')">
                            <div class="notif-dot" style="background:var(--orange-light);color:var(--orange)"><i
                                    class="bi bi-person-check-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1275</strong> a été assigné à
                                    <strong>Agent Kouam Pierre</strong>.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                                    1h
                                </div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread" onclick="showToast('info','Notification : Nouveau commentaire')">
                            <div class="notif-dot" style="background:#f3e8ff;color:#7c3aed"><i
                                    class="bi bi-chat-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Un commentaire a été ajouté sur votre signalement
                                    <strong>#CF-1279</strong>.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                                    2h
                                </div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread"
                            onclick="showToast('info','Notification : Signalement enregistré')">
                            <div class="notif-dot" style="background:#e0f2fe;color:#0369a1"><i
                                    class="bi bi-flag-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1284</strong> a bien été
                                    enregistré.</div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a 4
                                    min</div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread" onclick="showToast('error','Notification : Signalement rejeté')">
                            <div class="notif-dot" style="background:var(--red-light);color:var(--red)"><i
                                    class="bi bi-x-circle-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1240</strong> a été
                                    <strong>rejeté</strong>. Raison : doublon.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Hier,
                                    10h22
                                </div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:var(--green-light);color:var(--green)"><i
                                    class="bi bi-check-circle-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1251</strong> a été résolu.</div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> 13 Avr.,
                                    09h00</div>
                            </div>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:var(--blue-light);color:var(--blue)"><i
                                    class="bi bi-star-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Vous avez gagné <strong>+5 points citoyen</strong> pour votre
                                    contribution.</div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> 12 Avr.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PROFIL-->
                <div id="profilSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Mon profil</h1>
                        <p>Gérez vos informations personnelles et vos préférences.</p>
                    </div>
                    <div class="row g-3 anim-2">
                        <div class="col-lg-4">
                            <div class="cf-card text-center" style="padding:2rem 1.5rem">
                                <div class="profile-avatar-lg mx-auto mb-3">JM</div>
                                <div style="font-size:1.15rem;font-weight:800;color:var(--text-dark)">Jean Mbarga</div>
                                <div style="font-size:.82rem;color:var(--text-muted);margin-bottom:1rem">
                                    jean.mbarga@gmail.com</div>
                                <span
                                    style="background:var(--blue-light);color:var(--blue);font-size:.72rem;font-weight:700;border-radius:99px;padding:.25rem .75rem"><i
                                        class="bi bi-patch-check-fill"></i> Citoyen vérifié</span>
                                <div class="row g-2 mt-3">
                                    <div class="col-4">
                                        <div class="profile-stat">
                                            <div class="profile-stat-val">12</div>
                                            <div class="profile-stat-lbl">Signalements</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="profile-stat">
                                            <div class="profile-stat-val">8</div>
                                            <div class="profile-stat-lbl">Résolus</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="profile-stat">
                                            <div class="profile-stat-val" style="color:var(--accent)">47</div>
                                            <div class="profile-stat-lbl">Points</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 p-3 rounded-3 text-start"
                                    style="background:var(--blue-xlight);border:1px solid var(--blue-light)">
                                    <div
                                        style="font-size:.72rem;color:var(--text-muted);font-weight:600;margin-bottom:.3rem">
                                        NIVEAU CITOYEN</div>
                                    <div style="font-size:.88rem;font-weight:700;color:var(--blue);margin-bottom:.4rem">
                                        🥈 Citoyen Actif</div>
                                    <div class="cf-progress">
                                        <div class="cf-progress-bar" style="width:47%;background:var(--blue)"></div>
                                    </div>
                                    <div style="font-size:.7rem;color:var(--text-muted);margin-top:.25rem">47 / 100 pts
                                        pour atteindre Expert</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <!-- Carte des signalements dans le profil -->
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                                    <h5>Mes signalements sur la carte</h5>
                                </div>
                                <div class="cf-card-body" style="padding-bottom: 0;">
                                    <div id="profileMap" class="profile-map-container"></div>
                                </div>
                            </div>

                            <div class="cf-card mb-3">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-person-fill"></i></div>
                                    <h5>Informations personnelles</h5>
                                    <button class="btn-add ms-auto"
                                        onclick="showToast('info','Fonctionnalité à venir !')"><i
                                            class="bi bi-pencil-fill"></i> Modifier</button>
                                </div>
                                <div class="cf-card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6"><label class="form-label">Nom</label><input type="text"
                                                class="form-control" value="Mbarga" readonly
                                                style="background:var(--bg)" /></div>
                                        <div class="col-md-6"><label class="form-label">Prénom</label><input
                                                type="text" class="form-control" value="Jean" readonly
                                                style="background:var(--bg)" /></div>
                                        <div class="col-md-6"><label class="form-label">Email</label><input
                                                type="email" class="form-control" value="jean.mbarga@gmail.com"
                                                readonly style="background:var(--bg)" /></div>
                                        <div class="col-md-6"><label class="form-label">Téléphone</label><input
                                                type="text" class="form-control" value="6 50 50 50 50" readonly
                                                style="background:var(--bg)" /></div>
                                        <div class="col-md-6"><label class="form-label">Quartier</label><input
                                                type="text" class="form-control" value="Akwa" readonly
                                                style="background:var(--bg)" /></div>
                                        <div class="col-md-6"><label class="form-label">Ville</label><input
                                                type="text" class="form-control" value="Douala" readonly
                                                style="background:var(--bg)" /></div>
                                        <div class="col-md-6"><label class="form-label">Membre depuis</label><input
                                                type="text" class="form-control" value="Janvier 2025" readonly
                                                style="background:var(--bg)" /></div>
                                    </div>
                                </div>
                            </div>

                            <!--Préférences (Mode sombre + Langue) -->
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-gear-fill"></i></div>
                                    <h5>Préférences</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <!-- Mode sombre -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div style="font-weight:600;font-size:.88rem"><i
                                                    class="bi bi-moon-stars-fill me-2" style="color:var(--blue)"></i>Mode
                                                sombre</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Réduit la luminosité
                                                pour un confort visuel optimal</div>
                                        </div>
                                        <label class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="darkModeToggle"
                                                style="width:2.5rem;height:1.3rem;cursor:pointer"
                                                onchange="toggleDarkMode(this.checked)">
                                            <span class="form-check-label" for="darkModeToggle"></span>
                                        </label>
                                    </div>

                                    <!-- Langue -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div style="font-weight:600;font-size:.88rem"><i class="bi bi-translate me-2"
                                                    style="color:var(--blue)"></i>Langue
                                                de
                                                l'interface</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Choisissez la langue
                                                d'affichage</div>
                                        </div>
                                        <div class="lang-dropdown">
                                            <button class="lang-dropdown-btn" onclick="toggleLangDropdown()">
                                                <span id="currentLang">🇫🇷 Français</span>
                                                <i class="bi bi-chevron-down" style="font-size:.7rem"></i>
                                            </button>
                                            <div class="lang-dropdown-menu" id="langDropdownMenu">
                                                <div class="lang-dropdown-item" onclick="changeLanguage('fr')">
                                                    <span>🇫🇷</span> Français
                                                </div>
                                                <div class="lang-dropdown-item" onclick="changeLanguage('en')">
                                                    <span>🇬🇧</span> English
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
                                    <h5>Préférences de notifications</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div style="font-weight:600;font-size:.88rem">Mise à jour de mes
                                                signalements</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Recevoir une
                                                notification à chaque changement de statut</div>
                                        </div>
                                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                                type="checkbox" checked style="width:2.5rem;height:1.3rem;cursor:pointer"
                                                onclick="showToast('success','Préférence mise à jour !')"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div style="font-weight:600;font-size:.88rem">Commentaires des agents</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Être notifié quand un
                                                agent commente</div>
                                        </div>
                                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                                type="checkbox" checked style="width:2.5rem;height:1.3rem;cursor:pointer"
                                                onclick="showToast('success','Préférence mise à jour !')"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div style="font-weight:600;font-size:.88rem">Incidents dans mon quartier
                                            </div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Être informé des
                                                nouveaux incidents à moins de 500 m</div>
                                        </div>
                                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                                type="checkbox" style="width:2.5rem;height:1.3rem;cursor:pointer"
                                                onclick="showToast('success','Préférence mise à jour !')"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div style="font-weight:600;font-size:.88rem">Emails récapitulatifs</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Résumé hebdomadaire
                                                par email</div>
                                        </div>
                                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                                type="checkbox" checked style="width:2.5rem;height:1.3rem;cursor:pointer"
                                                onclick="showToast('success','Préférence mise à jour !')"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--FAQ -->
                <div id="faqSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>FAQ & Aide</h1>
                        <p>Trouvez des réponses à vos questions fréquentes.</p>
                    </div>
                    <div class="row g-3 anim-2">
                        <div class="col-lg-8">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-question-circle-fill"></i></div>
                                    <h5>Questions fréquentes</h5>
                                </div>
                                <div class="cf-card-body">
                                    <div class="accordion" id="faqAccordion">
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden;margin-bottom:.75rem">
                                            <h2 class="accordion-header"><button class="accordion-button"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faq1">Comment signaler un problème ?</button></h2>
                                            <div id="faq1" class="accordion-collapse collapse show"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Cliquez sur
                                                    <strong>"Signaler un problème"</strong> dans le menu ou le bouton en
                                                    haut de page. Remplissez le formulaire avec la catégorie, une
                                                    description claire, la localisation et une photo si possible.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden;margin-bottom:.75rem">
                                            <h2 class="accordion-header"><button class="accordion-button collapsed"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Quel
                                                    est le délai de traitement ?</button></h2>
                                            <div id="faq2" class="accordion-collapse collapse"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Le délai moyen de
                                                    traitement est de <strong>3,2 jours</strong>. Les signalements
                                                    prioritaires sont traités en moins de 24h. Vous serez notifié à
                                                    chaque étape.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden;margin-bottom:.75rem">
                                            <h2 class="accordion-header"><button class="accordion-button collapsed"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faq3">Comment sont attribués les points citoyen
                                                    ?</button></h2>
                                            <div id="faq3" class="accordion-collapse collapse"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Vous gagnez des
                                                    points à chaque signalement (<strong>+5 pts</strong>), quand votre
                                                    signalement est résolu (<strong>+10 pts</strong>) et quand il est
                                                    validé avec photo (<strong>+3 pts</strong>).</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden">
                                            <h2 class="accordion-header"><button class="accordion-button collapsed"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#faq4">Que
                                                    faire si mon signalement est rejeté ?</button></h2>
                                            <div id="faq4" class="accordion-collapse collapse"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Vous recevrez une
                                                    notification avec la raison du rejet (doublon, hors zone, etc.).
                                                    Vous pouvez resoumettre un signalement corrigé ou contacter le
                                                    support.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-headset"></i></div>
                                    <h5>Contacter le support</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="d-flex gap-3 align-items-center p-3 rounded-3"
                                        style="background:var(--bg);border:1px solid var(--border);cursor:pointer;transition:all .2s"
                                        onmouseover="this.style.borderColor='var(--blue)'"
                                        onmouseout="this.style.borderColor='var(--border)'"
                                        onclick="showToast('info','Contact par email')">
                                        <div
                                            style="width:38px;height:38px;border-radius:10px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:.85rem">Email</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">support@Smart-City.cm
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 align-items-center p-3 rounded-3"
                                        style="background:var(--bg);border:1px solid var(--border);cursor:pointer;transition:all .2s"
                                        onmouseover="this.style.borderColor='var(--green)'"
                                        onmouseout="this.style.borderColor='var(--border)'"
                                        onclick="showToast('info','Contact par téléphone')">
                                        <div
                                            style="width:38px;height:38px;border-radius:10px;background:var(--green-light);color:var(--green);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:.85rem">Téléphone</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">+237 233 XX XX XX
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 align-items-center p-3 rounded-3"
                                        style="background:var(--bg);border:1px solid var(--border);cursor:pointer;transition:all .2s"
                                        onmouseover="this.style.borderColor='var(--orange)'"
                                        onmouseout="this.style.borderColor='var(--border)'"
                                        onclick="showToast('info','Chat en direct')">
                                        <div
                                            style="width:38px;height:38px;border-radius:10px;background:var(--orange-light);color:var(--orange);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0">
                                            <i class="bi bi-chat-dots-fill"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:.85rem">Chat en direct</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Lun–Ven, 8h–17h</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.page-content -->
        </div>
        <!-- /.main-area -->

        <!-- ─── Modals ─── -->
        <div class="modal fade" id="viewSignalModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Détails du signalement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><strong>ID :</strong> <span class="incident-id">#CF-1284</span></div>
                        <div class="mb-3"><strong>Titre :</strong> Nid-de-poule profond</div>
                        <div class="mb-3"><strong>Localisation :</strong> Rue Joss, Akwa</div>
                        <div class="mb-3"><strong>Catégorie :</strong> <span class="cat-pill">🕳️
                                Nid-de-poule</span>
                        </div>
                        <div class="mb-3"><strong>Statut :</strong> <span class="status-badge new"><span
                                    class="dot"></span>Nouveau</span></div>
                        <div class="mb-3"><strong>Priorité :</strong> <span class="prio high">● Haute</span></div>
                        <div class="mb-3"><strong>Date :</strong> Il y a 4 min</div>
                        <div class="mb-3"><strong>Description :</strong>
                            <p class="mb-0 mt-1" style="font-size:.85rem;color:var(--text-mid)">Un nid-de-poule très
                                profond et dangereux pour les usagers de la route.</p>
                        </div>
                        <div
                            style="background:var(--orange-light);border-radius:10px;padding:.75rem 1rem;font-size:.82rem;color:var(--orange);font-weight:600">
                            <i class="bi bi-hourglass-split me-1"></i>En attente d'assignation à un agent terrain.
                        </div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Fermer</button></div>
                </div>
            </div>
        </div>

    </div><!-- /.admin-wrap -->

    <!-- Toast Container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer" style="z-index:9999"></div>
@endsection

@push('extra-js')
    <<script src="{{asset('js/users.js')}}"></script>
@endpush