@extends('Client.users')
@section('title','SC Mon Espace')
@section('content')
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
@endsection