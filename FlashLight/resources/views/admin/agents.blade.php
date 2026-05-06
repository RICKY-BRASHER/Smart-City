@extends('Admin.admin')
@section('title', 'SC-agents')
@section('content')
    <!-- ====== AGENTS ====== -->
    <div id="agentsSection" class="page-section active">
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
                <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text" class="filter-search"
                        placeholder="Rechercher..." /></div>
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
                                        data-bs-target="#viewIncidentModal"><i class="bi bi-eye-fill"></i></button><button
                                        class="tbl-btn edit" data-bs-toggle="modal" data-bs-target="#editIncidentModal"><i
                                            class="bi bi-pencil-fill"></i></button><button class="tbl-btn del"
                                        data-bs-toggle="modal" data-bs-target="#deleteIncidentModal"><i
                                            class="bi bi-trash-fill"></i></button></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cf-pagination"><button class="cf-page-btn"><i class="bi bi-chevron-left"></i></button><button
                    class="cf-page-btn active">1</button><button class="cf-page-btn"><i
                        class="bi bi-chevron-right"></i></button><span class="cf-page-info">1–1 sur 12
                    agents</span>
            </div>
        </div>
    </div>
@endsection
