@extends('Admin.admin')
@section('title','SC-commentaire')
@section('content')
    <!-- ====== COMMENTAIRES ====== -->
                <div id="commentairesSection" class="page-section active">
                    <div class="page-header anim-1">
                        <h1>Commentaires</h1>
                        <p>Modérez et gérez les commentaires des utilisateurs.</p>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-chat-dots-fill"></i></div>
                            <h5>Tous les commentaires</h5>
                            <div class="ms-auto d-flex gap-2">
                                <span
                                    style="background:var(--orange-light);color:var(--orange);font-size:.75rem;font-weight:700;border-radius:8px;padding:.25rem .75rem"><i
                                        class="bi bi-hourglass-split me-1"></i>7 en attente</span>
                                <button class="btn-add"><i class="bi bi-arrow-clockwise"></i> Actualiser</button>
                            </div>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher un commentaire, auteur…" /></div>
                            <select class="filter-select">
                                <option value="">Statut modération</option>
                                <option value="pending">En attente</option>
                                <option value="approved">Approuvé</option>
                                <option value="rejected">Rejeté</option>
                            </select>
                            <select class="filter-select">
                                <option>Incident associé</option>
                                <option>#CF-1284</option>
                                <option>#CF-1283</option>
                                <option>#CF-1282</option>
                                <option>#CF-1281</option>
                            </select>
                            <select class="filter-select">
                                <option>Date</option>
                                <option>Aujourd'hui</option>
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th style="width:40px"><input type="checkbox" class="form-check-input" />
                                        </th>
                                        <th>Auteur</th>
                                        <th>Commentaire</th>
                                        <th>Incident</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar">JM</div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Jean Mbarga</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Ce nid-de-poule est vraiment dangereux, j'ai
                                                failli avoir un accident hier soir. Il faut intervenir rapidement.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1284</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#7c3aed,#a855f7)">AD
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Aïssatou Diallo</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Le lampadaire est éteint depuis 3 semaines
                                                maintenant. Le quartier est très sombre la nuit, c'est dangereux.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1283</span></td>
                                        <td><span class="moderation-badge approved"><i
                                                    class="bi bi-check-circle-fill"></i> Approuvé</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 1h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#16a34a,#22c55e)">KP
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Kouam Pierre</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Agent terrain
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Intervention planifiée pour demain matin.
                                                L'équipe de plomberie est mobilisée.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1282</span></td>
                                        <td><span class="moderation-badge approved"><i
                                                    class="bi bi-check-circle-fill"></i> Approuvé</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 3h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#ea580c,#f97316)">MN
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Martin Ngaleu</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Problème signalé il y a plus d'un mois. Aucune
                                                action de votre part. C'est inadmissible !!</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1281</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 5h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#0369a1,#38bdf8)">SB
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Sophie Bebe</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Merci pour l'intervention rapide sur ce point !
                                                La situation est vraiment améliorée.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1280</span></td>
                                        <td><span class="moderation-badge rejected"><i class="bi bi-x-circle-fill"></i>
                                                Rejeté</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Hier</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#be123c,#f43f5e)">FK
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Fatou Kamga</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">La bouche d'égout est ouverte depuis des
                                                semaines. Des enfants jouent près d'elle, c'est très risqué.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1279</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">12 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#b45309,#d97706)">BT
                                                </div>
                                                <div>
                                                    <div style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Blaise Tchinda</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Toujours pas d'intervention ! Cela fait
                                                maintenant 2 semaines. Que se passe-t-il ?</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1278</span></td>
                                        <td><span class="moderation-badge pending"><i class="bi bi-hourglass-split"></i>
                                                En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">12 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
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
                            <span class="cf-page-info">1–7 sur 142 commentaires</span>
                        </div>
                    </div>
                </div>
@endsection