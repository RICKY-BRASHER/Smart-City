@extends('Layout.app')
@section('title', 'SmartCity')

@push('extra-css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush

@section('content')
    {

    <div class="admin-wrap">

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <div class="brand-logo"><i class="bi bi-geo-alt-fill"></i></div>
                <span class="brand-name">Smart<span>City</span></span>
            </div>
            <nav class="sidebar-nav">
                <ul style="list-style:none;padding:0;margin:0">
                    <li class="sidebar-section-title">Principal</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf active" data-section="dashboard">
                            <i class="bi bi-grid-fill nav-icon"></i>
                            <span class="nav-label">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="signalements">
                            <i class="bi bi-flag-fill nav-icon"></i>
                            <span class="nav-label">Signalements</span>
                            <span class="nav-badge">24</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="carte">
                            <i class="bi bi-geo-alt-fill nav-icon"></i>
                            <span class="nav-label">Carte en direct</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Gestion</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="utilisateurs">
                            <i class="bi bi-people-fill nav-icon"></i>
                            <span class="nav-label">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="agents">
                            <i class="bi bi-person-workspace nav-icon"></i>
                            <span class="nav-label">Agents terrain</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="categories">
                            <i class="bi bi-tags-fill nav-icon"></i>
                            <span class="nav-label">Catégories</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="commentaires">
                            <i class="bi bi-chat-dots-fill nav-icon"></i>
                            <span class="nav-label">Commentaires</span>
                            <span class="nav-badge">7</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Système</li>
                    <li class="nav-item-cf">
                        <a href="#" id="notif" class="nav-link-cf" data-section="notifications">
                            <i class="bi bi-bell-fill nav-icon"></i>
                            <span class="nav-label">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="parametres">
                            <i class="bi bi-gear-fill nav-icon"></i>
                            <span class="nav-label">Paramètres</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="roles">
                            <i class="bi bi-shield-lock-fill nav-icon"></i>
                            <span class="nav-label">Rôles &amp; Accès</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-user">
                <div class="user-avatar">AD</div>
                <div class="user-info">
                    <div class="user-name">Admin User</div>
                    <div class="user-role">Super Admin</div>
                </div>
            </div>
        </aside>

        <!-- Main Area -->
        <div class="main-area" id="mainArea">
            <!-- Topbar -->
            <header class="topbar">
                <button class="btn-sidebar-toggle" id="sidebarToggle" title="Menu">
                    <i class="bi bi-layout-sidebar-inset"></i>
                </button>
                <div class="topbar-breadcrumb">
                    <i class="bi bi-house-fill" style="font-size:.75rem"></i>
                    <span>/</span>
                    <span class="current" id="currentPageTitle">Dashboard</span>
                </div>
                <div class="topbar-search">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" placeholder="Rechercher un incident, utilisateur…" />
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn" title="Notifications">
                        <i class="bi bi-bell-fill"></i>
                        <span class="badge-dot"></span>
                    </button>
                    <button class="icon-btn" title="Messages"><i class="bi bi-envelope-fill"></i></button>
                    <div class="topbar-avatar-wrap">
                        <div class="topbar-avatar" id="topbarAvatarBtn" title="Mon profil">AD</div>
                        <div class="topbar-dropdown" id="topbarDropdown">
                            <button class="topbar-dropdown-item"
                                onclick="navigateTo('parametres');document.getElementById('topbarDropdown').classList.remove('open')"><i
                                    class="bi bi-gear-fill"></i> Paramètres</button>
                            <hr class="topbar-dropdown-divider">
                            <button class="topbar-dropdown-item logout" onclick="handleLogout()"><i
                                    class="bi bi-box-arrow-right"></i> Déconnexion</button>
                        </div>
                    </div>
                </div>
            </header>

            <div class="page-content">

                <!-- ====== DASHBOARD ====== -->
                <div id="dashboardSection" class="page-section active">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Tableau de bord</h1>
                            <p>Bienvenue, voici l'état en temps réel de la plateforme Smart-City.</p>
                        </div>
                        <div class="ms-md-auto d-flex align-items-center gap-2">
                            <div class="date-pill"><i class="bi bi-calendar3" style="color:var(--blue)"></i> 16 Avril
                                2026</div>
                            <button class="btn-add"><i class="bi bi-download"></i> Exporter</button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-xl-3 anim-1">
                            <div class="stat-card blue">
                                <div class="stat-icon blue"><i class="bi bi-flag-fill"></i></div>
                                <div class="stat-val count-up" data-target="1284">0</div>
                                <div class="stat-lbl">Total signalements</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +12% ce mois</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-2">
                            <div class="stat-card orange">
                                <div class="stat-icon orange"><i class="bi bi-hourglass-split"></i></div>
                                <div class="stat-val count-up" data-target="342">0</div>
                                <div class="stat-lbl">En cours de traitement</div>
                                <span class="stat-trend flat"><i class="bi bi-dash"></i> Stable</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-3">
                            <div class="stat-card green">
                                <div class="stat-icon green"><i class="bi bi-check-circle-fill"></i></div>
                                <div class="stat-val count-up" data-target="896">0</div>
                                <div class="stat-lbl">Problèmes résolus</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +8% ce mois</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-4">
                            <div class="stat-card red">
                                <div class="stat-icon red"><i class="bi bi-people-fill"></i></div>
                                <div class="stat-val count-up" data-target="5241">0</div>
                                <div class="stat-lbl">Utilisateurs inscrits</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +24% ce mois</span>
                            </div>
                        </div>
                    </div>

                    <!-- Charts row -->
                    <div class="row g-3 mb-4">
                        <div class="col-lg-8 anim-5">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bar-chart-fill"></i></div>
                                    <h5>Évolution des signalements — Avril 2026</h5>
                                    <span
                                        style="font-size:.75rem;color:var(--text-muted);background:var(--bg);padding:.2rem .6rem;border-radius:8px;margin-left:auto">Données
                                        statiques</span>
                                </div>
                                <div class="cf-card-body" style="padding-bottom:.5rem">
                                    <canvas id="barLineChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 anim-6">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-pie-chart-fill"></i></div>
                                    <h5>Par catégorie</h5>
                                </div>
                                <div class="cf-card-body">
                                    <canvas id="donutChart" height="170"></canvas>
                                    <div class="d-flex flex-column gap-2 mt-3">
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#1a6fd4"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Nid-de-poule</span><span
                                                class="legend-val">311</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#f0a500"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Ordures</span><span
                                                class="legend-val">248</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#16a34a"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Éclairage</span><span
                                                class="legend-val">134</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#ea580c"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Fuite d'eau</span><span
                                                class="legend-val">87</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#7c3aed"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Autres</span><span
                                                class="legend-val">504</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table + Mini-map + Activity -->
                    <div class="row g-3 mb-4">
                        <div class="col-lg-8">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-table"></i></div>
                                    <h5>Signalements récents</h5>
                                </div>
                                <div class="filter-bar">
                                    <div class="filter-search-wrap">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="filter-search" placeholder="Rechercher..." />
                                    </div>
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
                                                    <div class="incident-title">Nid-de-poule profond</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Rue Joss, Akwa</div>
                                                </td>
                                                <td><span class="cat-pill nid">
                                                        <?xml version="1.0"?><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path
                                                                d="M3 12h18M3 12c2-4 5-6 9-6s7 2 9 6M3 12c2 4 5 6 9 6s7-2 9-6" />
                                                            <ellipse cx="12" cy="14" rx="4"
                                                                ry="2" />
                                                        </svg> Nid-de-poule
                                                    </span></td>
                                                <td><span class="status-badge new"><span
                                                            class="dot"></span>Nouveau</span></td>
                                                <td><span class="prio high">● Haute</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4
                                                        min</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1283</span></td>
                                                <td>
                                                    <div class="incident-title">Lampadaire éteint</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Bd de la Liberté</div>
                                                </td>
                                                <td><span class="cat-pill eclairage"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="13"
                                                            height="13" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path
                                                                d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
                                                            <path d="M9 18h6" />
                                                            <path d="M10 22h4" />
                                                        </svg> Éclairage</span></td>
                                                <td><span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span></td>
                                                <td><span class="prio medium">● Moyenne</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a
                                                        2h</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1282</span></td>
                                                <td>
                                                    <div class="incident-title">Fuite d'eau importante</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Carrefour Ndokotti</div>
                                                </td>
                                                <td><span class="cat-pill eau"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                                                        </svg> Fuite d'eau</span></td>
                                                <td><span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span></td>
                                                <td><span class="prio high">● Haute</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a
                                                        5h</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1281</span></td>
                                                <td>
                                                    <div class="incident-title">Dépôt sauvage d'ordures</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Quartier New Bell</div>
                                                </td>
                                                <td><span class="cat-pill ordures"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6" />
                                                            <path d="M19 6l-1 14H6L5 6" />
                                                            <path d="M10 11v6" />
                                                            <path d="M14 11v6" />
                                                            <path d="M9 6V4h6v2" />
                                                        </svg> Ordures</span></td>
                                                <td><span class="status-badge resolved"><span
                                                            class="dot"></span>Résolu</span></td>
                                                <td><span class="prio low">● Basse</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Hier,
                                                        14h32</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1280</span></td>
                                                <td>
                                                    <div class="incident-title">Arbre tombé sur route</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Av. Charles de Gaulle</div>
                                                </td>
                                                <td><span class="cat-pill vert"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M17 14l3-3-3-3" />
                                                            <path d="M14 17l3 3-3 3" />
                                                            <path d="M3 7l9 9M3 17l9-9" />
                                                            <path d="M12 3v18" />
                                                        </svg> Espaces verts</span></td>
                                                <td><span class="status-badge rejected"><span
                                                            class="dot"></span>Rejeté</span></td>
                                                <td><span class="prio medium">● Moyenne</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">13
                                                        Avr.</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1279</span></td>
                                                <td>
                                                    <div class="incident-title">Bouche d'égout ouverte</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Rue Prince de Galles</div>
                                                </td>
                                                <td><span class="cat-pill autre"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <line x1="12" y1="8" x2="12"
                                                                y2="12" />
                                                            <line x1="12" y1="16" x2="12.01"
                                                                y2="16" />
                                                        </svg> Autre</span></td>
                                                <td><span class="status-badge new"><span
                                                            class="dot"></span>Nouveau</span></td>
                                                <td><span class="prio high">● Haute</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">12
                                                        Avr.</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
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
                                    <button class="cf-page-btn">3</button>
                                    <span style="font-size:.8rem;color:var(--text-muted);padding:0 .3rem">…</span>
                                    <button class="cf-page-btn">12</button>
                                    <button class="cf-page-btn"><i class="bi bi-chevron-right"></i></button>
                                    <span class="cf-page-info">1–6 sur 1 284 signalements</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex flex-column gap-3">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                                    <h5>Carte des incidents</h5>
                                    <a href="#" onclick="navigateTo('carte');return false;"
                                        style="font-size:.78rem;color:var(--blue);font-weight:600;text-decoration:none;margin-left:auto">Voir
                                        tout</a>
                                </div>
                                <div style="padding:.75rem">
                                    <div id="dash-mini-map"></div>
                                </div>
                            </div>

                            <div class="cf-card flex-grow-1">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-activity"></i></div>
                                    <h5>Activité récente</h5>
                                </div>
                                <div class="cf-card-body" style="padding-top:.5rem;padding-bottom:.5rem">
                                    <div class="activity-item">
                                        <div class="activity-dot new"><i class="bi bi-flag-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text"><strong>Jean Mbarga</strong> a signalé un
                                                nid-de-poule Rue Joss</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 4 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot assign"><i class="bi bi-person-check-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Incident <strong>#CF-1283</strong> assigné à
                                                Agent Kouam</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 18 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot resolved"><i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">Incident <strong>#CF-1281</strong> marqué comme
                                                résolu</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 45 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot user"><i class="bi bi-person-plus-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Nouvel utilisateur <strong>Aïssatou
                                                    Diallo</strong> inscrit</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 1h</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot comment"><i class="bi bi-chat-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Commentaire ajouté sur incident
                                                <strong>#CF-1279</strong>
                                            </div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 2h</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom row -->
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-4">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bar-chart-fill"></i></div>
                                    <h5>Taux de résolution</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Nid-de-poule</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--blue)">78%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:78%;background:var(--blue)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Éclairage</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--accent)">62%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:62%;background:var(--accent)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Ordures</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--green)">91%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:91%;background:var(--green)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Fuite d'eau</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--orange)">54%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:54%;background:var(--orange)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Espaces verts</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--red)">43%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:43%;background:var(--red)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-trophy-fill"></i></div>
                                    <h5>Top agents terrain</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#f0a500,#fbbf24);display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0">
                                            🥇</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Kouam Pierre</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">48 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--green-light);color:var(--green);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">96%</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#94a3b8,#cbd5e1);display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0">
                                            🥈</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Manga Rose</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">41 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--green-light);color:var(--green);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">91%</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#ea580c,#fb923c);display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0">
                                            🥉</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Nkengne Eric</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">37 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--orange-light);color:var(--orange);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">84%</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:var(--blue-light);display:flex;align-items:center;justify-content:center;color:var(--blue);font-weight:800;font-size:.8rem;flex-shrink:0">
                                            4</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Biwole Sara</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">29 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--blue-light);color:var(--blue);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">79%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-clock-history"></i></div>
                                    <h5>Activité par heure</h5>
                                </div>
                                <div class="cf-card-body">
                                    <canvas id="barChart" height="160"></canvas>
                                    <div class="mt-3 p-3 rounded-3"
                                        style="background:var(--blue-xlight);border:1px solid var(--blue-light)">
                                        <div style="font-size:.75rem;color:var(--text-muted);font-weight:600">Pic
                                            d'activité</div>
                                        <div style="font-size:1.15rem;font-weight:800;color:var(--blue)">08h00 – 10h00
                                        </div>
                                        <div style="font-size:.75rem;color:var(--text-muted)">Heure de pointe des
                                            signalements</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== SIGNALEMENTS ====== -->
                <div id="signalementsSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Signalements</h1>
                        <p>Gérez les signalements des utilisateurs.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-flag-fill"></i></div>
                            <h5>Liste des signalements</h5>
                            <button class="btn-add ms-auto"><i class="bi bi-arrow-clockwise"></i> Actualiser</button>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher..." /></div>
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
                            <select class="filter-select">
                                <option>Priorité</option>
                                <option>Haute</option>
                                <option>Moyenne</option>
                                <option>Basse</option>
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
                                            <div class="incident-title">Nid-de-poule profond</div>
                                            <div class="incident-loc"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Rue Joss, Akwa</div>
                                        </td>
                                        <td><span class="cat-pill nid"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M3 12h18M3 12c2-4 5-6 9-6s7 2 9 6M3 12c2 4 5 6 9 6s7-2 9-6" />
                                                    <ellipse cx="12" cy="14" rx="4"
                                                        ry="2" />
                                                </svg> Nid-de-poule</span></td>
                                        <td><span class="status-badge new"><span class="dot"></span>Nouveau</span>
                                        </td>
                                        <td><span class="prio high">● Haute</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn edit"
                                                    data-bs-toggle="modal" data-bs-target="#editIncidentModal"><i
                                                        class="bi bi-pencil-fill"></i></button><button class="tbl-btn del"
                                                    data-bs-toggle="modal" data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1283</span></td>
                                        <td>
                                            <div class="incident-title">Lampadaire éteint</div>
                                            <div class="incident-loc"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Bd de la Liberté</div>
                                        </td>
                                        <td><span class="cat-pill eclairage"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path
                                                        d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
                                                    <path d="M9 18h6" />
                                                    <path d="M10 22h4" />
                                                </svg> Éclairage</span></td>
                                        <td><span class="status-badge progress"><span class="dot"></span>En
                                                cours</span></td>
                                        <td><span class="prio medium">● Moyenne</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 2h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn edit"
                                                    data-bs-toggle="modal" data-bs-target="#editIncidentModal"><i
                                                        class="bi bi-pencil-fill"></i></button><button class="tbl-btn del"
                                                    data-bs-toggle="modal" data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination">
                            <button class="cf-page-btn"><i class="bi bi-chevron-left"></i></button>
                            <button class="cf-page-btn active">1</button><button class="cf-page-btn">2</button><button
                                class="cf-page-btn">3</button>
                            <span style="font-size:.8rem;color:var(--text-muted);padding:0 .3rem">…</span>
                            <button class="cf-page-btn">12</button>
                            <button class="cf-page-btn"><i class="bi bi-chevron-right"></i></button>
                            <span class="cf-page-info">1–6 sur 1 284 signalements</span>
                        </div>
                    </div>
                </div>

                <!-- ====== CARTE EN DIRECT ====== -->
                <div id="carteSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Carte en direct</h1>
                            <p>Visualisez et filtrez les incidents en temps réel sur Douala.</p>
                        </div>
                        <div class="ms-md-auto d-flex align-items-center gap-2">
                            <div class="date-pill"><i class="bi bi-broadcast" style="color:var(--green)"></i> En
                                direct</div>
                            <button class="btn-add" onclick="resetMapFilters()"><i
                                    class="bi bi-arrow-counterclockwise"></i> Réinitialiser</button>
                        </div>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                            <h5>Carte des incidents — Douala</h5>
                            <span id="mapVisibleCount"
                                style="margin-left:auto;font-size:.78rem;font-weight:700;color:var(--blue);background:var(--blue-light);padding:.2rem .65rem;border-radius:99px">20
                                incidents</span>
                        </div>
                        <div class="map-filter-panel">
                            <label><i class="bi bi-funnel-fill me-1"></i>Filtres :</label>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Catégorie</label>
                                <select class="filter-select" id="mapFilterCat" onchange="applyMapFilters()">
                                    <option value="">Toutes</option>
                                    <option value="nid">Nid-de-poule</option>
                                    <option value="eclairage">Éclairage</option>
                                    <option value="ordures">Ordures</option>
                                    <option value="eau">Fuite d'eau</option>
                                    <option value="vert">Espaces verts</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Statut</label>
                                <select class="filter-select" id="mapFilterStatus" onchange="applyMapFilters()">
                                    <option value="">Tous</option>
                                    <option value="new">Nouveau</option>
                                    <option value="progress">En cours</option>
                                    <option value="resolved">Résolu</option>
                                    <option value="rejected">Rejeté</option>
                                </select>
                            </div>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Priorité</label>
                                <select class="filter-select" id="mapFilterPrio" onchange="applyMapFilters()">
                                    <option value="">Toutes</option>
                                    <option value="high">Haute</option>
                                    <option value="medium">Moyenne</option>
                                    <option value="low">Basse</option>
                                </select>
                            </div>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Quartier</label>
                                <select class="filter-select" id="mapFilterZone" onchange="applyMapFilters()">
                                    <option value="">Tous</option>
                                    <option value="Akwa">Akwa</option>
                                    <option value="Bonanjo">Bonanjo</option>
                                    <option value="Bepanda">Bepanda</option>
                                    <option value="Deido">Deido</option>
                                    <option value="New Bell">New Bell</option>
                                    <option value="Ndokotti">Ndokotti</option>
                                    <option value="Bonapriso">Bonapriso</option>
                                </select>
                            </div>
                            <div class="filter-search-wrap" style="max-width:200px">
                                <i class="bi bi-search"></i>
                                <input type="text" class="filter-search" id="mapFilterSearch"
                                    placeholder="Chercher un incident..." oninput="applyMapFilters()">
                            </div>
                        </div>
                        <div style="padding:1rem;background:#f0f4fa">
                            <div id="leaflet-map"></div>
                        </div>
                        <div class="map-stats-bar">
                            <span style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Résumé :</span>
                            <span class="map-stat-chip total"><i class="bi bi-geo-alt-fill"></i> <span
                                    id="statTotal">20</span> total</span>
                            <span class="map-stat-chip new-s"><span class="legend-dot-circle"
                                    style="background:#0369a1;width:8px;height:8px"></span><span id="statNew">0</span>
                                nouveaux</span>
                            <span class="map-stat-chip prog-s"><span class="legend-dot-circle"
                                    style="background:#ea580c;width:8px;height:8px"></span><span id="statProg">0</span>
                                en cours</span>
                            <span class="map-stat-chip res-s"><span class="legend-dot-circle"
                                    style="background:#16a34a;width:8px;height:8px"></span><span id="statRes">0</span>
                                résolus</span>
                            <span class="map-stat-chip rej-s"><span class="legend-dot-circle"
                                    style="background:#dc2626;width:8px;height:8px"></span><span id="statRej">0</span>
                                rejetés</span>
                        </div>
                    </div>
                </div>

                <!-- ====== UTILISATEURS ====== -->
                <div id="utilisateursSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Utilisateurs</h1>
                        <p>Gérez les utilisateurs de la plateforme.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-people-fill"></i></div>
                            <h5>Liste des utilisateurs</h5>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher..." /></div>
                            <select class="filter-select">
                                <option>Quartier</option>
                                <option>Bepanda</option>
                                <option>Akwa</option>
                            </select>
                            <select class="filter-select">
                                <option>Date d'inscription</option>
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Quartier</th>
                                        <th>Téléphone</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="incident-id">#U-001</span></td>
                                        <td>Moussong</td>
                                        <td>Anita</td>
                                        <td>Beedi</td>
                                        <td>6 50 50 50 50</td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn del"
                                                    data-bs-toggle="modal" data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination"><button class="cf-page-btn"><i
                                    class="bi bi-chevron-left"></i></button><button
                                class="cf-page-btn active">1</button><button class="cf-page-btn">2</button><button
                                class="cf-page-btn"><i class="bi bi-chevron-right"></i></button><span
                                class="cf-page-info">1–1 sur 5 241 utilisateurs</span></div>
                    </div>
                </div>

                <!-- ====== AGENTS ====== -->
                <div id="agentsSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Agents terrain</h1>
                        <p>Gérez les agents de la plateforme.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-person-workspace"></i></div>
                            <h5>Liste des agents</h5><button class="btn-add ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addAgentModal"><i class="bi bi-plus-lg"></i> Nouveau</button>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher..." /></div>
                            <select class="filter-select">
                                <option>Zone de travail</option>
                                <option>Douala Nord</option>
                                <option>Douala Sud</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Tél.</th>
                                        <th>Zone</th>
                                        <th>Durée</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="incident-id">#A-001</span></td>
                                        <td>Anatole</td>
                                        <td>Bepanda</td>
                                        <td>6 50 30 30 30</td>
                                        <td>Douala Nord</td>
                                        <td>2h</td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view" data-bs-toggle="modal"
                                                    data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button class="tbl-btn edit"
                                                    data-bs-toggle="modal" data-bs-target="#editIncidentModal"><i
                                                        class="bi bi-pencil-fill"></i></button><button class="tbl-btn del"
                                                    data-bs-toggle="modal" data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination"><button class="cf-page-btn"><i
                                    class="bi bi-chevron-left"></i></button><button
                                class="cf-page-btn active">1</button><button class="cf-page-btn"><i
                                    class="bi bi-chevron-right"></i></button><span class="cf-page-info">1–1 sur 12
                                agents</span></div>
                    </div>
                </div>

                <!-- ====== CATÉGORIES ====== -->
                <div id="categoriesSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Catégories</h1>
                        <p>Gérez les catégories d'incidents.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-tags-fill"></i></div>
                            <h5>Catégories d'incidents</h5>
                            <button class="btn-add ms-auto"><i class="bi bi-plus-lg"></i> Nouvelle catégorie</button>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>Icône</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Signalements</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="cat-pill nid"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M3 12h18M3 12c2-4 5-6 9-6s7 2 9 6M3 12c2 4 5 6 9 6s7-2 9-6" />
                                                    <ellipse cx="12" cy="14" rx="4"
                                                        ry="2" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Nid-de-poule</td>
                                        <td style="color:var(--text-muted)">Dégradation de la chaussée</td>
                                        <td>311</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill eclairage"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path
                                                        d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
                                                    <path d="M9 18h6" />
                                                    <path d="M10 22h4" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Éclairage</td>
                                        <td style="color:var(--text-muted)">Pannes éclairage public</td>
                                        <td>134</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill ordures"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6" />
                                                    <path d="M19 6l-1 14H6L5 6" />
                                                    <path d="M10 11v6M14 11v6M9 6V4h6v2" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Ordures</td>
                                        <td style="color:var(--text-muted)">Dépôts sauvages, poubelles</td>
                                        <td>248</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill eau"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Fuite d'eau</td>
                                        <td style="color:var(--text-muted)">Fuites et inondations</td>
                                        <td>87</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill vert"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M17 14l3-3-3-3M14 17l3 3-3 3M3 7l9 9M3 17l9-9M12 3v18" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Espaces verts</td>
                                        <td style="color:var(--text-muted)">Arbres, végétation</td>
                                        <td>56</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill autre"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="8" x2="12" y2="12" />
                                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Autre</td>
                                        <td style="color:var(--text-muted)">Incidents divers</td>
                                        <td>448</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ====== COMMENTAIRES ====== -->
                <div id="commentairesSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Commentaires</h1>
                        <p>Modérez et gérez les commentaires des utilisateurs.</p>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-chat-dots-fill"></i></div>
                            <h5>Tous les commentaires</h5>
                            <div class="ms-auto d-flex gap-2">
                                <span
                                    style="background:var(--orange-light);color:var(--orange);font-size:.75rem;font-weight:700;border-radius:8px;padding:.25rem .75rem"><i
                                        class="bi bi-hourglass-split me-1"></i>7 en attente</span>
                                <button class="btn-add"><i class="bi bi-arrow-clockwise"></i> Actualiser</button>
                            </div>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher un commentaire, auteur…" /></div>
                            <select class="filter-select">
                                <option value="">Statut modération</option>
                                <option value="pending">En attente</option>
                                <option value="approved">Approuvé</option>
                                <option value="rejected">Rejeté</option>
                            </select>
                            <select class="filter-select">
                                <option>Incident associé</option>
                                <option>#CF-1284</option>
                                <option>#CF-1283</option>
                                <option>#CF-1282</option>
                                <option>#CF-1281</option>
                            </select>
                            <select class="filter-select">
                                <option>Date</option>
                                <option>Aujourd'hui</option>
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th style="width:40px"><input type="checkbox" class="form-check-input" />
                                        </th>
                                        <th>Auteur</th>
                                        <th>Commentaire</th>
                                        <th>Incident</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar">JM</div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Jean Mbarga</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Ce nid-de-poule est vraiment dangereux, j'ai
                                                failli avoir un accident hier soir. Il faut intervenir rapidement.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1284</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#7c3aed,#a855f7)">AD
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Aïssatou Diallo</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Le lampadaire est éteint depuis 3 semaines
                                                maintenant. Le quartier est très sombre la nuit, c'est dangereux.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1283</span></td>
                                        <td><span class="moderation-badge approved"><i
                                                    class="bi bi-check-circle-fill"></i> Approuvé</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 1h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#16a34a,#22c55e)">KP
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Kouam Pierre</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Agent terrain
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Intervention planifiée pour demain matin.
                                                L'équipe de plomberie est mobilisée.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1282</span></td>
                                        <td><span class="moderation-badge approved"><i
                                                    class="bi bi-check-circle-fill"></i> Approuvé</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 3h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#ea580c,#f97316)">MN
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Martin Ngaleu</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Problème signalé il y a plus d'un mois. Aucune
                                                action de votre part. C'est inadmissible !!</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1281</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 5h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#0369a1,#38bdf8)">SB
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Sophie Bebe</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Merci pour l'intervention rapide sur ce point !
                                                La situation est vraiment améliorée.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1280</span></td>
                                        <td><span class="moderation-badge rejected"><i class="bi bi-x-circle-fill"></i>
                                                Rejeté</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Hier</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#be123c,#f43f5e)">FK
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Fatou Kamga</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">La bouche d'égout est ouverte depuis des
                                                semaines. Des enfants jouent près d'elle, c'est très risqué.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1279</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">12 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#b45309,#d97706)">BT
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Blaise Tchinda</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Toujours pas d'intervention ! Cela fait
                                                maintenant 2 semaines. Que se passe-t-il ?</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1278</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">12 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
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
                            <span class="cf-page-info">1–7 sur 142 commentaires</span>
                        </div>
                    </div>
                </div>

                <!--NOTIFICATIONS-->
                <div id="notificationsSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Notifications</h1>
                        <p>Gérez les notifications de la plateforme.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-body" style="text-align:center;padding:3rem"><i class="bi bi-bell-fill"
                                style="font-size:3rem;color:var(--border)"></i>
                            <p style="color:var(--text-muted);margin-top:1rem">Section en cours de développement</p>
                        </div>
                    </div>
                </div>

                <!-- ====== PARAMÈTRES ====== -->
                <div id="parametresSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Paramètres</h1>
                        <p>Configurez votre espace de travail et les préférences de la plateforme.</p>
                    </div>

                    <div class="row g-3">
                        <!-- Apparence -->
                        <div class="col-lg-6 anim-2">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-palette-fill"></i></div>
                                    <h5>Apparence</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Thème</div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label"><i class="bi bi-moon-stars-fill me-2"
                                                    style="color:var(--blue)"></i>Mode sombre</div>
                                            <div class="dm-toggle-sub">Réduit la luminosité pour un confort visuel
                                                optimal</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="darkModeToggle"
                                                onchange="toggleDarkMode(this.checked)">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>

                                    <div class="settings-section-title mt-2">Langue de l'interface</div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label"><i class="bi bi-translate me-2"
                                                    style="color:var(--blue)"></i>Langue</div>
                                            <div class="dm-toggle-sub">Langue d'affichage du tableau de bord</div>
                                        </div>
                                        <select class="filter-select" style="min-width:120px">
                                            <option selected>🇫🇷 Français</option>
                                            <option>🇬🇧 English</option>
                                        </select>
                                    </div>

                                    <div class="settings-section-title mt-2">Densité d'affichage</div>
                                    <div class="d-flex gap-2">
                                        <button class="btn-add"
                                            style="flex:1;justify-content:center;background:var(--blue)">Confortable</button>
                                        <button class="btn-add"
                                            style="flex:1;justify-content:center;background:var(--bg);color:var(--text-mid);border:1.5px solid var(--border)">Compact</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="col-lg-6 anim-3">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
                                    <h5>Notifications</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-2">
                                    <div class="settings-section-title">Alertes système</div>
                                    <div class="dm-toggle-wrap mb-2">
                                        <div>
                                            <div class="dm-toggle-label">Nouveau signalement</div>
                                            <div class="dm-toggle-sub">Recevoir une alerte à chaque nouveau
                                                signalement</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                    <div class="dm-toggle-wrap mb-2">
                                        <div>
                                            <div class="dm-toggle-label">Commentaires à modérer</div>
                                            <div class="dm-toggle-sub">Alerte pour les commentaires en attente</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label">Rapport quotidien</div>
                                            <div class="dm-toggle-sub">Résumé journalier par email</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Compte -->
                        <div class="col-lg-6 anim-4">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-person-fill"></i></div>
                                    <h5>Mon compte</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Informations personnelles</div>
                                    <div class="row g-2">
                                        <div class="col-6"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Prénom</label><input
                                                type="text" class="form-control" value="Admin"></div>
                                        <div class="col-6"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Nom</label><input
                                                type="text" class="form-control" value="User"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Adresse
                                                email</label><input type="email" class="form-control"
                                                value="admin@smartcity-douala.cm"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Téléphone</label><input
                                                type="tel" class="form-control"
                                                placeholder="Ex: +237 6 00 00 00 00"></div>
                                    </div>
                                    <button class="btn-add" style="align-self:flex-start"><i
                                            class="bi bi-save-fill"></i> Enregistrer</button>
                                </div>
                            </div>
                        </div>

                        <!-- Sécurité -->
                        <div class="col-lg-6 anim-5">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header" style="background:var(--red-light);color:var(--red)">
                                        <i class="bi bi-shield-lock-fill"></i></div>
                                    <h5>Sécurité</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Changer le mot de passe</div>
                                    <div class="row g-2">
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Mot
                                                de passe actuel</label><input type="password" class="form-control"
                                                placeholder="••••••••"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Nouveau
                                                mot de passe</label><input type="password" class="form-control"
                                                placeholder="••••••••"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Confirmer</label><input
                                                type="password" class="form-control" placeholder="••••••••"></div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"
                                        style="padding:.75rem 1rem;background:var(--red-light);border-radius:10px;border:1px solid rgba(220,38,38,.2)">
                                        <i class="bi bi-exclamation-triangle-fill"
                                            style="color:var(--red);font-size:1rem"></i>
                                        <span style="font-size:.78rem;color:var(--red);font-weight:600">Choisissez un
                                            mot de passe fort d'au moins 12 caractères.</span>
                                    </div>
                                    <button class="btn-add" style="align-self:flex-start;background:var(--red)"><i
                                            class="bi bi-lock-fill"></i> Mettre à jour</button>
                                </div>
                            </div>
                        </div>

                        <!-- Déconnexion danger zone -->
                        <div class="col-12 anim-6">
                            <div class="cf-card" style="border-color:rgba(220,38,38,.3)">
                                <div class="cf-card-header" style="background:var(--red-light)">
                                    <div class="card-icon-header"
                                        style="background:rgba(220,38,38,.2);color:var(--red)"><i
                                            class="bi bi-exclamation-octagon-fill"></i></div>
                                    <h5 style="color:var(--red)">Zone de danger</h5>
                                </div>
                                <div class="cf-card-body d-flex align-items-center gap-4 flex-wrap">
                                    <div>
                                        <div style="font-weight:700;font-size:.9rem;color:var(--text-dark)">Se
                                            déconnecter</div>
                                        <div style="font-size:.8rem;color:var(--text-muted);margin-top:.2rem">Terminer
                                            la session admin en cours.</div>
                                    </div>
                                    <button class="btn-add ms-auto" style="background:var(--red)"
                                        onclick="handleLogout()"><i class="bi bi-box-arrow-right"></i>
                                        Déconnexion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== RÔLES ====== -->
                <div id="rolesSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Rôles &amp; Accès</h1>
                        <p>Gérez les permissions.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-body" style="text-align:center;padding:3rem"><i
                                class="bi bi-shield-lock-fill" style="font-size:3rem;color:var(--border)"></i>
                            <p style="color:var(--text-muted);margin-top:1rem">Section en cours de développement</p>
                        </div>
                    </div>
                </div>

            </div><!-- end page-content -->
        </div><!-- end main-area -->
    </div><!-- end admin-wrap -->

    <!-- ====== MODALS ====== -->
    <div class="modal fade" id="viewIncidentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Détails de l'incident</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><strong>ID :</strong> <span class="incident-id">#CF-1284</span></div>
                    <div class="mb-3"><strong>Titre :</strong> Nid-de-poule profond</div>
                    <div class="mb-3"><strong>Localisation :</strong> Rue Joss, Akwa</div>
                    <div class="mb-3"><strong>Catégorie :</strong> <span class="cat-pill nid">Nid-de-poule</span>
                    </div>
                    <div class="mb-3"><strong>Statut :</strong> <span class="status-badge new"><span
                                class="dot"></span>Nouveau</span></div>
                    <div class="mb-3"><strong>Priorité :</strong> <span class="prio high">● Haute</span></div>
                    <div class="mb-3"><strong>Date :</strong> Il y a 4 min</div>
                    <div class="mb-0"><strong>Description :</strong> Un nid-de-poule très profond et dangereux pour
                        les usagers de la route.</div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Fermer</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editIncidentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier l'incident</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Titre</label><input type="text"
                            class="form-control" value="Nid-de-poule profond"></div>
                    <div class="mb-3"><label class="form-label">Localisation</label><input type="text"
                            class="form-control" value="Rue Joss, Akwa"></div>
                    <div class="mb-3"><label class="form-label">Catégorie</label><select class="form-select">
                            <option selected>Nid-de-poule</option>
                            <option>Éclairage</option>
                            <option>Ordures</option>
                            <option>Fuite d'eau</option>
                        </select></div>
                    <div class="mb-3"><label class="form-label">Statut</label><select class="form-select">
                            <option selected>Nouveau</option>
                            <option>En cours</option>
                            <option>Résolu</option>
                            <option>Rejeté</option>
                        </select></div>
                    <div class="mb-3"><label class="form-label">Priorité</label><select class="form-select">
                            <option selected>Haute</option>
                            <option>Moyenne</option>
                            <option>Basse</option>
                        </select></div>
                    <div class="mb-0"><label class="form-label">Description</label>
                        <textarea class="form-control" rows="3">Un nid-de-poule très profond et dangereux pour les usagers de la route.</textarea>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Annuler</button><button type="button"
                        class="btn btn-primary">Enregistrer</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteIncidentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer l'incident</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cet incident ? Cette action est irréversible.</p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Annuler</button><button type="button"
                        class="btn btn-danger">Supprimer</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAgentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un agent</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">ID / Matricule</label><input type="text"
                            class="form-control" placeholder="Ex: A-042"></div>
                    <div class="mb-3"><label class="form-label">Nom</label><input type="text"
                            class="form-control" placeholder="Nom de famille"></div>
                    <div class="mb-3"><label class="form-label">Prénom</label><input type="text"
                            class="form-control" placeholder="Prénom"></div>
                    <div class="mb-3"><label class="form-label">Numéro de téléphone</label><input type="text"
                            class="form-control" placeholder="Ex: 6 50 00 00 00"></div>
                    <div class="mb-3"><label class="form-label">Zone de travail</label><input type="text"
                            class="form-control" placeholder="Ex: Akwa Nord"></div>
                    <div class="mb-3"><label class="form-label">Durée de travail (h/j)</label><input type="text"
                            class="form-control" placeholder="Ex: 8h"></div>
                    <div class="mb-0"><label class="form-label">Date de prise de poste</label><input type="date"
                            class="form-control"></div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Annuler</button><button type="button"
                        class="btn btn-primary">Ajouter</button></div>
            </div>
        </div>
    </div>

    <!-- Modal déconnexion confirmation -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center" style="padding:2rem">
                    <div
                        style="width:60px;height:60px;background:var(--red-light);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:1.5rem;color:var(--red)">
                        <i class="bi bi-box-arrow-right"></i>
                    </div>
                    <h5 style="font-weight:800;margin-bottom:.5rem">Déconnexion</h5>
                    <p style="color:var(--text-muted);font-size:.85rem">Voulez-vous vraiment mettre fin à votre
                        session ?</p>
                </div>
                <div class="modal-footer justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger"><i
                            class="bi bi-box-arrow-right me-1"></i>Confirmer</button>
                </div>
            </div>
        </div>
    </div>
    }
@endsection

@push('extra-js')
    <script src="{{asset('js/admin.js')}}"></script>
@endpush
