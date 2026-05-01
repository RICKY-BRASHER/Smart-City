// ─── Douala incidents data
        const incidents = [{
                lat: 4.0510,
                lng: 9.6980,
                title: "Nid-de-poule profond",
                loc: "Rue Joss, Akwa",
                cat: "🕳️ Voirie",
                status: "new",
                priority: "high",
                id: "#CF-1284",
                color: "#dc2626"
            },
            {
                lat: 4.0460,
                lng: 9.7020,
                title: "Lampadaire éteint",
                loc: "Bd de la Liberté, Akwa",
                cat: "💡 Éclairage",
                status: "progress",
                priority: "medium",
                id: "#CF-1275",
                color: "#ea580c"
            },
            {
                lat: 4.0600,
                lng: 9.7200,
                title: "Fuite d'eau importante",
                loc: "Carrefour Ndokotti",
                cat: "💧 Eau",
                status: "progress",
                priority: "high",
                id: "#CF-1268",
                color: "#dc2626"
            },
            {
                lat: 4.0540,
                lng: 9.7150,
                title: "Dépôt sauvage d'ordures",
                loc: "Rue Castelnau, New Bell",
                cat: "🗑️ Ordures",
                status: "resolved",
                priority: "low",
                id: "#CF-1251",
                color: "#16a34a"
            },
            {
                lat: 4.0700,
                lng: 9.7350,
                title: "Route dégradée",
                loc: "Av. des Cocotiers, Bepanda",
                cat: "🕳️ Voirie",
                status: "new",
                priority: "high",
                id: "#CF-1247",
                color: "#dc2626"
            },
            {
                lat: 4.0420,
                lng: 9.6900,
                title: "Arbre dangereux",
                loc: "Bd du Général de Gaulle",
                cat: "🌲 Espaces verts",
                status: "progress",
                priority: "medium",
                id: "#CF-1239",
                color: "#ea580c"
            },
            {
                lat: 4.0650,
                lng: 9.7050,
                title: "Trottoir effondré",
                loc: "Rue de la Paix, Deido",
                cat: "🕳️ Voirie",
                status: "new",
                priority: "high",
                id: "#CF-1233",
                color: "#dc2626"
            },
            {
                lat: 4.0480,
                lng: 9.7280,
                title: "Éclairage public défaillant",
                loc: "Carrefour Shell, Akwa Nord",
                cat: "💡 Éclairage",
                status: "resolved",
                priority: "low",
                id: "#CF-1221",
                color: "#16a34a"
            },
            {
                lat: 4.0590,
                lng: 9.6950,
                title: "Décharge sauvage",
                loc: "Rue Bebey Eyidi, Bonanjo",
                cat: "🗑️ Ordures",
                status: "progress",
                priority: "medium",
                id: "#CF-1215",
                color: "#ea580c"
            },
            {
                lat: 4.0750,
                lng: 9.7180,
                title: "Canalisation bouchée",
                loc: "Quartier Cité des Palmiers",
                cat: "💧 Eau",
                status: "new",
                priority: "high",
                id: "#CF-1209",
                color: "#dc2626"
            },
        ];

        // ─── Create custom circle marker
        function makeMarker(incident) {
            const htmlIcon = L.divIcon({
                className: '',
                html: `<div style="
            width:16px;height:16px;border-radius:50%;
            background:\${incident.color};
            border:2.5px solid #fff;
            box-shadow:0 2px 8px rgba(0,0,0,.35);
            cursor:pointer;
        "></div>`,
                iconSize: [16, 16],
                iconAnchor: [8, 8],
                popupAnchor: [0, -10]
            });

            const statusLabel = {
                new: 'Nouveau',
                progress: 'En cours',
                resolved: 'Résolu'
            };
            const statusClass = {
                new: 'new',
                progress: 'progress',
                resolved: 'resolved'
            };

            const marker = L.marker([incident.lat, incident.lng], {
                icon: htmlIcon
            });
            marker.bindPopup(`
        <div class="cf-popup">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
                <span style="font-family:JetBrains Mono,monospace;font-size:.72rem;color:#1a6fd4;font-weight:600">\${incident.id}</span>
                <span class="status-badge ${statusClass[incident.status]}" style="font-size:.65rem;padding:.15rem .5rem">
                    <span class="dot"></span>${statusLabel[incident.status]}
                </span>
            </div>
            <div class="cf-popup-title">${incident.title}</div>
            <div class="cf-popup-loc">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="${incident.color}"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                \${incident.loc}
            </div>
            <div style="display:flex;align-items:center;gap:4px">
                <span style="display:inline-block;background:#e8f1fc;color:#1a6fd4;border-radius:99px;padding:.15rem .5rem;font-size:.68rem;font-weight:600">\${incident.cat}</span>
            </div>
        </div>
    `, {
                maxWidth: 220
            });
            return marker;
        }

        // ─── Map instances
        let mainMapInstance = null;
        let miniMapInstance = null;
        let profileMapInstance = null;

        function initMiniMap() {
            if (miniMapInstance) return;
            miniMapInstance = L.map('miniMap', {
                center: [4.0510, 9.6980],
                zoom: 14,
                zoomControl: false,
                scrollWheelZoom: false,
                dragging: false,
                doubleClickZoom: false,
                attributionControl: false
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(miniMapInstance);
            incidents.slice(0, 4).forEach(i => makeMarker(i).addTo(miniMapInstance));
            setTimeout(() => miniMapInstance.invalidateSize(), 300);
        }

        function initMainMap() {
            if (mainMapInstance) return;
            mainMapInstance = L.map('mainMap', {
                center: [4.0560, 9.7080],
                zoom: 13,
                zoomControl: true,
                attributionControl: true
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(mainMapInstance);
            incidents.forEach(i => makeMarker(i).addTo(mainMapInstance));
            setTimeout(() => mainMapInstance.invalidateSize(), 300);
        }

        function initProfileMap() {
            if (profileMapInstance) return;
            profileMapInstance = L.map('profileMap', {
                center: [4.0510, 9.6980],
                zoom: 14,
                zoomControl: false,
                scrollWheelZoom: false,
                dragging: false,
                doubleClickZoom: false,
                attributionControl: false
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(profileMapInstance);

            // Add only user's incidents (first 3 for demo)
            incidents.slice(0, 3).forEach(i => makeMarker(i).addTo(profileMapInstance));
            setTimeout(() => profileMapInstance.invalidateSize(), 300);
        }

        // ─── Sidebar Toggle 
        const sidebar = document.getElementById('sidebar');
        const mainArea = document.getElementById('mainArea');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        let collapsed = false;

        function closeMobileSidebar() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('visible');
        }

        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth < 992) {
                const isOpen = sidebar.classList.toggle('mobile-open');
                overlay.classList.toggle('visible', isOpen);
            } else {
                collapsed = !collapsed;
                sidebar.classList.toggle('collapsed', collapsed);
                mainArea.classList.toggle('expanded', collapsed);
                setTimeout(() => {
                    if (mainMapInstance) mainMapInstance.invalidateSize();
                    if (miniMapInstance) miniMapInstance.invalidateSize();
                    if (profileMapInstance) profileMapInstance.invalidateSize();
                }, 350);
            }
        });

        overlay.addEventListener('click', closeMobileSidebar);

        // ─── Navigation 
        function goTo(section) {
            document.querySelectorAll('.nav-link-cf').forEach(l => l.classList.remove('active'));
            document.querySelectorAll('.page-section').forEach(s => s.classList.remove('active'));

            const link = document.querySelector(`.nav-link-cf[data-section="${section}"]`);
            if (link) link.classList.add('active');

            const sec = document.getElementById(section + 'Section');
            if (sec) {
                sec.classList.add('active');
                document.getElementById('currentPageTitle').textContent =
                    link ? link.querySelector('.nav-label').textContent.trim() : section;
            }

            // Init maps when their section becomes visible
            if (section === 'carte') setTimeout(initMainMap, 80);
            if (section === 'accueil') setTimeout(initMiniMap, 80);
            if (section === 'profil') setTimeout(initProfileMap, 80);

            window.scrollTo(0, 0);

            // Close mobile sidebar on navigation
            if (window.innerWidth < 992) closeMobileSidebar();
        }

        document.querySelectorAll('.nav-link-cf').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                goTo(this.getAttribute('data-section'));
            });
        });

        // Dark Mode Toggle
        function toggleDarkMode(isDark) {
            document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
            localStorage.setItem('sc-theme', isDark ? 'dark' : 'light');
            // Refresh maps if they exist
            if (profileMapInstance) profileMapInstance.invalidateSize();
            if (mainMapInstance) mainMapInstance.invalidateSize();
            if (miniMapInstance) miniMapInstance.invalidateSize();
        }

        // Initialize dark mode from localStorage
        (function() {
            const savedTheme = localStorage.getItem('sc-theme');
            if (savedTheme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
                const toggle = document.getElementById('darkModeToggle');
                if (toggle) toggle.checked = true;
            }
        })();

        /*Language Dropdown*/
        function toggleLangDropdown() {
            const menu = document.getElementById('langDropdownMenu');
            menu.classList.toggle('open');
        }

        /*Close language dropdown when clicking outside*/
        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.lang-dropdown');
            if (dropdown && !dropdown.contains(e.target)) {
                document.getElementById('langDropdownMenu').classList.remove('open');
            }
        });

        function changeLanguage(lang) {
            const currentLangEl = document.getElementById('currentLang');
            if (lang === 'fr') {
                currentLangEl.innerHTML = '🇫🇷 Français';
            } else if (lang === 'en') {
                currentLangEl.innerHTML = '🇬🇧 English';
            }
            document.getElementById('langDropdownMenu').classList.remove('open');
            localStorage.setItem('sc-lang', lang);
            showToast('success', `Langue changée en ${lang === 'fr' ? 'Français' : 'English'} !`);
        }

        /*Initialize language from localStorage*/
        (function() {
            const savedLang = localStorage.getItem('sc-lang') || 'fr';
            const currentLangEl = document.getElementById('currentLang');
            if (savedLang === 'en' && currentLangEl) {
                currentLangEl.innerHTML = '🇬🇧 English';
            }
        })();

        /*Category selector */
        function selectCat(parent) {
            document.querySelectorAll('.cat-select-card').forEach(c => {
                c.style.border = '2px solid var(--border)';
                c.style.background = '#fff';
                c.querySelector('div:last-child').style.color = 'var(--text-mid)';
            });
            const card = parent.querySelector('.cat-select-card');
            card.style.border = '2px solid var(--blue)';
            card.style.background = 'var(--blue-xlight)';
            card.querySelector('div:last-child').style.color = 'var(--blue)';
        }

        /* Urgence selector */
        function selectUrgence(el, colorKey, hex) {
            document.querySelectorAll('.urgence-opt').forEach(o => {
                o.style.border = '2px solid var(--border)';
                o.style.background = '#fff';
            });
            el.style.border = `2px solid ${hex}`;
            el.style.background = `color-mix(in srgb, ${hex} 10%, white)`;
        }

        /* Toast notifications*/
        function showToast(type, message) {
            const container = document.getElementById('toastContainer');
            const colorMap = {
                success: '#16a34a',
                error: '#dc2626',
                info: '#1a6fd4',
                warning: '#ea580c'
            };
            const iconMap = {
                success: 'check-circle-fill',
                error: 'x-circle-fill',
                info: 'info-circle-fill',
                warning: 'exclamation-triangle-fill'
            };

            const toastEl = document.createElement('div');
            toastEl.innerHTML = `
                <div class="toast align-items-center border-0 show" role="alert" style="
                    background: #fff;
                    border-radius: 12px !important;
                    box-shadow: 0 8px 32px rgba(15,30,56,.18);
                    border-left: 4px solid ${colorMap[type]} !important;
                    min-width: 280px;
                    overflow: hidden;
                ">
                    <div class="d-flex align-items-center gap-2 p-3">
                        <i class="bi bi-${iconMap[type]}" style="color:${colorMap[type]};font-size:1.1rem;flex-shrink:0"></i>
                        <div class="toast-body p-0" style="font-size:.85rem;font-weight:600;color:#0f1e38;font-family:'Plus Jakarta Sans',sans-serif">${message}</div>
                        <button type="button" class="btn-close ms-auto" style="font-size:.7rem" onclick="this.closest('.toast').remove()"></button>
                    </div>
                </div>`;
            container.appendChild(toastEl);
            setTimeout(() => toastEl.remove(), 4000);
        }

        // ─── Init mini map on load (accueil is default)
        window.addEventListener('load', () => {
            setTimeout(initMiniMap, 200);
        });