@extends('Admin.admin')
@section('title','SC-accueil')
@section('content')
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
@endsection
