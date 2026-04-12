<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CityFix — Signalez les Dégradations Urbaines</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet"/>

  <style>
    :root {
      --blue-primary: #1a6fd4;
      --blue-dark:    #1557b0;
      --blue-light:   #e8f1fc;
      --blue-mid:     #2d80e8;
      --accent:       #f0a500;
      --text-dark:    #1a2235;
      --text-muted:   #6b7a99;
      --bg-light:     #f4f7fc;
      --white:        #ffffff;
      --shadow-sm:    0 2px 12px rgba(26,111,212,.10);
      --shadow-md:    0 8px 32px rgba(26,111,212,.16);
      --shadow-lg:    0 20px 60px rgba(26,111,212,.22);
      --radius:       16px;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--bg-light);
      color: var(--text-dark);
      overflow-x: hidden;
    }

    h1, h2, h3, h4, .brand { font-family: 'Plus Jakarta Sans', sans-serif; }

    /*SCROLLBAR*/
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--bg-light); }
    ::-webkit-scrollbar-thumb { background: var(--blue-primary); border-radius: 99px; }

    /*NAVBAR*/
    .navbar-cityfix {
      background: var(--blue-primary);
      padding: 0 2rem;
      height: 64px;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 4px 20px rgba(26,111,212,.30);
    }
    .navbar-cityfix .brand {
      font-size: 1.35rem;
      font-weight: 800;
      color: #fff;
      letter-spacing: -.3px;
      display: flex;
      align-items: center;
      gap: .45rem;
      text-decoration: none;
    }
    .brand-icon {
      width: 34px; height: 34px;
      background: #fff;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      color: var(--blue-primary);
      font-size: 1rem;
      box-shadow: 0 2px 8px rgba(0,0,0,.15);
      transition: transform .3s ease;
    }
    .brand:hover .brand-icon { transform: rotate(15deg) scale(1.1); }

    .nav-link-cf {
      color: rgba(255,255,255,.85) !important;
      font-size: .88rem;
      font-weight: 500;
      padding: .4rem .8rem !important;
      border-radius: 8px;
      transition: background .2s, color .2s;
      white-space: nowrap;
    }
    .nav-link-cf:hover { background: rgba(255,255,255,.15); color: #fff !important; }

    .btn-nav-outline {
      border: 1.5px solid rgba(255,255,255,.6);
      color: #fff !important;
      font-size: .85rem;
      font-weight: 600;
      border-radius: 8px;
      padding: .35rem 1rem;
      transition: all .2s;
    }
    .btn-nav-outline:hover { background: rgba(255,255,255,.2); border-color: #fff; }

    .btn-nav-solid {
      background: #fff;
      color: var(--blue-primary) !important;
      font-size: .85rem;
      font-weight: 700;
      border-radius: 8px;
      padding: .35rem 1.1rem;
      border: none;
      transition: all .25s;
      box-shadow: 0 2px 8px rgba(0,0,0,.12);
    }
    .btn-nav-solid:hover {
      background: var(--blue-light);
      transform: translateY(-1px);
      box-shadow: 0 4px 14px rgba(0,0,0,.18);
    }

    /*HERO*/
    .hero {
      background: linear-gradient(135deg, #1a6fd4 0%, #2d80e8 50%, #1e90ff 100%);
      padding: 80px 0 90px;
      position: relative;
      overflow: hidden;
    }
    .hero::before {
      content: '';
      position: absolute; inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      pointer-events: none;
    }
    .hero::after {
      content: '';
      position: absolute;
      bottom: -2px; left: 0; right: 0;
      height: 60px;
      background: var(--bg-light);
      clip-path: ellipse(55% 100% at 50% 100%);
    }

    /* floating blobs */
    .blob {
      position: absolute;
      border-radius: 50%;
      filter: blur(60px);
      pointer-events: none;
      opacity: .25;
    }
    .blob-1 { width: 300px; height: 300px; background: #fff; top: -100px; right: 5%; animation: floatBlob 8s ease-in-out infinite; }
    .blob-2 { width: 200px; height: 200px; background: var(--accent); bottom: 30px; left: 3%; animation: floatBlob 10s ease-in-out infinite reverse; }

    @keyframes floatBlob {
      0%, 100% { transform: translate(0,0) scale(1); }
      50%       { transform: translate(20px,-20px) scale(1.08); }
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: .4rem;
      background: rgba(255,255,255,.18);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,.3);
      border-radius: 99px;
      padding: .35rem 1rem;
      font-size: .8rem;
      font-weight: 600;
      color: #fff;
      margin-bottom: 1.4rem;
      animation: fadeInDown .6s ease both;
    }
    .hero-badge .dot {
      width: 8px; height: 8px;
      background: #4ade80;
      border-radius: 50%;
      animation: pulse 1.5s ease-in-out infinite;
    }
    @keyframes pulse { 0%,100%{box-shadow:0 0 0 0 rgba(74,222,128,.6)} 50%{box-shadow:0 0 0 6px rgba(74,222,128,0)} }

    .hero h1 {
      font-size: clamp(2rem, 4vw, 3.2rem);
      font-weight: 800;
      color: #fff;
      line-height: 1.15;
      letter-spacing: -.5px;
      animation: fadeInUp .7s .1s ease both;
    }
    .hero h1 span { color: var(--accent); }

    .hero-subtitle {
      color: rgba(255,255,255,.85);
      font-size: 1.05rem;
      line-height: 1.7;
      max-width: 480px;
      margin-top: 1rem;
      animation: fadeInUp .7s .2s ease both;
    }

    .hero-actions {
      display: flex; gap: 1rem; flex-wrap: wrap;
      margin-top: 2rem;
      animation: fadeInUp .7s .3s ease both;
    }

    .btn-hero-primary {
      background: #fff;
      color: var(--blue-primary);
      font-weight: 700;
      font-size: .95rem;
      border-radius: 12px;
      padding: .75rem 1.6rem;
      border: none;
      display: inline-flex; align-items: center; gap: .5rem;
      box-shadow: 0 4px 20px rgba(0,0,0,.18);
      transition: all .25s;
    }
    .btn-hero-primary:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(0,0,0,.22); }

    .btn-hero-ghost {
      background: rgba(255,255,255,.15);
      backdrop-filter: blur(6px);
      color: #fff;
      font-weight: 600;
      font-size: .95rem;
      border-radius: 12px;
      padding: .75rem 1.6rem;
      border: 1.5px solid rgba(255,255,255,.45);
      display: inline-flex; align-items: center; gap: .5rem;
      transition: all .25s;
    }
    .btn-hero-ghost:hover {
      background: rgba(255,255,255,.25);
      border-color: #fff;
      color: #fff;
      transform: translateY(-3px);
    }

    /*Hero card*/
    .hero-card {
      background: rgba(255,255,255,.12);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255,255,255,.25);
      border-radius: 24px;
      padding: 2rem;
      animation: fadeInRight .8s .15s ease both;
      position: relative;
    }
    .hero-card-inner {
      background: rgba(255,255,255,.95);
      border-radius: 16px;
      padding: 1.5rem;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }
    .stat-pill {
      background: var(--blue-light);
      border-radius: 12px;
      padding: .9rem 1rem;
      text-align: center;
    }
    .stat-pill .val {
      font-size: 1.6rem;
      font-weight: 800;
      color: var(--blue-primary);
      display: block;
      line-height: 1;
    }
    .stat-pill .lbl {
      font-size: .72rem;
      color: var(--text-muted);
      font-weight: 500;
      margin-top: .2rem;
      display: block;
    }
    .stat-pill.accent { background: #fff9e6; }
    .stat-pill.accent .val { color: var(--accent); }
    .stat-pill.green { background: #edfbf3; }
    .stat-pill.green .val { color: #16a34a; }

    .hero-pin {
      position: absolute;
      top: -16px; right: 24px;
      background: var(--blue-primary);
      color: #fff;
      border-radius: 99px;
      padding: .3rem .9rem;
      font-size: .78rem;
      font-weight: 700;
      box-shadow: var(--shadow-md);
      display: flex; align-items: center; gap: .35rem;
      animation: bounce 2s ease-in-out infinite;
    }
    @keyframes bounce { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-6px)} }

    /*CATEGORIES*/
    .section-categories {
      padding: 70px 0 80px;
      background: var(--bg-light);
    }
    .section-label {
      font-size: .78rem;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--blue-primary);
      margin-bottom: .5rem;
    }
    .section-title {
      font-size: clamp(1.5rem, 3vw, 2.2rem);
      font-weight: 800;
      color: var(--text-dark);
      letter-spacing: -.3px;
    }

    .cat-card {
      background: #fff;
      border-radius: var(--radius);
      padding: 1.8rem 1.4rem 1.5rem;
      text-align: center;
      cursor: pointer;
      border: 2px solid transparent;
      box-shadow: var(--shadow-sm);
      transition: all .3s cubic-bezier(.4,0,.2,1);
      position: relative;
      overflow: hidden;
    }
    .cat-card::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, var(--blue-light), transparent);
      opacity: 0;
      transition: opacity .3s;
    }
    .cat-card:hover::before { opacity: 1; }
    .cat-card:hover {
      border-color: var(--blue-primary);
      transform: translateY(-8px);
      box-shadow: var(--shadow-lg);
    }
    .cat-icon {
      width: 64px; height: 64px;
      border-radius: 18px;
      background: var(--blue-light);
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 1rem;
      font-size: 1.7rem;
      transition: transform .3s ease, background .3s;
    }
    .cat-card:hover .cat-icon { transform: scale(1.15) rotate(-5deg); background: var(--blue-primary); color: #fff; }
    .cat-name {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: .95rem;
      color: var(--text-dark);
    }
    .cat-count {
      font-size: .78rem;
      color: var(--text-muted);
      margin-top: .2rem;
    }

    
    .more-pill {
      display: inline-flex; align-items: center; gap: .5rem;
      background: #fff;
      border: 2px dashed var(--blue-primary);
      color: var(--blue-primary);
      font-weight: 700;
      font-size: .88rem;
      border-radius: 99px;
      padding: .55rem 1.4rem;
      margin-top: 2rem;
      cursor: pointer;
      transition: all .25s;
    }
    .more-pill:hover { background: var(--blue-light); transform: scale(1.04); }

    /* HOW IT WORKS*/
    .section-how {
      padding: 80px 0;
      background: linear-gradient(180deg, #fff 0%, var(--bg-light) 100%);
    }
    .step-line {
      display: flex; flex-direction: column; align-items: center;
      position: relative;
    }
    .step-number {
      width: 52px; height: 52px;
      background: var(--blue-primary);
      color: #fff;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 800;
      font-size: 1.15rem;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 4px 16px rgba(26,111,212,.35);
      position: relative; z-index: 1;
    }
    .step-connector {
      width: 2px;
      flex: 1;
      background: linear-gradient(to bottom, var(--blue-primary), transparent);
      margin: .5rem 0;
      min-height: 40px;
    }
    .step-card {
      background: #fff;
      border-radius: var(--radius);
      padding: 1.6rem 1.4rem;
      box-shadow: var(--shadow-sm);
      border-left: 4px solid var(--blue-primary);
      transition: all .3s;
    }
    .step-card:hover { box-shadow: var(--shadow-md); transform: translateX(6px); }
    .step-card h5 { font-weight: 700; font-size: 1rem; margin-bottom: .4rem; }
    .step-card p { font-size: .88rem; color: var(--text-muted); line-height: 1.6; margin: 0; }

    /*communaute*/
    .cta-band {
      background: linear-gradient(135deg, var(--blue-dark), var(--blue-mid));
      padding: 60px 0;
      position: relative;
      overflow: hidden;
    }
    .cta-band::before {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(circle at 80% 50%, rgba(255,255,255,.07) 0%, transparent 60%);
    }
    .cta-band h2 { color: #fff; font-weight: 800; font-size: clamp(1.5rem, 3vw, 2.2rem); }
    .cta-band p { color: rgba(255,255,255,.8); font-size: 1rem; }

    .btn-cta {
      background: var(--accent);
      color: var(--text-dark);
      font-weight: 700;
      font-size: 1rem;
      border-radius: 12px;
      padding: .85rem 2rem;
      border: none;
      display: inline-flex; align-items: center; gap: .5rem;
      transition: all .25s;
      box-shadow: 0 4px 16px rgba(240,165,0,.4);
    }
    .btn-cta:hover { transform: translateY(-3px) scale(1.03); box-shadow: 0 8px 24px rgba(240,165,0,.5); }

    /*FOOTER*/
    footer {
      background: var(--text-dark);
      color: rgba(255,255,255,.6);
      padding: 40px 0 24px;
      font-size: .85rem;
    }
    footer .brand { color: #fff; font-size: 1.15rem; }
    footer a { color: rgba(255,255,255,.55); text-decoration: none; transition: color .2s; }
    footer a:hover { color: #fff; }
    .footer-divider { border-color: rgba(255,255,255,.1); margin: 1.5rem 0 1rem; }

    /*ANIMATIONS*/
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInRight {
      from { opacity: 0; transform: translateX(40px); }
      to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }

    .reveal { opacity: 0; transform: translateY(28px); transition: opacity .65s ease, transform .65s ease; }
    .reveal.visible { opacity: 1; transform: translateY(0); }

    /* Stagger delays */
    .reveal-d1 { transition-delay: .05s; }
    .reveal-d2 { transition-delay: .15s; }
    .reveal-d3 { transition-delay: .25s; }
    .reveal-d4 { transition-delay: .35s; }
    .reveal-d5 { transition-delay: .45s; }

    /*COUNTER ANIMATION */
    .count-up { display: inline-block; }

    /* RESPONSIVE*/
    @media (max-width: 767px) {
      .hero { padding: 60px 0 80px; }
      .hero-card { margin-top: 2.5rem; }
      .hero-actions { flex-direction: column; }
    }
  </style>
</head>
<body>

<!--NAVBAR-->
<nav class="navbar-cityfix d-flex align-items-center justify-content-between">
  <a href="#" class="brand">
    <span class="brand-icon"><i class="bi bi-geo-alt-fill"></i></span>
    CityFix
  </a>
  <div class="d-none d-md-flex align-items-center gap-1">
    <a href="#" class="nav-link-cf"><i class="bi bi-flag me-1"></i>Signaler un incident</a>
    <a href="#" class="nav-link-cf"><i class="bi bi-list-check me-1"></i>Mes Signalements</a>
    <div class="d-flex gap-2 ms-2">
      <a href="#" class="btn btn-nav-outline">Connexion</a>
      <a href="#" class="btn btn-nav-solid">Inscription</a>
    </div>
  </div>
  <button class="btn d-md-none" style="color:#fff;font-size:1.4rem;border:none;" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
    <i class="bi bi-list"></i>
  </button>
</nav>

<!-- Mobile menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
  <div class="offcanvas-header" style="background:var(--blue-primary)">
    <span class="brand text-white" style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800"><i class="bi bi-geo-alt-fill me-2"></i>CityFix</span>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column gap-3 pt-4">
    <a href="#" class="text-decoration-none fw-600" style="color:var(--blue-primary)"><i class="bi bi-flag me-2"></i>Signaler un incident</a>
    <a href="#" class="text-decoration-none fw-600" style="color:var(--blue-primary)"><i class="bi bi-list-check me-2"></i>Mes Signalements</a>
    <hr/>
    <a href="#" class="btn" style="background:var(--blue-primary);color:#fff;font-weight:700;border-radius:10px">Connexion</a>
    <a href="#" class="btn" style="background:var(--blue-light);color:var(--blue-primary);font-weight:700;border-radius:10px">Inscription</a>
  </div>
</div>

<!--HERO-->
<section class="hero">
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="container">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="hero-badge">
          <span class="dot"></span>
          Plateforme citoyenne active
        </div>
        <h1>Signalez les <span>Dégradations</span><br>Urbaines facilement</h1>
        <p class="hero-subtitle">
          Aidez à maintenir la ville en bon état en signalant les problèmes autour de vous via notre plateforme <strong>CityFix</strong>. Rapide, simple et efficace.
        </p>
        <div class="hero-actions">
          <a href="#" class="btn-hero-primary">
            <i class="bi bi-flag-fill"></i>
            Signaler un Incident
          </a>
          <a href="#" class="btn-hero-ghost">
            <i class="bi bi-search"></i>
            Suivre mes Signalements
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-card position-relative">
          <div class="hero-pin"><i class="bi bi-geo-alt-fill"></i> 3 signalements près de vous</div>
          <div class="hero-card-inner">
            <div class="stat-pill">
              <span class="val count-up" data-target="1284">0</span>
              <span class="lbl">Incidents signalés</span>
            </div>
            <div class="stat-pill green">
              <span class="val count-up" data-target="896">0</span>
              <span class="lbl">Problèmes résolus</span>
            </div>
            <div class="stat-pill accent">
              <span class="val count-up" data-target="342">0</span>
              <span class="lbl">En cours de traitement</span>
            </div>
            <div class="stat-pill">
              <span class="val count-up" data-target="47">0</span>
              <span class="lbl">Quartiers couverts</span>
            </div>
          </div>
          <div class="mt-3 p-3 rounded-3" style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25)">
            <div class="d-flex align-items-center gap-2 mb-2">
              <div style="width:8px;height:8px;background:#4ade80;border-radius:50%;flex-shrink:0;animation:pulse 1.5s infinite"></div>
              <span style="color:#fff;font-size:.82rem;font-weight:600">Dernier signalement</span>
            </div>
            <div style="background:#fff;border-radius:10px;padding:.75rem 1rem;display:flex;align-items:center;gap:.75rem">
              <div style="background:var(--blue-light);width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--blue-primary);font-size:1.1rem;flex-shrink:0">🕳️</div>
              <div>
                <div style="font-weight:700;font-size:.85rem;color:var(--text-dark)">Nid-de-poule — Rue Joss</div>
                <div style="font-size:.75rem;color:var(--text-muted)">Il y a 4 minutes · En attente</div>
              </div>
              <span style="margin-left:auto;background:#fef3c7;color:#d97706;font-size:.7rem;font-weight:700;border-radius:99px;padding:.2rem .6rem">Nouveau</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!--CATEGORIES-->
<section class="section-categories">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <div class="section-label">Catégories d'incidents</div>
      <h2 class="section-title">Que souhaitez-vous signaler ?</h2>
      <p class="text-muted mt-2" style="font-size:.95rem;max-width:500px;margin:auto">Sélectionnez le type de problème pour commencer votre signalement en quelques clics.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-6 col-md-4 col-lg-2 reveal reveal-d1">
        <div class="cat-card h-100">
            <div class="cat-icon">🕳️</div>
          <div class="cat-name">Nid-de-poule</div>
          <div class="cat-count">248 signalements</div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2 reveal reveal-d2">
        <div class="cat-card h-100">
          <div class="cat-icon">💡</div>
          <div class="cat-name">Éclairage</div>
          <div class="cat-count">134 signalements</div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2 reveal reveal-d3">
        <div class="cat-card h-100">
          <div class="cat-icon">💧</div>
          <div class="cat-name">Fuite d'eau</div>
          <div class="cat-count">87 signalements</div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2 reveal reveal-d4">
        <div class="cat-card h-100">
          <div class="cat-icon">🗑️</div>
          <div class="cat-name">Ordures</div>
          <div class="cat-count">311 signalements</div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2 reveal reveal-d5">
        <div class="cat-card h-100">
          <div class="cat-icon">🌲</div>
          <div class="cat-name">Espaces verts</div>
          <div class="cat-count">56 signalements</div>
        </div>
      </div>
    </div>

    <div class="text-center">
      <span class="more-pill">
        <i class="bi bi-plus-circle"></i>
        Et d'autres catégories...
      </span>
    </div>
  </div>
</section>

<!--HOW IT WORK-->
<section class="section-how">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5 reveal">
        <div class="section-label">Comment ça marche</div>
        <h2 class="section-title">Simple, rapide,<br>efficace</h2>
        <p class="text-muted mt-3" style="font-size:.95rem;line-height:1.7">
          CityFix transforme chaque citoyen en acteur de l'amélioration de sa ville. En 3 étapes, votre signalement est transmis aux autorités compétentes.
        </p>
        <a href="#" class="btn-hero-primary mt-4 d-inline-flex" style="color:var(--blue-primary);background:var(--blue-primary);color:#fff;font-weight:700;border-radius:12px;padding:.75rem 1.6rem;text-decoration:none;gap:.5rem">
          <i class="bi bi-lightning-fill"></i>
          Commencer maintenant
        </a>
      </div>
      <div class="col-lg-7">
        <div class="d-flex gap-3 align-items-stretch reveal reveal-d1">
          <div class="step-line">
            <div class="step-number">1</div>
            <div class="step-connector"></div>
            <div class="step-number">2</div>
            <div class="step-connector"></div>
            <div class="step-number">3</div>
          </div>
          <div class="d-flex flex-column gap-3 flex-grow-1">
            <div class="step-card">
              <h5><i class="bi bi-camera text-primary me-2"></i>Photographiez le problème</h5>
              <p>Prenez une photo ou décrivez le problème que vous observez dans votre quartier.</p>
            </div>
            <div class="step-card">
              <h5><i class="bi bi-geo-alt text-primary me-2"></i>Localisez l'incident</h5>
              <p>Utilisez votre GPS ou entrez l'adresse exacte pour que les équipes puissent intervenir rapidement.</p>
            </div>
            <div class="step-card">
              <h5><i class="bi bi-bell text-primary me-2"></i>Suivez le traitement</h5>
              <p>Recevez des notifications en temps réel sur l'avancement de votre signalement jusqu'à sa résolution.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- communaute-->
<section class="cta-band">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7 reveal">
        <h2>Rejoignez la communauté CityFix</h2>
        <p class="mt-2 mb-0">Plus de <strong style="color:#fff">5 000 citoyens</strong> ont déjà amélioré leur ville grâce à leurs signalements. C'est votre tour.</p>
      </div>
      <div class="col-lg-5 text-lg-end reveal reveal-d2">
        <a href="#" class="btn-cta">
          <i class="bi bi-person-plus-fill"></i>
          Créer mon compte gratuitement
        </a>
      </div>
    </div>
  </div>
</section>

<!--FOOTER-->
<footer>
  <div class="container">
    <div class="row g-4 mb-2">
      <div class="col-md-4">
        <a href="#" class="brand d-flex align-items-center gap-2 mb-3">
          <span class="brand-icon" style="background:var(--blue-primary);color:#fff"><i class="bi bi-geo-alt-fill"></i></span>
          CityFix
        </a>
        <p style="font-size:.85rem;line-height:1.7">La plateforme citoyenne pour signaler et suivre les problèmes urbains.</p>
      </div>
      <div class="col-6 col-md-2 offset-md-2">
        <h6 style="color:#fff;font-weight:700;margin-bottom:.8rem">Plateforme</h6>
        <div class="d-flex flex-column gap-2">
          <a href="#">Signaler</a>
          <a href="#">Mes signalements</a>
          <a href="#">Carte en direct</a>
        </div>
      </div>
      <div class="col-6 col-md-2">
        <h6 style="color:#fff;font-weight:700;margin-bottom:.8rem">Société</h6>
        <div class="d-flex flex-column gap-2">
          <a href="#">À propos</a>
          <a href="#">Contact</a>
          <a href="#">Confidentialité</a>
        </div>
      </div>
    </div>
    <hr class="footer-divider"/>
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
      <span>© 2025 CityFix. Tous droits réservés.</span>
      <div class="d-flex gap-3">
        <a href="#"><i class="bi bi-twitter-x"></i></a>
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  /* ── Scroll reveal ── */
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
  }, { threshold: 0.12 });
  reveals.forEach(el => observer.observe(el));

  /* ── Count-up animation ── */
  function animateCount(el) {
    const target = +el.dataset.target;
    const duration = 1600;
    const step = target / (duration / 16);
    let current = 0;
    const timer = setInterval(() => {
      current = Math.min(current + step, target);
      el.textContent = Math.floor(current).toLocaleString('fr-FR');
      if (current >= target) clearInterval(timer);
    }, 16);
  }
  const countEls = document.querySelectorAll('.count-up');
  const countObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { animateCount(e.target); countObs.unobserve(e.target); }
    });
  }, { threshold: 0.4 });
  countEls.forEach(el => countObs.observe(el));

  /* ── Navbar shadow on scroll ── */
  const navbar = document.querySelector('.navbar-cityfix');
  window.addEventListener('scroll', () => {
    navbar.style.boxShadow = window.scrollY > 10
      ? '0 4px 24px rgba(26,111,212,.40)' : '0 4px 20px rgba(26,111,212,.30)';
  });

  /* ── Cat card ripple ── */
  document.querySelectorAll('.cat-card').forEach(card => {
    card.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      ripple.style.cssText = `
        position:absolute; border-radius:50%;
        background:rgba(26,111,212,.15);
        width:${size}px; height:${size}px;
        left:${e.clientX - rect.left - size/2}px;
        top:${e.clientY - rect.top - size/2}px;
        animation:rippleAnim .6s ease-out forwards;
        pointer-events:none;
      `;
      this.appendChild(ripple);
      setTimeout(() => ripple.remove(), 600);
    });
  });
</script>
<style>
@keyframes rippleAnim {
  from { transform: scale(0); opacity: 1; }
  to   { transform: scale(2.5); opacity: 0; }
}
</style>
</body>
</html>