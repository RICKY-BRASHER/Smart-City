@extends('Admin.admin')
@section('title','SC-liste_users')
@section('content')
    <!-- ====== UTILISATEURS ====== -->
                <div id="utilisateursSection" class="page-section active">
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
@endsection