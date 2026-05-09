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

                       <form action="" id="signalementForm">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Catégorie du problème <span style="color:var(--red)">*</span></label>
                                <div class="row g-3">
                                    @foreach($categories as $categorie)
                                        <div class="col-6 col-md-4">
                                            <label class="w-100" onclick="selectCat(this)" style="cursor:pointer">
                                                <!-- On coche le premier radio par défaut -->
                                                <input type="radio" name="categorie" class="d-none" 
                                                    value="{{ $categorie->id_categorie }}" 0
                                                    {{ $loop->first ? 'checked' : '' }} />
                                                
                                                <div class="cat-select-card {{ $loop->first ? 'selected' : '' }}"
                                                    style="border:2px solid {{ $loop->first ? 'var(--blue)' : 'var(--border)' }}; 
                                                        border-radius:12px; padding:.8rem; text-align:center; 
                                                        background:{{ $loop->first ? 'var(--blue-xlight)' : '#fff' }}; 
                                                        transition:all .2s">
                                                    
                                                    <div style="font-size:1.5rem; margin-bottom:.3rem">
                                                        ⚠️
                                                    </div>
                                                    
                                                    <div style="font-size:.78rem; font-weight:700; color:{{ $loop->first ? 'var(--blue)' : 'var(--text-mid)' }}">
                                                        {{ $categorie->nom_categorie }}
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Titre du signalement <span
                                        style="color:var(--red)">*</span></label>
                                <input type="text" class="form-control" name="title"
                                    placeholder="Ex : Nid-de-poule dangereux devant l'école" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description <span
                                        style="color:var(--red)">*</span></label>
                                <textarea class="form-control" name="description"
                                    placeholder="Décrivez le problème en détail : taille, danger, depuis combien de temps…"></textarea>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Quartier <span
                                            style="color:var(--red)">*</span></label>
                                    <select class="form-select" name="quartier">
                                        <option value="">Sélectionnez un quartier</option>
                                        <option value="Akwa">Akwa</option>
                                        <option value="Bepanda">Bepanda</option>
                                        <option value="New Bell">New Bell</option>
                                        <option value="Bonamoussadi">Bonamoussadi</option>
                                        <option value="Deido">Deido</option>
                                        <option value="Ndokotti">Ndokotti</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Rue / Adresse <span
                                            style="color:var(--red)">*</span></label>
                                    <input type="text" class="form-control" name="adresse" placeholder="Ex : Rue Joss" />
                                    <input type="hidden" name="latitude" id="latInput">
                                    <input type="hidden" name="longitude" id="lngInput">
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="getLocation()">
                                        <i class="bi bi-geo-alt"></i> Utiliser ma position actuelle
                                    </button>
                                    <small id="locationStatus" class="text-muted d-block mt-1"></small>
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label">Niveau d'urgence</label>
                                <div class="d-flex gap-2">
                                    <label style="flex:1;cursor:pointer">
                                        <input type="radio" name="urgence" class="d-none" value="Basse"/>
                                        <div class="urgence-opt"
                                            style="border:2px solid var(--border);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--green);background:#fff;cursor:pointer;transition:all .2s"
                                            onclick="selectUrgence(this,'green','#16a34a')">🟢 Basse</div>
                                    </label>
                                    <label style="flex:1;cursor:pointer">
                                        <input type="radio" name="urgence" class="d-none" value="Moyenne"/>
                                        <div class="urgence-opt"
                                            style="border:2px solid var(--border);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--orange);background:#fff;cursor:pointer;transition:all .2s"
                                            onclick="selectUrgence(this,'orange','#ea580c')">🟡 Moyenne</div>
                                    </label>
                                    <label style="flex:1;cursor:pointer">
                                        <input type="radio" name="urgence" class="d-none" value="Haute" checked/>
                                        <div class="urgence-opt selected-urgence"
                                            style="border:2px solid var(--red);border-radius:10px;padding:.55rem;text-align:center;font-size:.78rem;font-weight:700;color:var(--red);background:var(--red-light);cursor:pointer;transition:all .2s"
                                            onclick="selectUrgence(this,'red','#dc2626')">🔴 Haute</div>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4" >
                                <label class="form-label">Photo(s) du problème</label>
                                <input type="file" id="photoInput" name="photos[]" multiple accept="image/*" class="d-none">
                                <div class="upload-zone" id="dropZone">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                    <p style="font-weight:700;margin-bottom:.2rem;color:var(--text-mid)" id="uploadText">
                                        Glissez
                                        vos photos ici</p>
                                    <p>ou <span style="color:var(--blue);font-weight:600;cursor:pointer">parcourez
                                            vos fichiers</span></p>
                                    <p style="margin-top:.4rem;font-size:.72rem">JPG, PNG · Max 5 Mo · 3 photos
                                        max</p>
                                        <!-- Conteneur pour la prévisualisation -->
                                    <div id="previewContainer" class="d-flex gap-3 flex-wrap mt-3"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-light" type="button" data-bs-dismiss="modal" id="cancelBtn"
                                    style="border-radius:10px;font-weight:600;font-family:inherit">Annuler</button>
                                <button class="btn-report" type="button" id="submitBtn"
                                    >
                                    <i class="bi bi-send-fill"></i> Envoyer le signalement
                                </button>
                            </div>
                       </form>
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
@push('scripts')
    <script>
        let selectedFiles = []; // Tableau pour stocker nos fichiers localement

        $('#dropZone').click(function() {
            $('#photoInput').click();
        });

        $('#photoInput').change(function(e) {
            let files = Array.from(e.target.files);
            
            // Vérification du nombre total
            if (selectedFiles.length + files.length > 3) {
                showToast('danger', 'Maximum 3 photos autorisées !');
                return;
            }

            files.forEach(file => {
                selectedFiles.push(file); // Ajouter au tableau global
                
                let reader = new FileReader();
                reader.onload = function(event) {
                    let index = selectedFiles.length - 1;
                    // Générer le HTML de la vignette avec le bouton supprimer
                    let html = `
                        <div class="position-relative preview-item" data-index="${index}">
                            <img src="${event.target.result}" style="width:80px;height:80px;object-fit:cover;border-radius:10px;border:2px solid var(--blue)">
                            <button type="button" class="btn-remove-photo" onclick="removePhoto(${index})" 
                                style="position:absolute;top: 2px;right: -2px;color:white;border:none;border-radius:50%;width:12px;height:12px;font-size:10px;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 4px rgba(0,0,0,0.2)">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>`;
                    $('#previewContainer').append(html);
                }
                reader.readAsDataURL(file);
            });
            
            updateInputFiles(); // Mettre à jour l'input réel
        });

        // Fonction pour supprimer une photo
        function removePhoto(index) {
            selectedFiles.splice(index, 1); // Retirer du tableau
            renderPreviews(); // Redessiner les vignettes
            updateInputFiles(); // Mettre à jour l'input réel
        }

        // Redessiner toutes les vignettes pour mettre à jour les index
        function renderPreviews() {
            $('#previewContainer').html('');
            selectedFiles.forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewContainer').append(`
                        <div class="position-relative" data-index="${index}">
                            <img src="${e.target.result}" style="width:80px;height:80px;object-fit:cover;border-radius:10px;border:2px solid var(--blue)">
                            <button type="button" onclick="removePhoto(${index})" style="position:absolute;top: 3px;right: 5px;color:white;border:none;border-radius:50%;width:12px;height:12px;font-size:12px;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 4px rgba(0,0,0,0.2)">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>`);
                };
                reader.readAsDataURL(file);
            });
        }

        // ASTUCE : Synchroniser le tableau JS avec l'input HTML file
        function updateInputFiles() {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            document.getElementById('photoInput').files = dataTransfer.files;
            
            // Mettre à jour le texte d'aide
            $('#uploadText').text(selectedFiles.length > 0 ? `${selectedFiles.length} photo(s) prête(s)` : "Glissez vos photos ici");
        }
        function getLocation() {
            const status = document.getElementById('locationStatus');
            const latInput = document.getElementById('latInput');
            const lngInput = document.getElementById('lngInput');
            const adresseInput = document.querySelector('input[name="adresse"]'); // Ton champ adresse

            if (!navigator.geolocation) {
                status.textContent = "La géolocalisation n'est pas supportée.";
                return;
            }

            status.textContent = "Localisation en cours...";

            navigator.geolocation.getCurrentPosition(async (position) => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;

                latInput.value = lat;
                lngInput.value = lng;

                status.innerHTML = "Position trouvée, recherche de l'adresse...";

                try {
                    // Appel à l'API Nominatim (OpenStreetMap)
                    const response = await fetch(`https://openstreetmap.org{lat}&lon=${lng}&zoom=18&addressdetails=1`);
                    const data = await response.json();

                    if (data.display_name) {
                        // On extrait la rue ou le nom du lieu
                        const road = data.address.road || data.address.pedestrian || data.address.suburb || "Adresse inconnue";
                        const neighborhood = data.address.neighbourhood || data.address.suburb || "";
                        
                        adresseInput.value = road + (neighborhood ? ", " + neighborhood : "");
                        status.innerHTML = `<span class="text-success"><i class="bi bi-check-all"></i> Localisé à : ${road}</span>`;
                    }
                } catch (error) {
                    console.error("Erreur Geocoding:", error);
                    status.innerHTML = `<span class="text-success">Position OK (Adresse non trouvée)</span>`;
                }
            }, (error) => {
                status.innerHTML = `<span class="text-danger">Erreur : ${error.message}</span>`;
            });
        }




        $(document).ready(function() {
            
            $('#cancelBtn').click(function() {
                // Réinitialiser le formulaire
                $('form')[0].reset();
                selectedFiles = [];
                renderPreviews();
                updateInputFiles();
            });
            $('#submitBtn').click(function() {
                let formData = new FormData($('#signalementForm')[0]);
                selectedFiles.forEach((file, index) => { // Ajouter les fichiers un par un
                    formData.append('photos[]', file);
                });
                $('#submitBtn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Envoi...');
                $.ajax({
                    url: '/submit-signalement', // Remplacez par votre URL de traitement
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        setTimeout(() => {
                            $('#submitBtn').prop('disabled', false).html('<i class="bi bi-send-fill"></i> Envoyer le signalement');
                            showToast('success', 'Signalement envoyé avec succès !');
                            
                        }, 1000);
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            
                            
                            setTimeout(() => {
                                // 1. Nettoyer les anciennes erreurs
                                $('.is-invalid').removeClass('is-invalid');
                                $('.invalid-feedback').remove();

                                // 2. Afficher les nouvelles erreurs
                                $.each(errors, function(key, messages) {
                                    // Pour les champs classiques (title, description, etc.)
                                    let input = $(`[name="${key}"]`);
                                    
                                    // Cas spécial pour les photos (car le name est photos[])
                                    if (key.includes('photos')) {
                                        input = $('#dropZone'); // On met l'erreur sur la zone d'upload
                                    }

                                    input.addClass('is-invalid');
                                    
                                    // On affiche le premier message d'erreur sous le champ
                                    
                                });
                                $('#submitBtn').prop('disabled', false).html('<i class="bi bi-send-fill"></i> Envoyer le signalement');
                                $('.is-invalid:first').focus(); // Focus sur le premier champ en erreur
                                showToast('error', 'Remplissez correctement tous les champs obligatoires.');
                            }, 1000); // Nettoie les erreurs après 2 secondes
                        } else {
                            showToast('danger', 'Une erreur est survenue. Veuillez réessayer.');
                        }
                    },
                });

            });
        });
        function selectCat(element) {
            // On remet toutes les cartes en style "non-sélectionné"
            $('.cat-select-card').css({'border': '2px solid var(--border)', 'background': '#fff'});
            $('.cat-select-card div:last-child').css('color', 'var(--text-mid)');

            // On applique le style "Bleu" à la carte contenue dans le label cliqué
            $(element).find('.cat-select-card').css({
                'border': '2px solid var(--blue)',
                'background': 'var(--blue-xlight)'
            });
            $(element).find('div:last-child').css('color', 'var(--blue)');
        }


    </script>
@endpush