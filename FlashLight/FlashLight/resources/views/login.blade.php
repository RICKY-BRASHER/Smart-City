<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1A56DB">
    <title>CityFix — Connexion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:      #1A56DB;
            --primary-dark: #0E358F;
            --accent:       #38BDF8;
            --surface:      #FFFFFF;
            --bg:           #EEF4FF;
            --text:         #0F172A;
            --muted:        #64748B;
            --border:       #CBD5E1;
            --danger:       #EF4444;
            --success:      #10B981;

            /*spacing */
            --sp-xs:  clamp(6px,  1.5vw, 10px);
            --sp-sm:  clamp(10px, 2.5vw, 16px);
            --sp-md:  clamp(16px, 3.5vw, 24px);
            --sp-lg:  clamp(22px, 5vw,   32px);

            /* Fluid font sizes */
            --fs-xs:   clamp(10px, 2.2vw, 12px);
            --fs-sm:   clamp(11.5px, 2.5vw, 13.5px);
            --fs-base: clamp(13px, 3vw, 14.5px);
            --fs-md:   clamp(16px, 4vw,  20px);

            
            --touch: 37px;

            --radius-sm: 10px;
            --radius-md: 14px;
            --radius-lg: 18px;

            --shadow-card: 0 20px 60px rgba(26,86,219,.16), 0 4px 16px rgba(26,86,219,.08);
            --ease: .22s cubic-bezier(.4,0,.2,1);
        }

        
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { -webkit-text-size-adjust: 100%; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: var(--fs-base);
            background: var(--bg);
            color: var(--text);
            min-height: 100svh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Respect notch / Dynamic Island */
            padding:
                max(var(--sp-md), env(safe-area-inset-top))
                max(var(--sp-md), env(safe-area-inset-right))
                max(var(--sp-md), env(safe-area-inset-bottom))
                max(var(--sp-md), env(safe-area-inset-left));
            overflow-x: hidden;
        }

        /*bg*/
        .bg-wrap { position: fixed; inset: 0; z-index: 0; overflow: hidden; pointer-events: none; }

        .bg-orb {
            position: absolute; border-radius: 50%;
            filter: blur(70px); will-change: transform;
            animation: drift 14s ease-in-out infinite alternate;
        }
        .orb-1 {
            width: clamp(180px, 40vw, 400px); height: clamp(180px, 40vw, 400px);
            background: rgba(26,86,219,.22); top: -20%; left: -10%;
        }
        .orb-2 {
            width: clamp(140px, 28vw, 300px); height: clamp(140px, 28vw, 300px);
            background: rgba(56,189,248,.18); bottom: -15%; right: -8%;
            animation-delay: -6s;
        }
        @keyframes drift {
            from { transform: translate(0,0) scale(1); }
            to   { transform: translate(22px,-22px) scale(1.05); }
        }
        .bg-grid {
            position: fixed; inset: 0;
            background-image:
                radial-gradient(circle, #1A56DB 1px, transparent 1px),
                radial-gradient(circle, #38BDF8 1px, transparent 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
            opacity: .06;
        }

        /*card*/
        .card {
            position: relative; z-index: 10;
            width: 100%;
            max-width: clamp(300px, 92vw, 440px);
            background: var(--surface);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            animation: popIn .55s cubic-bezier(.34,1.45,.64,1) both;
        }
        @keyframes popIn {
            from { opacity: 0; transform: scale(.93) translateY(18px); }
            to   { opacity: 1; transform: none; }
        }

        /*Header band*/
        .card-head {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: var(--sp-md) var(--sp-lg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--sp-sm);
            position: relative; overflow: hidden;
        }

        .logo-row { display: flex; align-items: center; gap: var(--sp-xs); position: relative; z-index: 1; flex-shrink: 0; }
        .logo-icon {
            width: clamp(32px, 6vw, 40px); height: clamp(32px, 6vw, 40px);
            background: rgba(255,255,255,.15); border: 1.5px solid rgba(255,255,255,.3);
            border-radius: 11px; display: flex; align-items: center; justify-content: center;
            font-size: clamp(15px, 3vw, 19px); color: #fff;
            backdrop-filter: blur(8px); transition: var(--ease); flex-shrink: 0;
        }
        .logo-icon:hover { transform: scale(1.08); background: rgba(255,255,255,.22); }
        .logo-name { font-size: clamp(15px, 3.5vw, 19px); font-weight: 800; color: #fff; letter-spacing: -.4px; white-space: nowrap; }

        .head-tagline { position: relative; z-index: 1; text-align: right; min-width: 0; }
        .head-tagline p { font-size: var(--fs-xs); color: rgba(255,255,255,.62); line-height: 1.45; font-weight: 500; }

        /*Body*/
        .card-body { padding: var(--sp-lg) var(--sp-lg) var(--sp-md); }

        .section-title { font-size: var(--fs-md); font-weight: 800; letter-spacing: -.4px; color: var(--text); margin-bottom: 3px; }
        .section-sub   { font-size: var(--fs-xs); color: var(--muted); margin-bottom: var(--sp-md); }

        /*Alerts*/
        .alert-cf {
            border-radius: var(--radius-sm); padding: var(--sp-xs) var(--sp-sm);
            font-size: var(--fs-xs); font-weight: 500;
            display: flex; align-items: flex-start; gap: 8px;
            margin-bottom: var(--sp-sm); line-height: 1.5;
            animation: slideDown .3s ease both;
        }
        @keyframes slideDown { from { opacity:0; transform:translateY(-6px); } to { opacity:1; transform:none; } }
        .alert-error   { background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA; }
        .alert-success { background: #F0FDF4; color: #16A34A; border: 1px solid #BBF7D0; }
        .alert-cf i { flex-shrink: 0; margin-top: 1px; }

        /* ── Field groups ── */
        .field-group { margin-bottom: var(--sp-sm); opacity: 0; animation: fieldIn .4s ease both; }
        .field-group:nth-child(1) { animation-delay: .08s; }
        .field-group:nth-child(2) { animation-delay: .14s; }
        @keyframes fieldIn { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:none; } }

        .field-top {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 6px; gap: var(--sp-sm);
        }
        .field-label { font-size: var(--fs-xs); font-weight: 700; color: var(--text); white-space: nowrap; }

        .forgot-link {
            font-size: var(--fs-xs); color: var(--primary); font-weight: 600;
            text-decoration: none; white-space: nowrap; transition: opacity var(--ease);
            min-height: var(--touch); display: inline-flex; align-items: center;
        }
        .forgot-link:hover { opacity: .72; text-decoration: underline; }

        .input-wrap { position: relative; display: flex; align-items: center; }

        .input-icon {
            position: absolute; left: 13px; font-size: 15px;
            color: var(--muted); z-index: 2; pointer-events: none;
            transition: color var(--ease); line-height: 1;
        }
        .form-input {
            width: 100%; min-height: var(--touch);
            padding: 0 44px 0 40px;
            font-family: inherit; font-size: var(--fs-base);
            color: var(--text); background: var(--bg);
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            outline: none; transition: all var(--ease);
            -webkit-appearance: none; /* removes iOS pill */
        }
        .form-input::placeholder { color: #94A3B8; }
        .form-input:focus {
            border-color: var(--primary); background: #fff;
            box-shadow: 0 0 0 3px rgba(26,86,219,.1);
        }
        .form-input:focus + .input-icon { color: var(--primary); }
        .form-input.is-invalid { border-color: var(--danger); background: #FEF2F2; }

        .eye-btn {
            position: absolute; right: 0;
            width: var(--touch); height: var(--touch);
            display: flex; align-items: center; justify-content: center;
            background: none; border: none; font-size: 15px;
            color: var(--muted); cursor: pointer; z-index: 2;
            transition: color var(--ease);
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
            -webkit-tap-highlight-color: transparent;
        }
        .eye-btn:hover { color: var(--primary); }
        .eye-btn:focus-visible { outline: 2px solid var(--primary); outline-offset: -2px; }

        .invalid-msg {
            display: flex; align-items: center; gap: 5px;
            font-size: var(--fs-xs); color: var(--danger); margin-top: 5px;
        }

        /*Remember*/
        .row-remember {
            margin-bottom: var(--sp-sm);
            opacity: 0; animation: fieldIn .4s ease .2s both;
        }
        .check-label {
            display: inline-flex; align-items: center; gap: 8px;
            cursor: pointer; font-size: var(--fs-sm);
            color: var(--muted); user-select: none;
            min-height: var(--touch);
        }
        .check-label input[type="checkbox"] {
            width: 16px; height: 16px; accent-color: var(--primary); flex-shrink: 0;
        }

        /*Submit bouton*/
        .btn-submit {
            width: 100%; min-height: var(--touch); padding: 0 var(--sp-md);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff; border: none; border-radius: var(--radius-sm);
            font-family: inherit; font-size: var(--fs-base); font-weight: 700; letter-spacing: .3px;
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;
            box-shadow: 0 4px 14px rgba(26,86,219,.34);
            position: relative; overflow: hidden;
            transition: all var(--ease);
            opacity: 0; animation: fieldIn .4s ease .26s both;
            -webkit-tap-highlight-color: transparent;
        }
        .btn-submit:hover    { transform: translateY(-1px); box-shadow: 0 7px 20px rgba(26,86,219,.4); }
        .btn-submit:active   { transform: none; box-shadow: 0 2px 8px rgba(26,86,219,.3); }
        .btn-submit:disabled { opacity: .68; cursor: not-allowed; transform: none; }
        .btn-submit:focus-visible { outline: 3px solid var(--accent); outline-offset: 2px; }

        .spinner {
            width: 16px; height: 16px;
            border: 2px solid rgba(255,255,255,.35); border-top-color: #fff;
            border-radius: 50%; display: none; flex-shrink: 0;
            animation: spin .7s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /*Divider*/
        .divider {
            display: flex; align-items: center; gap: 10px;
            margin: var(--sp-sm) 0;
            font-size: var(--fs-xs); font-weight: 600; color: var(--muted);
            opacity: 0; animation: fieldIn .4s ease .32s both;
        }
        .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: var(--border); }

        /*Social*/
        .social-row {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: var(--sp-xs); margin-bottom: var(--sp-sm);
            opacity: 0; animation: fieldIn .4s ease .38s both;
        }
        .btn-social {
            display: flex; align-items: center; justify-content: center; gap: 7px;
            min-height: var(--touch); padding: 0 var(--sp-sm);
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            background: #fff; font-family: inherit; font-size: var(--fs-sm);
            font-weight: 600; color: var(--text); cursor: pointer;
            transition: all var(--ease); position: relative; overflow: hidden;
            -webkit-tap-highlight-color: transparent; white-space: nowrap;
        }
        .btn-social:hover  { box-shadow: 0 2px 10px rgba(0,0,0,.09); transform: translateY(-1px); background: #F7FAFF; }
        .btn-social:active { transform: none; }
        .btn-social:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }
        .btn-social .bi-google     { color: #4285F4; font-size: 16px; }
        .btn-social .bi-cloud-fill { color: #333;    font-size: 16px; }

        /*Footer*/
        .card-footer-row {
            text-align: center; font-size: var(--fs-sm); color: var(--muted);
            margin-bottom: var(--sp-sm);
            opacity: 0; animation: fieldIn .4s ease .44s both;
        }
        .card-footer-row a {
            color: var(--primary); font-weight: 700; text-decoration: none;
            min-height: var(--touch); display: inline-flex; align-items: center;
            transition: opacity var(--ease);
        }
        .card-footer-row a:hover { opacity: .72; text-decoration: underline; }

        /* ── Feature badges ── */
        .features-strip {
            display: flex; gap: var(--sp-xs); justify-content: center; flex-wrap: wrap;
            opacity: 0; animation: fieldIn .4s ease .5s both; padding-bottom: 2px;
        }
        .feat-badge { display: flex; align-items: center; gap: 4px; font-size: var(--fs-xs); color: var(--muted); font-weight: 500; }
        .feat-badge i { color: var(--primary); font-size: 11px; }

        .ripple {
            position: absolute; border-radius: 50%;
            transform: scale(0); animation: rippleAnim .6s linear; pointer-events: none;
        }
        @keyframes rippleAnim { to { transform: scale(4); opacity: 0; } }

        /*RESPONSIVE BREAKPOINTS  (mobile-first)*/

        /* Extra-small phones < 360px */
        @media (max-width: 359px) {
            .card               { border-radius: var(--radius-md); }
            .social-row         { grid-template-columns: 1fr; }
            .head-tagline       { display: none; }
            .features-strip     { display: none; }
        }

        /* Small phones 360-479px — hide tagline text to avoid wrap */
        @media (max-width: 479px) {
            .head-tagline p     { display: none; }
        }

        /* Landscape orientation on short viewports */
        @media (max-height: 580px) and (orientation: landscape) {
            body               { align-items: flex-start; padding-top: 12px; padding-bottom: 12px; }
            .card              { max-width: clamp(300px, 55vw, 440px); }
            .section-sub       { margin-bottom: var(--sp-xs); }
            .field-group       { margin-bottom: var(--sp-xs); }
            .row-remember      { margin-bottom: var(--sp-xs); }
            .features-strip    { display: none; }
        }

        /* Tablets & desktops */
        @media (min-width: 768px) {
            body { padding: 40px; }
        }

        /* ── Reduced motion ── */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }

        /* colors*/
        @media (forced-colors: active) {
            .form-input  { border: 2px solid ButtonText; }
            .btn-submit  { border: 2px solid ButtonText; forced-color-adjust: none; }
            .btn-social  { border: 2px solid ButtonText; }
        }

        /*Focus*/
        :focus-visible              { outline: 2px solid var(--primary); outline-offset: 2px; }
        :focus:not(:focus-visible)  { outline: none; }

        .sr-only {
            position: absolute; width: 1px; height: 1px;
            padding: 0; margin: -1px; overflow: hidden;
            clip: rect(0,0,0,0); white-space: nowrap; border: 0;
        }
    </style>
</head>
<body>

    <!-- Background (decorative) -->
    <div class="bg-wrap" aria-hidden="true">
        <div class="bg-orb orb-1"></div>
        <div class="bg-orb orb-2"></div>
        <div class="bg-grid"></div>
    </div>

    <!-- Card -->
    <main class="card" role="main">

        <!-- Header band -->
        <header class="card-head">
            <div class="logo-row">
                <div class="logo-icon" aria-hidden="true"><i class="bi bi-geo-alt-fill"></i></div>
                <span class="logo-name">CityFix</span>
            </div>
            <div class="head-tagline" aria-hidden="true">
                <p>Signalez &amp; résolvez<br>les problèmes urbains</p>
            </div>
        </header>

        <!-- Body -->
        <div class="card-body">

            <h1 class="section-title">Connexion</h1>
            <p class="section-sub">Accédez à votre espace personnel</p>

            {{-- Laravel errors --}}
            {{-- @if ($errors->any())
            <div class="alert-cf alert-error" role="alert">
                <i class="bi bi-exclamation-circle-fill" aria-hidden="true"></i>
                <div>@foreach($errors->all() as $e){{ $e }}<br>@endforeach</div>
            </div>
            @endif
            @if(session('status'))
            <div class="alert-cf alert-success" role="status">
                <i class="bi bi-check-circle-fill" aria-hidden="true"></i>{{ session('status') }}
            </div>
            @endif --}}

            <!-- Form -->
            <form id="loginForm" novalidate
                {{-- method="POST" action="{{ route('login') }}" --}}>
                {{-- @csrf --}}

                <!-- Email -->
                <div class="field-group">
                    <div class="field-top">
                        <label class="field-label" for="email">Adresse e-mail</label>
                    </div>
                    <div class="input-wrap">
                        <i class="bi bi-envelope input-icon" aria-hidden="true"></i>
                        <input
                            type="email" id="email" name="email"
                            class="form-input"
                            placeholder="exemple@email.com"
                            autocomplete="email"
                            inputmode="email"
                            required aria-required="true"
                            aria-describedby="email-error"
                        >
                    </div>
                    <div id="email-error" class="invalid-msg" role="alert" hidden>
                        <i class="bi bi-exclamation-circle-fill" aria-hidden="true"></i>
                        <span></span>
                    </div>
                </div>

                <!-- Password -->
                <div class="field-group">
                    <div class="field-top">
                        <label class="field-label" for="password">Mot de passe</label>
                        <a href="#" class="forgot-link">Mot de passe oublié&nbsp;?</a>
                    </div>
                    <div class="input-wrap">
                        <i class="bi bi-lock input-icon" aria-hidden="true"></i>
                        <input
                            type="password" id="password" name="password"
                            class="form-input"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            required aria-required="true"
                            aria-describedby="password-error"
                        >
                        <button
                            type="button" class="eye-btn"
                            aria-label="Afficher le mot de passe"
                            onclick="togglePwd(this)">
                            <i class="bi bi-eye" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div id="password-error" class="invalid-msg" role="alert" hidden>
                        <i class="bi bi-exclamation-circle-fill" aria-hidden="true"></i>
                        <span></span>
                    </div>
                </div>

                <!-- Remember -->
                <div class="row-remember">
                    <label class="check-label">
                        <input type="checkbox" name="remember">
                        Se souvenir de moi
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-submit" id="submitBtn">
                    <span id="btnText">Se connecter</span>
                    <span class="spinner" id="btnSpinner" aria-hidden="true"></span>
                </button>

            </form>

            <!-- Divider -->
            <div class="divider" aria-hidden="true">ou continuer avec</div>

            <!-- Social -->
            <div class="social-row">
                <button type="button" class="btn-social" aria-label="Continuer avec Google">
                    <i class="bi bi-google" aria-hidden="true"></i>
                    <span>Google</span>
                </button>
                <button type="button" class="btn-social" aria-label="Continuer avec iCloud">
                    <i class="bi bi-cloud-fill" aria-hidden="true"></i>
                    <span>iCloud</span>
                </button>
            </div>

            <!-- Register link -->
            <div class="card-footer-row">
                Pas encore de compte&nbsp;?
                <a href="#">Inscrivez-vous</a>
            </div>

            <!-- Feature badges -->
            <div class="features-strip" aria-hidden="true">
                <span class="feat-badge"><i class="bi bi-lightning-fill"></i>Instantané</span>
                <span class="feat-badge"><i class="bi bi-shield-check"></i>Sécurisé</span>
                <span class="feat-badge"><i class="bi bi-people-fill"></i>Communauté</span>
            </div>

        </div>
    </main>

    <script>
        /* ── Toggle password ── */
        function togglePwd(btn) {
            const inp     = document.getElementById('password');
            const ico     = btn.querySelector('i');
            const showing = inp.type === 'text';
            inp.type      = showing ? 'password' : 'text';
            ico.className = showing ? 'bi bi-eye' : 'bi bi-eye-slash';
            btn.setAttribute('aria-label', showing ? 'Afficher le mot de passe' : 'Masquer le mot de passe');
        }

        /* ── Ripple factory ── */
        function ripple(el, e, color) {
            const rect = el.getBoundingClientRect();
            const s    = Math.max(rect.width, rect.height);
            const r    = Object.assign(document.createElement('span'), { className: 'ripple' });
            r.style.cssText = `
                width:${s}px;height:${s}px;
                left:${e.clientX - rect.left - s/2}px;
                top:${e.clientY  - rect.top  - s/2}px;
                background:${color};
            `;
            el.appendChild(r);
            r.addEventListener('animationend', () => r.remove(), { once: true });
        }

        document.querySelector('.btn-submit').addEventListener('pointerdown', e =>
            ripple(e.currentTarget, e, 'rgba(255,255,255,.25)'));

        document.querySelectorAll('.btn-social').forEach(btn =>
            btn.addEventListener('pointerdown', e => ripple(btn, e, 'rgba(26,86,219,.08)')));

        /* ── Validation messages ── */
        const MSGS = {
            email:    { valueMissing: 'L\'adresse e-mail est requise.',          typeMismatch: 'Veuillez saisir une adresse e-mail valide.' },
            password: { valueMissing: 'Le mot de passe est requis.' },
        };

        function showErr(input, msg) {
            const el = document.getElementById(input.id + '-error');
            if (!el) return;
            input.classList.add('is-invalid');
            input.setAttribute('aria-invalid', 'true');
            el.querySelector('span').textContent = msg;
            el.hidden = false;
        }
        function clearErr(input) {
            const el = document.getElementById(input.id + '-error');
            if (!el) return;
            input.classList.remove('is-invalid');
            input.removeAttribute('aria-invalid');
            el.hidden = true;
        }
        function validate(input) {
            const m = MSGS[input.id] || {};
            if (input.validity.valueMissing) { showErr(input, m.valueMissing  || 'Champ requis.');    return false; }
            if (input.validity.typeMismatch) { showErr(input, m.typeMismatch  || 'Format invalide.'); return false; }
            clearErr(input); return true;
        }

        document.querySelectorAll('.form-input').forEach(inp => {
            inp.addEventListener('blur',  ()  => validate(inp));
            inp.addEventListener('input', ()  => { if (inp.classList.contains('is-invalid')) validate(inp); });
        });

        /* ── Submit ── */
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();
            let ok = true;
            this.querySelectorAll('.form-input[required]').forEach(inp => { if (!validate(inp)) ok = false; });
            if (!ok) { this.querySelector('.form-input.is-invalid')?.focus(); return; }

            const btn = document.getElementById('submitBtn');
            document.getElementById('btnText').textContent   = 'Connexion…';
            document.getElementById('btnSpinner').style.display = 'block';
            btn.disabled = true;
            // In Laravel: remove e.preventDefault() and let the form POST
        });
    </script>
</body>
</html>