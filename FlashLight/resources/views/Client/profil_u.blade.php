@extends('Client.users')
@section('title','Liste des signalements')
@section('content')
<div id="profilSection" class="page-section active">
    <div class="page-header anim-1">
        <h1>Mon profil</h1>
        <p>Gérez vos informations personnelles et vos préférences.</p>
    </div>
    <div class="row g-3 anim-2">
        <div class="col-lg-4">
            <div class="cf-card text-center" style="padding:2rem 1.5rem">
                <div class="profile-avatar-lg mx-auto mb-3">JM</div>
                <div style="font-size:1.15rem;font-weight:800;color:var(--text-dark)">Jean Mbarga</div>
                <div style="font-size:.82rem;color:var(--text-muted);margin-bottom:1rem">
                    jean.mbarga@gmail.com</div>
                <span
                    style="background:var(--blue-light);color:var(--blue);font-size:.72rem;font-weight:700;border-radius:99px;padding:.25rem .75rem"><i
                        class="bi bi-patch-check-fill"></i> Citoyen vérifié</span>
                <div class="row g-2 mt-3">
                    <div class="col-4">
                        <div class="profile-stat">
                            <div class="profile-stat-val">12</div>
                            <div class="profile-stat-lbl">Signalements</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="profile-stat">
                            <div class="profile-stat-val">8</div>
                            <div class="profile-stat-lbl">Résolus</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="profile-stat">
                            <div class="profile-stat-val" style="color:var(--accent)">47</div>
                            <div class="profile-stat-lbl">Points</div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 p-3 rounded-3 text-start"
                    style="background:var(--blue-xlight);border:1px solid var(--blue-light)">
                    <div
                        style="font-size:.72rem;color:var(--text-muted);font-weight:600;margin-bottom:.3rem">
                        NIVEAU CITOYEN</div>
                    <div style="font-size:.88rem;font-weight:700;color:var(--blue);margin-bottom:.4rem">
                        🥈 Citoyen Actif</div>
                    <div class="cf-progress">
                        <div class="cf-progress-bar" style="width:47%;background:var(--blue)"></div>
                    </div>
                    <div style="font-size:.7rem;color:var(--text-muted);margin-top:.25rem">47 / 100 pts
                        pour atteindre Expert</div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <!-- Carte des signalements dans le profil -->
            <div class="cf-card">
                <div class="cf-card-header">
                    <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                    <h5>Mes signalements sur la carte</h5>
                </div>
                <div class="cf-card-body" style="padding-bottom: 0;">
                    <div id="profileMap" class="profile-map-container"></div>
                </div>
            </div>

            <div class="cf-card mb-3">
                <div class="cf-card-header">
                    <div class="card-icon-header"><i class="bi bi-person-fill"></i></div>
                    <h5>Informations personnelles</h5>
                    <button class="btn-add ms-auto"
                        onclick="showToast('info','Fonctionnalité à venir !')"><i
                            class="bi bi-pencil-fill"></i> Modifier</button>
                </div>
                <div class="cf-card-body">
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Nom</label><input type="text"
                                class="form-control" value="Mbarga" readonly
                                style="background:var(--bg)" /></div>
                        <div class="col-md-6"><label class="form-label">Prénom</label><input
                                type="text" class="form-control" value="Jean" readonly
                                style="background:var(--bg)" /></div>
                        <div class="col-md-6"><label class="form-label">Email</label><input
                                type="email" class="form-control" value="jean.mbarga@gmail.com"
                                readonly style="background:var(--bg)" /></div>
                        <div class="col-md-6"><label class="form-label">Téléphone</label><input
                                type="text" class="form-control" value="6 50 50 50 50" readonly
                                style="background:var(--bg)" /></div>
                        <div class="col-md-6"><label class="form-label">Quartier</label><input
                                type="text" class="form-control" value="Akwa" readonly
                                style="background:var(--bg)" /></div>
                        <div class="col-md-6"><label class="form-label">Ville</label><input
                                type="text" class="form-control" value="Douala" readonly
                                style="background:var(--bg)" /></div>
                        <div class="col-md-6"><label class="form-label">Membre depuis</label><input
                                type="text" class="form-control" value="Janvier 2025" readonly
                                style="background:var(--bg)" /></div>
                    </div>
                </div>
            </div>

            <!--Préférences (Mode sombre + Langue) -->
            <div class="cf-card">
                <div class="cf-card-header">
                    <div class="card-icon-header"><i class="bi bi-gear-fill"></i></div>
                    <h5>Préférences</h5>
                </div>
                <div class="cf-card-body d-flex flex-column gap-3">
                    <!-- Mode sombre -->
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div style="font-weight:600;font-size:.88rem"><i
                                    class="bi bi-moon-stars-fill me-2" style="color:var(--blue)"></i>Mode
                                sombre</div>
                            <div style="font-size:.75rem;color:var(--text-muted)">Réduit la luminosité
                                pour un confort visuel optimal</div>
                        </div>
                        <label class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" id="darkModeToggle"
                                style="width:2.5rem;height:1.3rem;cursor:pointer"
                                onchange="toggleDarkMode(this.checked)">
                            <span class="form-check-label" for="darkModeToggle"></span>
                        </label>
                    </div>

                    <!-- Langue -->
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div style="font-weight:600;font-size:.88rem"><i class="bi bi-translate me-2"
                                    style="color:var(--blue)"></i>Langue
                                de
                                l'interface</div>
                            <div style="font-size:.75rem;color:var(--text-muted)">Choisissez la langue
                                d'affichage</div>
                        </div>
                        <div class="lang-dropdown">
                            <button class="lang-dropdown-btn" onclick="toggleLangDropdown()">
                                <span id="currentLang">🇫🇷 Français</span>
                                <i class="bi bi-chevron-down" style="font-size:.7rem"></i>
                            </button>
                            <div class="lang-dropdown-menu" id="langDropdownMenu">
                                <div class="lang-dropdown-item" onclick="changeLanguage('fr')">
                                    <span>🇫🇷</span> Français
                                </div>
                                <div class="lang-dropdown-item" onclick="changeLanguage('en')">
                                    <span>🇬🇧</span> English
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cf-card">
                <div class="cf-card-header">
                    <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
                    <h5>Préférences de notifications</h5>
                </div>
                <div class="cf-card-body d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div style="font-weight:600;font-size:.88rem">Mise à jour de mes
                                signalements</div>
                            <div style="font-size:.75rem;color:var(--text-muted)">Recevoir une
                                notification à chaque changement de statut</div>
                        </div>
                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                type="checkbox" checked style="width:2.5rem;height:1.3rem;cursor:pointer"
                                onclick="showToast('success','Préférence mise à jour !')"></div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div style="font-weight:600;font-size:.88rem">Commentaires des agents</div>
                            <div style="font-size:.75rem;color:var(--text-muted)">Être notifié quand un
                                agent commente</div>
                        </div>
                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                type="checkbox" checked style="width:2.5rem;height:1.3rem;cursor:pointer"
                                onclick="showToast('success','Préférence mise à jour !')"></div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div style="font-weight:600;font-size:.88rem">Incidents dans mon quartier
                            </div>
                            <div style="font-size:.75rem;color:var(--text-muted)">Être informé des
                                nouveaux incidents à moins de 500 m</div>
                        </div>
                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                type="checkbox" style="width:2.5rem;height:1.3rem;cursor:pointer"
                                onclick="showToast('success','Préférence mise à jour !')"></div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div style="font-weight:600;font-size:.88rem">Emails récapitulatifs</div>
                            <div style="font-size:.75rem;color:var(--text-muted)">Résumé hebdomadaire
                                par email</div>
                        </div>
                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                type="checkbox" checked style="width:2.5rem;height:1.3rem;cursor:pointer"
                                onclick="showToast('success','Préférence mise à jour !')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection