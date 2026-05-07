@extends('Admin.admin')
@section('title','SC-parametre')
@section('content')
    <!-- ====== PARAMÈTRES ====== -->
                <div id="parametresSection" class="page-section active">
                    <div class="page-header anim-1">
                        <h1>Paramètres</h1>
                        <p>Configurez votre espace de travail et les préférences de la plateforme.</p>
                    </div>

                    <div class="row g-3">
                        <!-- Apparence -->
                        <div class="col-lg-6 anim-2">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-palette-fill"></i></div>
                                    <h5>Apparence</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Thème</div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label"><i class="bi bi-moon-stars-fill me-2"
                                                    style="color:var(--blue)"></i>Mode sombre</div>
                                            <div class="dm-toggle-sub">Réduit la luminosité pour un confort visuel
                                                optimal</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="darkModeToggle"
                                                onchange="toggleDarkMode(this.checked)">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>

                                    <div class="settings-section-title mt-2">Langue de l'interface</div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label"><i class="bi bi-translate me-2"
                                                    style="color:var(--blue)"></i>Langue</div>
                                            <div class="dm-toggle-sub">Langue d'affichage du tableau de bord</div>
                                        </div>
                                        <select class="filter-select" style="min-width:120px">
                                            <option selected>🇫🇷 Français</option>
                                            <option>🇬🇧 English</option>
                                        </select>
                                    </div>

                                    <div class="settings-section-title mt-2">Densité d'affichage</div>
                                    <div class="d-flex gap-2">
                                        <button class="btn-add"
                                            style="flex:1;justify-content:center;background:var(--blue)">Confortable</button>
                                        <button class="btn-add"
                                            style="flex:1;justify-content:center;background:var(--bg);color:var(--text-mid);border:1.5px solid var(--border)">Compact</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="col-lg-6 anim-3">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
                                    <h5>Notifications</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-2">
                                    <div class="settings-section-title">Alertes système</div>
                                    <div class="dm-toggle-wrap mb-2">
                                        <div>
                                            <div class="dm-toggle-label">Nouveau signalement</div>
                                            <div class="dm-toggle-sub">Recevoir une alerte à chaque nouveau
                                                signalement</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                    <div class="dm-toggle-wrap mb-2">
                                        <div>
                                            <div class="dm-toggle-label">Commentaires à modérer</div>
                                            <div class="dm-toggle-sub">Alerte pour les commentaires en attente</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label">Rapport quotidien</div>
                                            <div class="dm-toggle-sub">Résumé journalier par email</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Compte -->
                        <div class="col-lg-6 anim-4">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-person-fill"></i></div>
                                    <h5>Mon compte</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Informations personnelles</div>
                                    <div class="row g-2">
                                        <div class="col-6"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Prénom</label><input
                                                type="text" class="form-control" value="Admin"></div>
                                        <div class="col-6"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Nom</label><input
                                                type="text" class="form-control" value="User"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Adresse
                                                email</label><input type="email" class="form-control"
                                                value="admin@smartcity-douala.cm"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Téléphone</label><input
                                                type="tel" class="form-control"
                                                placeholder="Ex: +237 6 00 00 00 00"></div>
                                    </div>
                                    <button class="btn-add" style="align-self:flex-start"><i
                                            class="bi bi-save-fill"></i> Enregistrer</button>
                                </div>
                            </div>
                        </div>

                        <!-- Sécurité -->
                        <div class="col-lg-6 anim-5">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header" style="background:var(--red-light);color:var(--red)">
                                        <i class="bi bi-shield-lock-fill"></i></div>
                                    <h5>Sécurité</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Changer le mot de passe</div>
                                    <div class="row g-2">
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Mot
                                                de passe actuel</label><input type="password" class="form-control"
                                                placeholder="••••••••"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Nouveau
                                                mot de passe</label><input type="password" class="form-control"
                                                placeholder="••••••••"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Confirmer</label><input
                                                type="password" class="form-control" placeholder="••••••••"></div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"
                                        style="padding:.75rem 1rem;background:var(--red-light);border-radius:10px;border:1px solid rgba(220,38,38,.2)">
                                        <i class="bi bi-exclamation-triangle-fill"
                                            style="color:var(--red);font-size:1rem"></i>
                                        <span style="font-size:.78rem;color:var(--red);font-weight:600">Choisissez un
                                            mot de passe fort d'au moins 12 caractères.</span>
                                    </div>
                                    <button class="btn-add" style="align-self:flex-start;background:var(--red)"><i
                                            class="bi bi-lock-fill"></i> Mettre à jour</button>
                                </div>
                            </div>
                        </div>

                        <!-- Déconnexion danger zone -->
                        <div class="col-12 anim-6">
                            <div class="cf-card" style="border-color:rgba(220,38,38,.3)">
                                <div class="cf-card-header" style="background:var(--red-light)">
                                    <div class="card-icon-header"
                                        style="background:rgba(220,38,38,.2);color:var(--red)"><i
                                            class="bi bi-exclamation-octagon-fill"></i></div>
                                    <h5 style="color:var(--red)">Zone de danger</h5>
                                </div>
                                <div class="cf-card-body d-flex align-items-center gap-4 flex-wrap">
                                    <div>
                                        <div style="font-weight:700;font-size:.9rem;color:var(--text-dark)">Se
                                            déconnecter</div>
                                        <div style="font-size:.8rem;color:var(--text-muted);margin-top:.2rem">Terminer
                                            la session admin en cours.</div>
                                    </div>
                                    <button class="btn-add ms-auto" style="background:var(--red)"
                                        onclick="handleLogout()"><i class="bi bi-box-arrow-right"></i>
                                        Déconnexion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== RÔLES ====== -->
                <div id="rolesSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Rôles &amp; Accès</h1>
                        <p>Gérez les permissions.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-body" style="text-align:center;padding:3rem"><i
                                class="bi bi-shield-lock-fill" style="font-size:3rem;color:var(--border)"></i>
                            <p style="color:var(--text-muted);margin-top:1rem">Section en cours de développement</p>
                        </div>
                    </div>
                </div>
@endsection