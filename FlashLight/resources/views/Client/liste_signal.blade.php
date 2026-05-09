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
                    @foreach($listesignalements as $signalement)
                        <tr>
                            <td ><span class="incident-id">{{ $signalement->id_signalement }}</span></td>
                            <td><div class="incident-title">{{ $signalement->titre }}</div></td>
                            <td>{{ $signalement->categorie->nom_categorie }}</td>
                            <td><span class="status in-progress">{{ $signalement->etat }}</span></td>
                            <td><span class="priority medium">{{ $signalement->type_urgence }}</span></td>
                            <td>{{ $signalement->created_at->format('d/m/Y') }}</td>
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
                    @endforeach
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