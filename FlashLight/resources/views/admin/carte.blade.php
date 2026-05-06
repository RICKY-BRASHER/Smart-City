@extends('Admin.admin')
@section('title','SC-carte')
@section('content')
    <!-- ====== CARTE EN DIRECT ====== -->
                <div id="carteSection" class="page-section active">
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
@endsection