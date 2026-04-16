<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CityFix — Inscription</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:       #1A56DB;
            --primary-dark:  #1344B8;
            --primary-light: #EBF2FF;
            --accent:        #38BDF8;
            --surface:       #FFFFFF;
            --bg:            #F0F4FC;
            --text:          #0F172A;
            --muted:         #64748B;
            --border:        #CBD5E1;
            --danger:        #EF4444;
            --success:       #10B981;
            --warning:       #F59E0B;
            --shadow-lg:     0 20px 60px rgba(26,86,219,.18);
            --radius:        16px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            padding: 40px 16px;
            position: relative;
        }

        /* ── Animated background ── */
        .bg-scene {
            position: fixed; inset: 0; z-index: 0;
            background: linear-gradient(135deg, #EBF2FF 0%, #F0F4FC 50%, #E8F0FE 100%);
            overflow: hidden;
        }
        .bg-orb {
            position: absolute; border-radius: 50%;
            filter: blur(80px); opacity: .45;
            animation: drift 12s ease-in-out infinite alternate;
        }
        .bg-orb-1 { width: 520px; height: 520px; background: #BFDBFE; top: -180px; right: -140px; animation-delay: 0s; }
        .bg-orb-2 { width: 380px; height: 380px; background: #93C5FD; bottom: -120px; left: -100px; animation-delay: -5s; }
        .bg-orb-3 { width: 240px; height: 240px; background: #60A5FA; top: 50%; left: 40%; animation-delay: -9s; }

        @keyframes drift {
            from { transform: translate(0, 0) scale(1); }
            to   { transform: translate(25px, -25px) scale(1.06); }
        }
        .bg-grid {
            position: fixed; inset: 0; z-index: 0;
            background-image: radial-gradient(circle, #94A3B8 1px, transparent 1px);
            background-size: 32px 32px;
            opacity: .18;
        }

        /* ── Layout ── */
        .auth-wrapper {
            position: relative; z-index: 10;
            display: grid;
            grid-template-columns: 380px 520px;
            min-height: 640px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow-lg), 0 0 0 1px rgba(26,86,219,.08);
            animation: wrapperIn .7s cubic-bezier(.22,1,.36,1) both;
        }
        @keyframes wrapperIn {
            from { opacity: 0; transform: translateY(28px) scale(.97); }
            to   { opacity: 1; transform: none; }
        }

        /* ── Brand panel ── */
        .brand-panel {
            background: linear-gradient(155deg, #1A56DB 0%, #1344B8 55%, #0E358F 100%);
            padding: 52px 44px;
            display: flex; flex-direction: column; justify-content: space-between;
            position: relative; overflow: hidden;
        }
        .brand-panel::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .brand-panel::after {
            content: '';
            position: absolute; top: -80px; left: -80px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,.05);
        }

        .brand-logo {
            display: flex; align-items: center; gap: 12px;
            position: relative; z-index: 1;
        }
        .brand-logo .logo-icon {
            width: 48px; height: 48px;
            background: rgba(255,255,255,.15);
            border: 1.5px solid rgba(255,255,255,.3);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            backdrop-filter: blur(8px);
            font-size: 22px; color: #fff;
        }
        .brand-logo span {
            font-size: 22px; font-weight: 800;
            color: #fff; letter-spacing: -.5px;
        }

        .brand-content { position: relative; z-index: 1; }
        .brand-content h2 {
            font-size: 26px; font-weight: 800;
            color: #fff; line-height: 1.3; margin-bottom: 14px; letter-spacing: -.4px;
        }
        .brand-content p {
            font-size: 14px; color: rgba(255,255,255,.72); line-height: 1.7; margin: 0;
        }

        .brand-stats {
            position: relative; z-index: 1;
            display: grid; grid-template-columns: 1fr 1fr; gap: 12px;
        }
        .stat-card {
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 14px; padding: 16px;
            backdrop-filter: blur(8px);
        }
        .stat-card .stat-num {
            font-size: 22px; font-weight: 800; color: #fff;
            line-height: 1; margin-bottom: 4px;
        }
        .stat-card .stat-label {
            font-size: 11.5px; color: rgba(255,255,255,.65); font-weight: 500;
        }

        /* ── Form panel ── */
        .form-panel {
            background: var(--surface);
            padding: 48px 48px 44px;
            display: flex; flex-direction: column; justify-content: center;
            overflow-y: auto;
        }

        .form-header { margin-bottom: 28px; }
        .form-header h1 {
            font-size: 26px; font-weight: 800;
            color: var(--text); letter-spacing: -.5px; margin-bottom: 5px;
        }
        .form-header p { font-size: 13.5px; color: var(--muted); margin: 0; }

        /* ── Two-column grid for fields ── */
        .fields-grid {
            display: grid; grid-template-columns: 1fr 1fr; gap: 0 16px;
        }
        .field-full { grid-column: 1 / -1; }

        /* ── Fields ── */
        .field-group { margin-bottom: 18px; }
        .field-label {
            font-size: 12.5px; font-weight: 600;
            color: var(--text); margin-bottom: 6px; display: block;
        }
        .input-wrapper { position: relative; display: flex; align-items: center; }
        .input-icon {
            position: absolute; left: 14px;
            color: var(--muted); font-size: 15px;
            transition: color .2s; pointer-events: none; z-index: 2;
        }
        .form-control-cf {
            width: 100%;
            padding: 12px 40px 12px 40px;
            font-family: inherit; font-size: 14px;
            color: var(--text); background: var(--bg);
            border: 1.5px solid var(--border); border-radius: 11px;
            outline: none;
            transition: border-color .22s, box-shadow .22s, background .22s;
        }
        .form-control-cf::placeholder { color: #94A3B8; }
        .form-control-cf:focus {
            border-color: var(--primary); background: #fff;
            box-shadow: 0 0 0 4px rgba(26,86,219,.1);
        }
        .form-control-cf:focus ~ .input-icon,
        .input-wrapper:focus-within .input-icon { color: var(--primary); }
        .form-control-cf.is-invalid { border-color: var(--danger); }
        .form-control-cf.is-valid   { border-color: var(--success); }

        .eye-toggle {
            position: absolute; right: 12px;
            background: none; border: none; padding: 4px;
            color: var(--muted); font-size: 15px; cursor: pointer;
            transition: color .2s; z-index: 2;
        }
        .eye-toggle:hover { color: var(--primary); }

        .invalid-feedback-cf {
            font-size: 11.5px; color: var(--danger);
            margin-top: 4px; display: flex; align-items: center; gap: 3px;
        }

        /* ── Password strength ── */
        .strength-bar {
            height: 4px; border-radius: 99px;
            background: var(--border); margin-top: 8px;
            overflow: hidden;
        }
        .strength-fill {
            height: 100%; border-radius: 99px;
            width: 0; transition: width .35s ease, background .35s ease;
        }
        .strength-text {
            font-size: 11px; font-weight: 600; margin-top: 4px;
            transition: color .35s;
        }

        /* ── CGU ── */
        .cf-check { display: flex; align-items: flex-start; gap: 9px; cursor: pointer; }
        .cf-check input[type="checkbox"] {
            width: 15px; height: 15px; accent-color: var(--primary);
            cursor: pointer; flex-shrink: 0; margin-top: 2px;
        }
        .cf-check span { font-size: 12.5px; color: var(--muted); line-height: 1.5; user-select: none; }
        .cf-check a { color: var(--primary); font-weight: 600; text-decoration: none; }

        /* ── Submit ── */
        .btn-cf-primary {
            width: 100%; padding: 14px;
            background: linear-gradient(135deg, var(--primary) 0%, #1344B8 100%);
            color: #fff; border: none; border-radius: 12px;
            font-family: inherit; font-size: 15px; font-weight: 700;
            letter-spacing: .3px; cursor: pointer;
            position: relative; overflow: hidden;
            transition: transform .18s, box-shadow .18s;
            box-shadow: 0 4px 16px rgba(26,86,219,.35);
        }
        .btn-cf-primary:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(26,86,219,.4); }
        .btn-cf-primary:active { transform: none; }
        .btn-ripple {
            position: absolute; border-radius: 50%;
            background: rgba(255,255,255,.3);
            transform: scale(0); animation: ripple .6s linear;
            pointer-events: none;
        }
        @keyframes ripple { to { transform: scale(4); opacity: 0; } }
        .btn-cf-primary .spinner-border { width: 17px; height: 17px; border-width: 2px; }

        /* ── Footer ── */
        .form-footer {
            text-align: center; margin-top: 20px;
            font-size: 13px; color: var(--muted);
        }
        .form-footer a { color: var(--primary); font-weight: 700; text-decoration: none; transition: opacity .18s; }
        .form-footer a:hover { opacity: .75; }

        /* ── Alert ── */
        .alert-cf {
            border-radius: 11px; padding: 11px 14px;
            font-size: 13px; font-weight: 500;
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 20px; animation: slideDown .3s ease both;
        }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: none; } }
        .alert-cf-error  { background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA; }

        /* ── Step progress (optional visual) ── */
        .step-dots {
            display: flex; gap: 6px; margin-bottom: 24px;
        }
        .step-dot {
            height: 4px; border-radius: 99px;
            background: var(--border); transition: all .3s ease;
        }
        .step-dot.active { background: var(--primary); flex: 2; }
        .step-dot { flex: 1; }

        /* ── Stagger animations ── */
        .form-header   { opacity: 0; animation: fieldIn .5s ease .08s both; }
        .fields-grid .field-group:nth-child(1) { opacity: 0; animation: fieldIn .45s ease .14s both; }
        .fields-grid .field-group:nth-child(2) { opacity: 0; animation: fieldIn .45s ease .19s both; }
        .fields-grid .field-group:nth-child(3) { opacity: 0; animation: fieldIn .45s ease .24s both; }
        .fields-grid .field-group:nth-child(4) { opacity: 0; animation: fieldIn .45s ease .29s both; }
        .fields-grid .field-group:nth-child(5) { opacity: 0; animation: fieldIn .45s ease .34s both; }
        .fields-grid .field-group:nth-child(6) { opacity: 0; animation: fieldIn .45s ease .39s both; }
        .cgu-row  { opacity: 0; animation: fieldIn .45s ease .44s both; }
        .btn-row  { opacity: 0; animation: fieldIn .45s ease .50s both; }
        .form-footer { opacity: 0; animation: fieldIn .45s ease .58s both; }
        @keyframes fieldIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: none; }
        }

        /* ── Responsive ── */
        @media (max-width: 960px) {
            .auth-wrapper { grid-template-columns: 1fr; max-width: 480px; }
            .brand-panel  { display: none; }
            .form-panel   { padding: 40px 32px; }
        }
        @media (max-width: 520px) {
            .form-panel   { padding: 32px 20px; }
            .fields-grid  { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- Background -->
<div class="bg-scene">
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>
</div>
<div class="bg-grid"></div>

<div class="auth-wrapper">

    <!-- Brand panel -->
    <div class="brand-panel">
        <div class="brand-logo">
            <div class="logo-icon"><i class="bi bi-geo-alt-fill"></i></div>
            <span>CityFix</span>
        </div>

        <div class="brand-content">
            <h2>Rejoignez la communauté citoyenne</h2>
            <p>Signalez les problèmes de votre quartier, suivez leur résolution et contribuez à une ville meilleure.</p>
        </div>

        <div class="brand-stats">
            <div class="stat-card">
                <div class="stat-num">12k+</div>
                <div class="stat-label">Citoyens actifs</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">98%</div>
                <div class="stat-label">Taux de résolution</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">4.8★</div>
                <div class="stat-label">Note moyenne</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">48h</div>
                <div class="stat-label">Délai moyen</div>
            </div>
        </div>
    </div>

    <!-- Form panel -->
    <div class="form-panel">

        <div class="form-header">
            <h1>Créer un compte</h1>
            <p>Rejoignez CityFix et faites la différence dans votre ville</p>
        </div>

        {{-- Errors --}}
        @if($errors->any())
        <div class="alert-cf alert-cf-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            Veuillez corriger les erreurs ci-dessous.
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}" id="registerForm" novalidate>
            @csrf

            <div class="fields-grid">

                <!-- Nom -->
                <div class="field-group">
                    <label class="field-label" for="name">Nom complet</label>
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name"
                            class="form-control-cf @error('name') is-invalid @enderror"
                            placeholder="Jean Dupont"
                            value="{{ old('name') }}"
                            autocomplete="name" required>
                        <i class="bi bi-person input-icon"></i>
                    </div>
                    @error('name')
                        <div class="invalid-feedback-cf"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="field-group">
                    <label class="field-label" for="email">Adresse e-mail</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email"
                            class="form-control-cf @error('email') is-invalid @enderror"
                            placeholder="jean@email.com"
                            value="{{ old('email') }}"
                            autocomplete="email" required>
                        <i class="bi bi-envelope input-icon"></i>
                    </div>
                    @error('email')
                        <div class="invalid-feedback-cf"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Téléphone principal -->
                <div class="field-group">
                    <label class="field-label" for="phone">Téléphone</label>
                    <div class="input-wrapper">
                        <input type="tel" id="phone" name="phone"
                            class="form-control-cf @error('phone') is-invalid @enderror"
                            placeholder="+237 6XX XXX XXX"
                            value="{{ old('phone') }}"
                            autocomplete="tel" required>
                        <i class="bi bi-telephone input-icon"></i>
                    </div>
                    @error('phone')
                        <div class="invalid-feedback-cf"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Téléphone secondaire -->
                <div class="field-group">
                    <label class="field-label" for="phone_secondary">
                        Tél. secondaire
                        <span style="font-weight:400;color:var(--muted)">(facultatif)</span>
                    </label>
                    <div class="input-wrapper">
                        <input type="tel" id="phone_secondary" name="phone_secondary"
                            class="form-control-cf"
                            placeholder="+237 6XX XXX XXX"
                            value="{{ old('phone_secondary') }}"
                            autocomplete="tel">
                        <i class="bi bi-telephone input-icon"></i>
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="field-group">
                    <label class="field-label" for="password">Mot de passe</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password"
                            class="form-control-cf @error('password') is-invalid @enderror"
                            placeholder="••••••••"
                            autocomplete="new-password"
                            oninput="checkStrength(this.value)" required>
                        <i class="bi bi-lock input-icon"></i>
                        <button type="button" class="eye-toggle" onclick="togglePassword('password', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                    <div class="strength-text" id="strengthText"></div>
                    @error('password')
                        <div class="invalid-feedback-cf"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div class="field-group">
                    <label class="field-label" for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="input-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control-cf"
                            placeholder="••••••••"
                            autocomplete="new-password" required>
                        <i class="bi bi-lock-fill input-icon"></i>
                        <button type="button" class="eye-toggle" onclick="togglePassword('password_confirmation', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

            </div>

            <!-- CGU -->
            <div class="field-group cgu-row">
                <label class="cf-check">
                    <input type="checkbox" name="terms" id="terms" required>
                    <span>
                        J'accepte les
                        <a href="{{ route('terms') }}" target="_blank">Conditions d'utilisation</a>
                        et la
                        <a href="{{ route('privacy') }}" target="_blank">Politique de confidentialité</a>
                    </span>
                </label>
            </div>

            <!-- Submit -->
            <div class="btn-row">
                <button type="submit" class="btn-cf-primary" id="submitBtn">
                    <span id="btnText">Créer mon compte</span>
                    <span id="btnSpinner" class="spinner-border ms-2 d-none" role="status"></span>
                </button>
            </div>
        </form>

        <div class="form-footer">
            Vous avez déjà un compte ?
            <a href="{{ route('login') }}">Connectez-vous</a>
        </div>
    </div>

</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle password visibility
    function togglePassword(fieldId, btn) {
        const input = document.getElementById(fieldId);
        const icon  = btn.querySelector('i');
        input.type = input.type === 'password' ? 'text' : 'password';
        icon.className = input.type === 'text' ? 'bi bi-eye-slash' : 'bi bi-eye';
    }

</script>
</body>
</html>