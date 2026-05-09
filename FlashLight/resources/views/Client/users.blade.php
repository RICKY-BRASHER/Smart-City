<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet" />
    <!-- Leaflet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" rel="stylesheet" />
    <!-- Leaflet.markercluster -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/MarkerCluster.css"
        rel="stylesheet" />
    <!--css-->
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">

    <style>
        /* Petite astuce pour que le pied de page reste en bas */
        body { display: flex; flex-direction: column; min-height: 100vh; }
        main { flex: 1; }
    </style> 
</head>
<body>

    <main>
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
                            <a href="{{ route('home') }}" class="nav-link-cf {{ Request::routeIs('home') ? 'active' : '' }}" data-section="accueil">
                                <i class="bi bi-house-fill nav-icon"></i>
                                <span class="nav-label">Accueil</span>
                            </a>
                        </li>
                        <li class="nav-item-cf">
                            <a href="{{ route('signaler') }}" class="nav-link-cf {{ Request::routeIs('signaler') ? 'active' : '' }}" >
                                <i class="bi bi-plus-circle-fill nav-icon"></i>
                                <span class="nav-label">Signaler un problème</span>
                            </a>
                        </li>
                        <li class="nav-item-cf">
                            <a href="{{ route('carte_user') }}" class="nav-link-cf {{ Request::routeIs('carte_user') ? 'active' : '' }}" data-section="carte">
                                <i class="bi bi-map-fill nav-icon"></i>
                                <span class="nav-label">Carte des incidents</span>
                            </a>
                        </li>
                        <li class="sidebar-section-title">Mon espace</li>
                        <li class="nav-item-cf">
                            <a href="{{ route('mes_signalements') }}" class="nav-link-cf {{ Request::routeIs('mes_signalements') ? 'active' : '' }}" data-section="mes-signalements">
                                <i class="bi bi-flag-fill nav-icon"></i>
                                <span class="nav-label">Mes signalements</span>
                                <span class="nav-badge">3</span>
                            </a>
                        </li>
                        <li class="nav-item-cf">
                            <a href="{{ route('notif') }}" class="nav-link-cf {{ Request::routeIs('notif') ? 'active' : '' }}" data-section="notifications">
                                <i class="bi bi-bell-fill nav-icon"></i>
                                <span class="nav-label">Notifications</span>
                                <span class="nav-badge">5</span>
                            </a>
                        </li>
                        <li class="nav-item-cf">
                            <a href="{{ route('profil_u') }}" class="nav-link-cf {{ Request::routeIs('profil_u') ? 'active' : '' }}" data-section="profil">
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
                    <div class="user-avatar">
                        @php
                            $words = explode(' ', Auth::user()->name);
                            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                        @endphp
                        {{ $initials }}
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">Citoyen · {{ Auth::user()->adresse }}</div>
                    </div>
                    <a href="{{ route('deconnexion') }}" title="Déconnexion"
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
                        <span class="current" id="currentPageTitle">@yield('title')</span>
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
                        <div class="topbar-avatar" title="Mon profil" onclick="goTo('profil')">
                            @php
                                $words = explode(' ', Auth::user()->name);
                                $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                            @endphp
                            {{ $initials }}
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <div class="page-content">
                    @yield('content') 
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
    </main>
    
    <script src="{{ asset('js/users.js') }}"></script>
    <script src="https://unpkg.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!-- <script src="{{ asset('app.js') }}" type="module"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/leaflet.markercluster.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    @stack('scripts') 

</body>
</html>