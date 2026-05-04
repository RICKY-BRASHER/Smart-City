@extends('Client.users')
@section('title','Carte des signalements')
@section('content')
<div id="carteSection" class="page-section active">
    <div
        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
        <div>
            <h1>Carte des incidents</h1>
            <p>Visualisez les incidents signalés dans votre ville en temps réel.</p>
        </div>
    </div>
    <div class="cf-card anim-2">
        <div class="cf-card-header">
            <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
            <h5>Carte en direct — Douala, Cameroun</h5>
            <div class="d-flex gap-1 ms-auto">
                <select class="filter-select" style="font-size:.75rem;padding:.25rem .6rem">
                    <option>Tous les incidents</option>
                    <option>Nid-de-poule</option>
                    <option>Éclairage</option>
                    <option>Ordures</option>
                    <option>Eau</option>
                </select>
                <select class="filter-select" style="font-size:.75rem;padding:.25rem .6rem">
                    <option>Tous statuts</option>
                    <option>Nouveau</option>
                    <option>En cours</option>
                    <option>Résolu</option>
                </select>
            </div>
        </div> 
        <div class="cf-card-body" style="padding-bottom:0">
            <!-- Légende au-dessus -->
            <div class="d-flex gap-3 flex-wrap mb-3">
                <div class="d-flex align-items-center gap-1"
                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--red)"></span>Haute
                    priorité</div>
                <div class="d-flex align-items-center gap-1"
                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--orange)"></span>Moyenne
                    priorité</div>
                <div class="d-flex align-items-center gap-1"
                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--green)"></span>Résolu
                </div>
                <div class="d-flex align-items-center gap-1"
                    style="font-size:.75rem;font-weight:600;color:var(--text-mid)"><span
                        style="display:inline-block;width:12px;height:12px;border-radius:50%;background:var(--blue)"></span>Nouveau
                </div>
            </div>
            <div id="mainMap" class="leaflet-map" style="height:440px;width:100%;border-radius:12px;">
            </div>
        </div>
        <!-- Stats sous carte -->
        <div class="row g-0 mt-0" style="border-top:1px solid var(--border)">
            <div class="col-3 text-center p-3" style="border-right:1px solid var(--border)">
                <div style="font-size:1.3rem;font-weight:800;color:var(--red)">18</div>
                <div style="font-size:.72rem;color:var(--text-muted)">Haute priorité</div>
            </div>
            <div class="col-3 text-center p-3" style="border-right:1px solid var(--border)">
                <div style="font-size:1.3rem;font-weight:800;color:var(--orange)">22</div>
                <div style="font-size:.72rem;color:var(--text-muted)">En cours</div>
            </div>
            <div class="col-3 text-center p-3" style="border-right:1px solid var(--border)">
                <div style="font-size:1.3rem;font-weight:800;color:var(--blue)">7</div>
                <div style="font-size:.72rem;color:var(--text-muted)">Nouveaux</div>
            </div>
            <div class="col-3 text-center p-3">
                <div style="font-size:1.3rem;font-weight:800;color:var(--green)">896</div>
                <div style="font-size:.72rem;color:var(--text-muted)">Résolus total</div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // On attend que TOUTE la page (HTML + CSS) soit chargée
    window.addEventListener('load', function() {
        const mapContainer = document.getElementById('mainMap');
        
        if (mapContainer) {
            
            
            // On s'assure que la fonction existe
            if (typeof initMainMap === 'function') {
                initMainMap();
                console.log("Conteneur trouvé, lancement de la carte...");
                // On force le redimensionnement après un petit délai supplémentaire
                setTimeout(() => {
                    if (window.mainMapInstance) {
                        window.mainMapInstance.invalidateSize();
                    }
                }, 500);
            }
        } else {
            console.error("Erreur : La div #mainMap est introuvable dans le DOM.");
        }
    });
</script>
@endpush