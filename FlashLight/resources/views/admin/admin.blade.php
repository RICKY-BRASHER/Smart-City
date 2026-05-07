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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/MarkerCluster.Default.css"
        rel="stylesheet" />
    <!--css-->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <style>
        /* Petite astuce pour que le pied de page reste en bas */
        body { display: flex; flex-direction: column; min-height: 100vh; }
        main { flex: 1; }
    </style> 
</head>

<body class="page-home">
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
                        <a href="{{ route('accueil') }}" class="nav-link-cf {{ Request::routeIs('accueil') ? 'active' : '' }}" data-section="dashboard">
                            <i class="bi bi-grid-fill nav-icon"></i>
                            <span class="nav-label">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="{{ route('signalement') }}" class="nav-link-cf {{ Request::routeIs('signalement') ? 'active' : '' }}" data-section="signalements">
                            <i class="bi bi-flag-fill nav-icon"></i>
                            <span class="nav-label">Signalements</span>
                            <span class="nav-badge">24</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="{{ route('carte') }}" class="nav-link-cf {{ Request::routeIs('carte') ? 'active' : '' }}" data-section="carte">
                            <i class="bi bi-geo-alt-fill nav-icon"></i>
                            <span class="nav-label">Carte en direct</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Gestion</li>
                    <li class="nav-item-cf">
                        <a href="{{ route('liste_users') }}" class="nav-link-cf {{ Request::routeIs('liste_users') ? 'active' : '' }}" data-section="utilisateurs">
                            <i class="bi bi-people-fill nav-icon"></i>
                            <span class="nav-label">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="{{ route('agents') }}" class="nav-link-cf" data-section="agents">
                            <i class="bi bi-person-workspace nav-icon"></i>
                            <span class="nav-label">Agents terrain</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="{{ route('categories') }}" class="nav-link-cf" data-section="categories">
                            <i class="bi bi-tags-fill nav-icon"></i>
                            <span class="nav-label">Catégories</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="{{route('commentaires')}}" class="nav-link-cf" data-section="commentaires">
                            <i class="bi bi-chat-dots-fill nav-icon"></i>
                            <span class="nav-label">Commentaires</span>
                            <span class="nav-badge">7</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Système</li>
                    <li class="nav-item-cf">
                        <a href="{{route('notification')}}" id="notif" class="nav-link-cf" data-section="notifications">
                            <i class="bi bi-bell-fill nav-icon"></i>
                            <span class="nav-label">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="{{route('parametre')}}" class="nav-link-cf" data-section="parametres">
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
                @yield('content')
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


    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://unpkg.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!-- <script src="{{ asset('app.js') }}" type="module"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/leaflet.markercluster.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script> 
    <!-- Dans le <head> ou avant la balise </body> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
