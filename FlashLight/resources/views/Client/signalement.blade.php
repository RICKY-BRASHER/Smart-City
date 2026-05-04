@extends('Client.users')
@section('title','SC-Signaler un problème')
@section('content')
    <div id="signalerSection" class="page-section active active">
        <div
            class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
            <div>
                <h1>Signaler un problème</h1>
                <p>Décrivez le problème que vous avez constaté dans votre quartier.</p>
            </div>
        </div>
        <div class="row g-3 anim-2">
            <div class="col-lg-8">
                <div class="cf-card">
                    <div class="cf-card-header">
                        <div class="card-icon-header"><i class="bi bi-plus-circle-fill"></i></div>
                        <h5>Nouveau signalement</h5>
                    </div>
                    <div class="cf-card-body">
                        <div class="step-indicator mb-4">
                            <div>
                                <div class="step-dot done" id="step1dot">✓</div>
                                <div class="step-lbl">Catégorie</div>
                            </div>
                            <div class="step-line done" id="line12"></div>
                            <div>
                                <div class="step-dot active" id="step2dot">2</div>
                                <div class="step-lbl">Détails</div>
                            </div>
                            <div class="step-line" id="line23"></div>
                            <div>
                                <div class="step-dot" id="step3dot">3</div>
                                <div class="step-lbl">Localisation</div>
                            </div>
                            <div class="step-line" id="line34"></div>
                            <div>
                                <div class="step-dot" id="step4dot">4</div>
                                <div class="step-lbl">Confirmation</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Catégorie du problème <span
                                    style="color:var(--red)">*</span></label>
                            <div class="row g-2">
                                <div class="col-6 col-md-4" onclick="selectCat(this)">
                                    <div class="cat-select-card selected"
                                        style="border:2px solid var(--blue);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:var(--blue-xlight);transition:all .2s">
                                        <div style="font-size:1.5rem;margin-bottom:.3rem">🕳️</div>
                                        <div style="font-size:.78rem;font-weight:700;color:var(--blue)">
                                            Nid-de-poule</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4" onclick="selectCat(this)">
                                    <div class="cat-select-card"
                                        style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                        <div style="font-size:1.5rem;margin-bottom:.3rem">💡</div>
                                        <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                            Éclairage</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4" onclick="selectCat(this)">
                                    <div class="cat-select-card"
                                        style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                        <div style="font-size:1.5rem;margin-bottom:.3rem">🗑️</div>
                                        <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                            Ordures</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4" onclick="selectCat(this)">
                                    <div class="cat-select-card"
                                        style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                        <div style="font-size:1.5rem;margin-bottom:.3rem">💧</div>
                                        <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                            Fuite d'eau</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4" onclick="selectCat(this)">
                                    <div class="cat-select-card"
                                        style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                        <div style="font-size:1.5rem;margin-bottom:.3rem">🌲</div>
                                        <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                            Espaces verts</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4" onclick="selectCat(this)">
                                    <div class="cat-select-card"
                                        style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                        <div style="font-size:1.5rem;margin-bottom:.3rem">⚡</div>
                                        <div style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                            Autre</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Titre du signalement <span
                                    style="color:var(--red)">*</span></label>
                            <input type="text" class="form-control"
                                placeholder="Ex : Nid-de-poule dangereux devant l'école" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description <span
                                    style="color:var(--red)">*</span></label>
                            <textarea class="form-control"
                                placeholder="Décrivez le problème en détail : taille, danger, depuis combien de temps…"></textarea>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Quartier <span
                                        style="color:var(--red)">*</span></label>
                                <select class="form-select">
                                    <option>Akwa</option>
                                    <option>Bepanda</option>
                                    <option>New Bell</option>
                                    <option>Bonamoussadi</option>
                                    <option>Deido</option>
                                    <option>Ndokotti</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Rue / Adresse <span
                                        style="color:var(--red)">*</span></label>
                                <input type="text" class="form-control" placeholder="Ex : Rue Joss" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Niveau d'urgence</label>
                            <div class="d-flex gap-2">
                                <label style="flex:1;cursor:pointer">
                                    <input type="radio" name="urgence" class="d-none" />
                                    <div class="urgence-opt"
                                        style="border:2px solid var(--border);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--green);background:#fff;cursor:pointer;transition:all .2s"
                                        onclick="selectUrgence(this,'green','#16a34a')">🟢 Basse</div>
                                </label>
                                <label style="flex:1;cursor:pointer">
                                    <input type="radio" name="urgence" class="d-none" />
                                    <div class="urgence-opt"
                                        style="border:2px solid var(--border);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--orange);background:#fff;cursor:pointer;transition:all .2s"
                                        onclick="selectUrgence(this,'orange','#ea580c')">🟡 Moyenne</div>
                                </label>
                                <label style="flex:1;cursor:pointer">
                                    <input type="radio" name="urgence" class="d-none" />
                                    <div class="urgence-opt selected-urgence"
                                        style="border:2px solid var(--red);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--red);background:var(--red-light);cursor:pointer;transition:all .2s"
                                        onclick="selectUrgence(this,'red','#dc2626')">🔴 Haute</div>
                                </label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Photo(s) du problème</label>
                            <div class="upload-zone" onclick="showToast('info','Fonctionnalité à venir !')">
                                <i class="bi bi-cloud-arrow-up"></i>
                                <p style="font-weight:700;margin-bottom:.2rem;color:var(--text-mid)">
                                    Glissez
                                    vos photos ici</p>
                                <p>ou <span style="color:var(--blue);font-weight:600;cursor:pointer">parcourez
                                        vos fichiers</span></p>
                                <p style="margin-top:.4rem;font-size:.72rem">JPG, PNG · Max 5 Mo · 3 photos
                                    max</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-light"
                                style="border-radius:10px;font-weight:600;font-family:inherit">Annuler</button>
                            <button class="btn-report"
                                onclick="showToast('success','Signalement envoyé avec succès !')">
                                <i class="bi bi-send-fill"></i> Envoyer le signalement
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex flex-column gap-3">
                <div class="cf-card">
                    <div class="cf-card-header">
                        <div class="card-icon-header" style="background:#fef3c7;color:#d97706"><i
                                class="bi bi-lightbulb-fill"></i></div>
                        <h5>Conseils</h5>
                    </div>
                    <div class="cf-card-body" style="font-size:.83rem;color:var(--text-mid)">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex gap-2">
                                <div
                                    style="width:28px;height:28px;border-radius:8px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.9rem">
                                    <i class="bi bi-camera-fill"></i>
                                </div>
                                <div><strong style="color:var(--text-dark)">Ajoutez une
                                        photo</strong><br>Les signalements avec photos sont traités 2× plus
                                    vite.</div>
                            </div>
                            <div class="d-flex gap-2">
                                <div
                                    style="width:28px;height:28px;border-radius:8px;background:var(--green-light);color:var(--green);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.9rem">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <div><strong style="color:var(--text-dark)">Localisation
                                        précise</strong><br>Indiquez des repères proches : école, carrefour,
                                    etc.</div>
                            </div>
                            <div class="d-flex gap-2">
                                <div
                                    style="width:28px;height:28px;border-radius:8px;background:var(--orange-light);color:var(--orange);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.9rem">
                                    <i class="bi bi-pencil-fill"></i>
                                </div>
                                <div><strong style="color:var(--text-dark)">Description
                                        claire</strong><br>Plus vous êtes précis, plus vite le problème sera
                                    résolu.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cf-card">
                    <div class="cf-card-header">
                        <div class="card-icon-header"><i class="bi bi-bar-chart-fill"></i></div>
                        <h5>Statistiques de la ville</h5>
                    </div>
                    <div class="cf-card-body d-flex flex-column gap-2">
                        <div>
                            <div class="d-flex justify-content-between mb-1">
                                <span style="font-size:.8rem;font-weight:600">Taux de résolution</span>
                                <span style="font-size:.8rem;font-weight:700;color:var(--blue)">70%</span>
                            </div>
                            <div class="cf-progress">
                                <div class="cf-progress-bar" style="width:70%;background:var(--blue)">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between mb-1">
                                <span style="font-size:.8rem;font-weight:600">Délai moyen de
                                    traitement</span>
                                <span style="font-size:.8rem;font-weight:700;color:var(--green)">3.2
                                    j</span>
                            </div>
                            <div class="cf-progress">
                                <div class="cf-progress-bar" style="width:80%;background:var(--green)">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 p-2 rounded-3"
                            style="background:var(--blue-xlight);border:1px solid var(--blue-light)">
                            <div style="font-size:.72rem;color:var(--text-muted)">Signalement le plus
                                signalé</div>
                            <div style="font-size:.88rem;font-weight:700;color:var(--blue)">🕳️
                                Nid-de-poule
                                (311)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection