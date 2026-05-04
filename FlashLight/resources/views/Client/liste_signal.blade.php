@extends('Client.users')
@section('title','Liste des signalements')
@section('content')
<div id="mes-signalementsSection" class="page-section active">
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
@endsection