@extends('Admin.admin')
@section('title','SC-categories')
@section('content')
    <!-- ====== CATÉGORIES ====== -->
                <div id="categoriesSection" class="page-section active">
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
@endsection