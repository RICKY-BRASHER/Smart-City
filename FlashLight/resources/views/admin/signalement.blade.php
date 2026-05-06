@extends('Admin.admin')
@section('title','SC-signalement')
@section('content')
    <!-- ====== SIGNALEMENTS ====== -->
                <div id="signalementsSection" class="page-section active">
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
@endsection