  const INCIDENTS = [{
                id: '#CF-1284',
                title: 'Nid-de-poule profond',
                loc: 'Rue Joss, Akwa',
                lat: 4.0511,
                lng: 9.7086,
                cat: 'nid',
                status: 'new',
                prio: 'high',
                zone: 'Akwa',
                date: 'Il y a 4 min'
            },
            {
                id: '#CF-1283',
                title: 'Lampadaire éteint',
                loc: 'Bd de la Liberté, Akwa',
                lat: 4.0525,
                lng: 9.7062,
                cat: 'eclairage',
                status: 'progress',
                prio: 'medium',
                zone: 'Akwa',
                date: 'Il y a 2h'
            },
            {
                id: '#CF-1282',
                title: "Fuite d'eau importante",
                loc: 'Carrefour Ndokotti',
                lat: 4.0476,
                lng: 9.7214,
                cat: 'eau',
                status: 'progress',
                prio: 'high',
                zone: 'Ndokotti',
                date: 'Il y a 5h'
            },
            {
                id: '#CF-1281',
                title: "Dépôt sauvage d'ordures",
                loc: 'Quartier New Bell',
                lat: 4.0589,
                lng: 9.7188,
                cat: 'ordures',
                status: 'resolved',
                prio: 'low',
                zone: 'New Bell',
                date: 'Hier, 14h32'
            },
            {
                id: '#CF-1280',
                title: 'Arbre tombé sur route',
                loc: 'Av. Charles de Gaulle',
                lat: 4.0445,
                lng: 9.7055,
                cat: 'vert',
                status: 'rejected',
                prio: 'medium',
                zone: 'Bonanjo',
                date: '13 Avr.'
            },
            {
                id: '#CF-1279',
                title: "Bouche d'égout ouverte",
                loc: 'Rue Prince de Galles',
                lat: 4.0498,
                lng: 9.7100,
                cat: 'nid',
                status: 'new',
                prio: 'high',
                zone: 'Bonanjo',
                date: '12 Avr.'
            },
            {
                id: '#CF-1278',
                title: 'Inondation trottoir',
                loc: 'Bepanda, Av. principale',
                lat: 4.0621,
                lng: 9.7241,
                cat: 'eau',
                status: 'new',
                prio: 'high',
                zone: 'Bepanda',
                date: '12 Avr.'
            },
            {
                id: '#CF-1277',
                title: 'Poubelles débordantes',
                loc: 'Marché Deido',
                lat: 4.0557,
                lng: 9.7155,
                cat: 'ordures',
                status: 'progress',
                prio: 'medium',
                zone: 'Deido',
                date: '11 Avr.'
            },
            {
                id: '#CF-1276',
                title: 'Éclairage public défaillant',
                loc: 'Bd du 20 Mai, Bonanjo',
                lat: 4.0432,
                lng: 9.7040,
                cat: 'eclairage',
                status: 'resolved',
                prio: 'low',
                zone: 'Bonanjo',
                date: '11 Avr.'
            },
            {
                id: '#CF-1275',
                title: 'Route dégradée',
                loc: 'Rue Castelnau, Deido',
                lat: 4.0542,
                lng: 9.7170,
                cat: 'nid',
                status: 'progress',
                prio: 'high',
                zone: 'Deido',
                date: '10 Avr.'
            },
            {
                id: '#CF-1274',
                title: 'Caniveau bouché',
                loc: 'Bonapriso centre',
                lat: 4.0390,
                lng: 9.7070,
                cat: 'eau',
                status: 'new',
                prio: 'medium',
                zone: 'Bonapriso',
                date: '10 Avr.'
            },
            {
                id: '#CF-1273',
                title: 'Graffitis mur public',
                loc: 'Akwa Nord',
                lat: 4.0535,
                lng: 9.7090,
                cat: 'autre',
                status: 'resolved',
                prio: 'low',
                zone: 'Akwa',
                date: '9 Avr.'
            },
            {
                id: '#CF-1272',
                title: 'Végétation envahissante',
                loc: 'Rond-point Deido',
                lat: 4.0565,
                lng: 9.7180,
                cat: 'vert',
                status: 'new',
                prio: 'low',
                zone: 'Deido',
                date: '9 Avr.'
            },
            {
                id: '#CF-1271',
                title: 'Câble électrique à terre',
                loc: 'New Bell Est',
                lat: 4.0600,
                lng: 9.7200,
                cat: 'eclairage',
                status: 'rejected',
                prio: 'high',
                zone: 'New Bell',
                date: '8 Avr.'
            },
            {
                id: '#CF-1270',
                title: 'Décharge illégale',
                loc: 'Bepanda Omnisport',
                lat: 4.0640,
                lng: 9.7260,
                cat: 'ordures',
                status: 'new',
                prio: 'medium',
                zone: 'Bepanda',
                date: '8 Avr.'
            },
            {
                id: '#CF-1269',
                title: 'Trottoir fissuré',
                loc: 'Av. Ahmadou Ahidjo',
                lat: 4.0460,
                lng: 9.7080,
                cat: 'nid',
                status: 'progress',
                prio: 'low',
                zone: 'Bonanjo',
                date: '7 Avr.'
            },
            {
                id: '#CF-1268',
                title: 'Fuite égout odeur',
                loc: 'Ndokotti Est',
                lat: 4.0495,
                lng: 9.7230,
                cat: 'eau',
                status: 'resolved',
                prio: 'medium',
                zone: 'Ndokotti',
                date: '7 Avr.'
            },
            {
                id: '#CF-1267',
                title: 'Lampadaire renversé',
                loc: 'Rue Ivy, Bonapriso',
                lat: 4.0410,
                lng: 9.7055,
                cat: 'eclairage',
                status: 'new',
                prio: 'high',
                zone: 'Bonapriso',
                date: '6 Avr.'
            },
            {
                id: '#CF-1266',
                title: 'Nid-de-poule géant',
                loc: 'Carrefour Bepanda',
                lat: 4.0608,
                lng: 9.7280,
                cat: 'nid',
                status: 'progress',
                prio: 'high',
                zone: 'Bepanda',
                date: '6 Avr.'
            },
            {
                id: '#CF-1265',
                title: 'Panneau signalisation tombé',
                loc: 'Rond-point Bonanjo',
                lat: 4.0425,
                lng: 9.7045,
                cat: 'autre',
                status: 'new',
                prio: 'medium',
                zone: 'Bonapriso',
                date: '5 Avr.'
            }
        ];

        const STATUS_COLOR = {
            new: '#0369a1',
            progress: '#ea580c',
            resolved: '#16a34a',
            rejected: '#dc2626'
        };
        const STATUS_LABEL = {
            new: 'Nouveau',
            progress: 'En cours',
            resolved: 'Résolu',
            rejected: 'Rejeté'
        };
        const PRIO_LABEL = {
            high: 'Haute',
            medium: 'Moyenne',
            low: 'Basse'
        };
        const CAT_LABEL = {
            nid: 'Nid-de-poule',
            eclairage: 'Éclairage',
            eau: "Fuite d'eau",
            ordures: 'Ordures',
            vert: 'Espaces verts',
            autre: 'Autre'
        };

        /*DARK MODE*/
        function toggleDarkMode(isDark) {
            document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
            localStorage.setItem('sc-theme', isDark ? 'dark' : 'light');
            // Update charts colors if needed
        }

        // Init theme from storage
        (function() {
            const saved = localStorage.getItem('sc-theme');
            if (saved === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
                setTimeout(() => {
                    const tog = document.getElementById('darkModeToggle');
                    if (tog) tog.checked = true;
                }, 50);
            }
        })();

        /*LOGOUT*/
        function handleLogout() {
            document.getElementById('topbarDropdown').classList.remove('open');
            const modal = new bootstrap.Modal(document.getElementById('logoutModal'));
            modal.show();
        }

        /*AVATAR DROPDOWN*/
        document.getElementById('topbarAvatarBtn').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('topbarDropdown').classList.toggle('open');
        });
        document.addEventListener('click', function() {
            document.getElementById('topbarDropdown').classList.remove('open');
        });

        /* ===================== SIDEBAR ===================== */
        const sidebar = document.getElementById('sidebar');
        const mainArea = document.getElementById('mainArea');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const overlay = document.getElementById('sidebarOverlay');
        const isMobile = () => window.innerWidth < 992;
        let collapsed = false;

        sidebarToggle.addEventListener('click', () => {
            if (isMobile()) {
                sidebar.classList.toggle('mobile-open');
                overlay.classList.toggle('active');
            } else {
                collapsed = !collapsed;
                sidebar.classList.toggle('collapsed', collapsed);
                mainArea.classList.toggle('expanded', collapsed);
                if (leafletMap) setTimeout(() => leafletMap.invalidateSize(), 350);
            }
        });
        overlay.addEventListener('click', closeMobileSidebar);

        function closeMobileSidebar() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('active');
        }

        /* ===================== COUNT-UP ===================== */
        document.querySelectorAll('.count-up').forEach(el => {
            const obs = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (!e.isIntersecting) return;
                    const target = +e.target.dataset.target;
                    const step = target / (1400 / 16);
                    let cur = 0;
                    const t = setInterval(() => {
                        cur = Math.min(cur + step, target);
                        e.target.textContent = Math.floor(cur).toLocaleString('fr-FR');
                        if (cur >= target) clearInterval(t);
                    }, 16);
                    obs.unobserve(e.target);
                });
            }, {
                threshold: .3
            });
            obs.observe(el);
        });

        /*CHARTS*/
        Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
        Chart.defaults.plugins.legend.display = false;

        const BLUE = '#1a6fd4',
            ORANGE = '#f0a500',
            GREEN = '#16a34a',
            RED = '#dc2626',
            PURPLE = '#7c3aed';

        // ===== GRAPHE ÉVOLUTION = BANDES (bar chart statique) =====
        (function() {
            const ctx = document.getElementById('barLineChart').getContext('2d');
            const vals = [18, 22, 15, 30, 28, 40, 35, 22, 18, 25, 42, 38, 30, 20, 26, 34, 28, 45, 38, 50, 42, 36, 28,
                22, 40, 35, 30, 48, 52, 44
            ];
            const labels = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15',
                '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'
            ];

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                            label: 'Nouveaux',
                            data: vals.map(v => Math.round(v * 0.35)),
                            backgroundColor: '#0369a1',
                            borderRadius: {
                                topLeft: 4,
                                topRight: 4
                            },
                            borderSkipped: false,
                            stack: 'stack'
                        },
                        {
                            label: 'En cours',
                            data: vals.map(v => Math.round(v * 0.30)),
                            backgroundColor: '#ea580c',
                            borderRadius: 0,
                            borderSkipped: false,
                            stack: 'stack'
                        },
                        {
                            label: 'Résolus',
                            data: vals.map(v => Math.round(v * 0.25)),
                            backgroundColor: '#16a34a',
                            borderRadius: 0,
                            borderSkipped: false,
                            stack: 'stack'
                        },
                        {
                            label: 'Rejetés',
                            data: vals.map(v => Math.round(v * 0.10)),
                            backgroundColor: '#dc2626',
                            borderRadius: {
                                topLeft: 4,
                                topRight: 4
                            },
                            borderSkipped: false,
                            stack: 'stack'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            align: 'end',
                            labels: {
                                boxWidth: 10,
                                boxHeight: 10,
                                borderRadius: 3,
                                useBorderRadius: true,
                                font: {
                                    size: 11
                                },
                                color: '#6b7a99',
                                padding: 16
                            }
                        },
                        tooltip: {
                            backgroundColor: '#0f1e38',
                            padding: 10,
                            cornerRadius: 8,
                            titleFont: {
                                size: 11
                            },
                            bodyFont: {
                                size: 12,
                                weight: '700'
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 10
                                },
                                color: '#9ca3af',
                                maxTicksLimit: 10
                            }
                        },
                        y: {
                            stacked: true,
                            grid: {
                                color: '#f1f5f9'
                            },
                            border: {
                                dash: [4, 4]
                            },
                            ticks: {
                                font: {
                                    size: 10
                                },
                                color: '#9ca3af'
                            }
                        }
                    }
                }
            });
        })();

        // Donut chart
        new Chart(document.getElementById('donutChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Nid-de-poule', 'Ordures', 'Éclairage', "Fuite d'eau", 'Autres'],
                datasets: [{
                    data: [311, 248, 134, 87, 504],
                    backgroundColor: [BLUE, ORANGE, GREEN, RED, PURPLE],
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                cutout: '72%',
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#0f1e38',
                        padding: 10,
                        cornerRadius: 8
                    }
                }
            }
        });

        // Bar chart heure
        const hoursData = [5, 12, 28, 42, 38, 22, 18, 15, 20, 25, 30, 22, 18, 15, 12, 20, 25, 18, 14, 10, 8, 6, 4, 3];
        new Chart(document.getElementById('barChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: Array.from({
                    length: 24
                }, (_, i) => `${String(i).padStart(2,'0')}h`),
                datasets: [{
                    data: hoursData,
                    backgroundColor: hoursData.map((_, i) => (i >= 8 && i <= 10) ? BLUE :
                        'rgba(26,111,212,.18)'),
                    borderRadius: 4,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 8
                            },
                            color: '#9ca3af',
                            maxTicksLimit: 8
                        }
                    },
                    y: {
                        grid: {
                            color: '#f1f5f9'
                        },
                        ticks: {
                            font: {
                                size: 9
                            },
                            color: '#9ca3af'
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: '#0f1e38',
                        padding: 8,
                        cornerRadius: 8,
                        bodyFont: {
                            size: 11,
                            weight: '700'
                        }
                    }
                }
            }
        });

        /*  MAP HELPERS*/
        function createMarkerIcon(status) {
            const color = STATUS_COLOR[status] || '#888';
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 42" width="32" height="42">
        <path d="M16 0C7.16 0 0 7.16 0 16c0 11.84 14.5 25.5 15.13 26.06a1.22 1.22 0 001.74 0C17.5 41.5 32 27.84 32 16 32 7.16 24.84 0 16 0z" fill="${color}" opacity=".95"/>
        <circle cx="16" cy="16" r="7" fill="white" opacity=".95"/>
    </svg>`;
            return L.divIcon({
                html: svg,
                iconSize: [32, 42],
                iconAnchor: [16, 42],
                popupAnchor: [0, -44],
                className: ''
            });
        }

        function createSmallIcon(status) {
            const color = STATUS_COLOR[status] || '#888';
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 30" width="22" height="30">
        <path d="M11 0C4.93 0 0 4.93 0 11c0 8.15 10 18.7 10.4 19.13a.84.84 0 001.2 0C12 29.7 22 19.15 22 11 22 4.93 17.07 0 11 0z" fill="${color}" opacity=".95"/>
        <circle cx="11" cy="11" r="5" fill="white" opacity=".95"/>
    </svg>`;
            return L.divIcon({
                html: svg,
                iconSize: [22, 30],
                iconAnchor: [11, 30],
                popupAnchor: [0, -32],
                className: ''
            });
        }

        function buildPopup(inc) {
            const sc = STATUS_COLOR[inc.status];
            const sb = {
                new: '#e0f2fe',
                progress: '#ffedd5',
                resolved: '#dcfce7',
                rejected: '#fee2e2'
            };
            const pb = {
                high: '#fee2e2',
                medium: '#ffedd5',
                low: '#dcfce7'
            };
            const pc = {
                high: '#dc2626',
                medium: '#ea580c',
                low: '#16a34a'
            };
            return `<div style="font-family:'Plus Jakarta Sans',sans-serif;min-width:230px;max-width:270px">
        <div style="background:${sc};padding:.6rem 1rem;border-radius:12px 12px 0 0">
            <div style="font-size:.65rem;font-weight:700;color:rgba(255,255,255,.75);letter-spacing:1px;text-transform:uppercase;margin-bottom:.2rem">Incident Smart-City</div>
            <div style="font-family:'JetBrains Mono',monospace;color:#fff;font-size:.78rem;font-weight:600">${inc.id}</div>
        </div>
        <div style="padding:.9rem 1rem .75rem">
            <div style="font-size:.95rem;font-weight:800;color:#0f1e38;margin-bottom:.2rem">${CAT_LABEL[inc.cat] || inc.cat} — ${inc.title}</div>
            <div style="font-size:.75rem;color:#6b7a99;margin-bottom:.7rem">📍 ${inc.loc}</div>
            <div style="display:flex;gap:.4rem;flex-wrap:wrap;margin-bottom:.7rem">
                <span style="background:${sb[inc.status]};color:${sc};border-radius:99px;padding:.18rem .6rem;font-size:.7rem;font-weight:700">${STATUS_LABEL[inc.status]}</span>
                <span style="background:${pb[inc.prio]};color:${pc[inc.prio]};border-radius:99px;padding:.18rem .6rem;font-size:.7rem;font-weight:700">● ${PRIO_LABEL[inc.prio]}</span>
                <span style="background:#f0f6ff;color:#1a6fd4;border-radius:99px;padding:.18rem .6rem;font-size:.7rem;font-weight:700">${inc.zone}</span>
            </div>
            <div style="font-size:.72rem;color:#9ca3af">🕐 ${inc.date}</div>
        </div>
    </div>`;
        }

        /*MINI MAP*/
        let miniMap = null;

        function initMiniMap() {
            if (miniMap) return;
            miniMap = L.map('dash-mini-map', {
                center: [4.0511, 9.7140],
                zoom: 13,
                zoomControl: false,
                attributionControl: false,
                dragging: false,
                scrollWheelZoom: false,
                doubleClickZoom: false,
                touchZoom: false
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(miniMap);
            INCIDENTS.forEach(inc => {
                L.marker([inc.lat, inc.lng], {
                        icon: createSmallIcon(inc.status)
                    })
                    .bindPopup(buildPopup(inc), {
                        className: 'cf-popup',
                        maxWidth: 280
                    })
                    .addTo(miniMap);
            });
            const el = document.getElementById('dash-mini-map');
            el.style.cursor = 'pointer';
            el.addEventListener('click', (e) => {
                if (!e.target.closest('.leaflet-popup')) navigateTo('carte');
            });
        }

        /*FULL MAP*/
        let leafletMap = null;
        let markerCluster = null;
        let allMarkers = [];

        function initFullMap() {
            if (leafletMap) return;
            leafletMap = L.map('leaflet-map', {
                center: [4.0511, 9.7140],
                zoom: 14,
                zoomControl: false
            });
            L.control.zoom({
                position: 'bottomright'
            }).addTo(leafletMap);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(leafletMap);

            markerCluster = L.markerClusterGroup({
                maxClusterRadius: 45,
                iconCreateFunction: cluster => {
                    const n = cluster.getChildCount();
                    return L.divIcon({
                        html: `<div style="width:40px;height:40px;border-radius:50%;background:#1a6fd4;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.85rem;border:3px solid #fff;box-shadow:0 4px 14px rgba(26,111,212,.5)">${n}</div>`,
                        iconSize: [40, 40],
                        iconAnchor: [20, 20],
                        className: ''
                    });
                }
            });
            leafletMap.addLayer(markerCluster);

            const legend = L.control({
                position: 'bottomleft'
            });
            legend.onAdd = () => {
                const div = L.DomUtil.create('div', 'map-legend');
                div.innerHTML = `<div class="map-legend-title">Légende</div>
            <div class="legend-row"><div class="legend-dot-circle" style="background:#0369a1"></div>Nouveau</div>
            <div class="legend-row"><div class="legend-dot-circle" style="background:#ea580c"></div>En cours</div>
            <div class="legend-row"><div class="legend-dot-circle" style="background:#16a34a"></div>Résolu</div>
            <div class="legend-row"><div class="legend-dot-circle" style="background:#dc2626"></div>Rejeté</div>`;
                return div;
            };
            legend.addTo(leafletMap);

            INCIDENTS.forEach(inc => {
                const marker = L.marker([inc.lat, inc.lng], {
                    icon: createMarkerIcon(inc.status)
                });
                marker.bindPopup(buildPopup(inc), {
                    className: 'cf-popup',
                    maxWidth: 280,
                    minWidth: 230
                });
                marker.incidentData = inc;
                allMarkers.push(marker);
                markerCluster.addLayer(marker);
            });

            updateMapStats(INCIDENTS);
        }

        function applyMapFilters() {
            const cat = document.getElementById('mapFilterCat').value;
            const status = document.getElementById('mapFilterStatus').value;
            const prio = document.getElementById('mapFilterPrio').value;
            const zone = document.getElementById('mapFilterZone').value;
            const search = document.getElementById('mapFilterSearch').value.toLowerCase().trim();
            markerCluster.clearLayers();
            const visible = [];
            allMarkers.forEach(marker => {
                const d = marker.incidentData;
                if ((!cat || d.cat === cat) &&
                    (!status || d.status === status) &&
                    (!prio || d.prio === prio) &&
                    (!zone || d.zone === zone) &&
                    (!search || d.title.toLowerCase().includes(search) || d.loc.toLowerCase().includes(search) || d
                        .id.toLowerCase().includes(search))) {
                    markerCluster.addLayer(marker);
                    visible.push(d);
                }
            });
            document.getElementById('mapVisibleCount').textContent = visible.length + ' incident' + (visible.length > 1 ?
                's' : '');
            updateMapStats(visible);
            if (visible.length > 0) {
                const group = L.featureGroup(visible.map(d => L.marker([d.lat, d.lng])));
                leafletMap.fitBounds(group.getBounds().pad(.2), {
                    maxZoom: 16
                });
            }
        }

        function updateMapStats(data) {
            const c = {
                new: 0,
                progress: 0,
                resolved: 0,
                rejected: 0
            };
            data.forEach(d => c[d.status]++);
            document.getElementById('statTotal').textContent = data.length;
            document.getElementById('statNew').textContent = c.new;
            document.getElementById('statProg').textContent = c.progress;
            document.getElementById('statRes').textContent = c.resolved;
            document.getElementById('statRej').textContent = c.rejected;
        }

        function resetMapFilters() {
            ['mapFilterCat', 'mapFilterStatus', 'mapFilterPrio', 'mapFilterZone'].forEach(id => document.getElementById(id)
                .value = '');
            document.getElementById('mapFilterSearch').value = '';
            applyMapFilters();
            leafletMap.setView([4.0511, 9.7140], 14);
        }

        /*NAVIGATION*/
        function navigateTo(section) {
            document.querySelectorAll('.nav-link-cf').forEach(l => l.classList.remove('active'));
            document.querySelectorAll('.page-section').forEach(s => s.classList.remove('active'));
            const link = document.querySelector(`.nav-link-cf[data-section="${section}"]`);
            if (link) link.classList.add('active');
            const sec = document.getElementById(section + 'Section');
            if (sec) sec.classList.add('active');
            const labelEl = link ? link.querySelector('.nav-label') : null;
            document.getElementById('currentPageTitle').textContent = labelEl ? labelEl.textContent.trim() : section;
            if (section === 'carte') {
                setTimeout(() => {
                    initFullMap();
                    if (leafletMap) leafletMap.invalidateSize();
                }, 120);
            }
            if (section === 'dashboard') {
                setTimeout(() => {
                    initMiniMap();
                    if (miniMap) miniMap.invalidateSize();
                }, 120);
            }
            if (isMobile()) closeMobileSidebar();
        }

        document.querySelectorAll('.nav-link-cf').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                navigateTo(this.getAttribute('data-section'));
            });
        });

        // Gestion des clics sur les icônes de notification et de message
        document.addEventListener('DOMContentLoaded', function() {
            // Clic sur l'icône de notification (ouvre la section Notifications)
            const notificationIcon = document.querySelector('.topbar-actions .icon-btn:nth-child(1)');
            if (notificationIcon) {
                notificationIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    navigateTo('notifications');
                });
            }

            // Clic sur l'icône de message (ouvre la section Commentaires)
            const messageIcon = document.querySelector('.topbar-actions .icon-btn:nth-child(2)');
            if (messageIcon) {
                messageIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    navigateTo('commentaires');
                });
            }
        });

        setTimeout(initMiniMap, 300);