<!DOCTYPE html>
<html lang="fr" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart-City — Mon Espace Citoyen</title>

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet" />

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        :root {
            --blue: #1a6fd4;
            --blue-dark: #1254a8;
            --blue-mid: #2d80e8;
            --blue-light: #e8f1fc;
            --blue-xlight: #f0f6ff;
            --sidebar-bg: #0f1e38;
            --sidebar-w: 260px;
            --sidebar-w-c: 72px;
            --topbar-h: 64px;
            --accent: #f0a500;
            --green: #16a34a;
            --green-light: #dcfce7;
            --red: #dc2626;
            --red-light: #fee2e2;
            --orange: #ea580c;
            --orange-light: #ffedd5;
            --text-dark: #0f1e38;
            --text-mid: #374151;
            --text-muted: #6b7a99;
            --border: #e5eaf3;
            --bg: #f4f7fc;
            --white: #ffffff;
            --card-radius: 16px;
            --shadow-sm: 0 2px 12px rgba(15, 30, 56, 0.06);
            --shadow-md: 0 6px 28px rgba(15, 30, 56, 0.1);
            --shadow-lg: 0 16px 48px rgba(15, 30, 56, 0.16);
        }

        /* Dark Mode Variables */
        [data-theme="dark"] {
            --blue: #3b8df0;
            --blue-dark: #2d7de8;
            --blue-mid: #5ba5f5;
            --blue-light: rgba(59, 141, 240, .18);
            --blue-xlight: rgba(59, 141, 240, .08);
            --sidebar-bg: #070e1c;
            --accent: #f0a500;
            --green: #22c55e;
            --green-light: rgba(34, 197, 94, .18);
            --red: #ef4444;
            --red-light: rgba(239, 68, 68, .18);
            --orange: #f97316;
            --orange-light: rgba(249, 115, 22, .18);
            --text-dark: #f0f4ff;
            --text-mid: #b8c4d8;
            --text-muted: #6b7a99;
            --border: rgba(255, 255, 255, .09);
            --bg: #0d1526;
            --white: #111c30;
            --card-bg: #131f35;
            --shadow-sm: 0 2px 12px rgba(0, 0, 0, .25);
            --shadow-md: 0 6px 28px rgba(0, 0, 0, .35);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, .5);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Plus Jakarta Sans", sans-serif;
            background: var(--bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 99px;
        }

        [data-theme="dark"] ::-webkit-scrollbar-thumb {
            background: #2a3a5a;
        }

        .admin-wrap {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 200;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: var(--sidebar-w-c);
        }

        .sidebar.collapsed .nav-label,
        .sidebar.collapsed .sidebar-section-title,
        .sidebar.collapsed .brand-name,
        .sidebar.collapsed .user-info {
            opacity: 0;
            pointer-events: none;
            width: 0;
            overflow: hidden;
            white-space: nowrap;
        }

        .sidebar-brand {
            height: var(--topbar-h);
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0 1.1rem;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
            flex-shrink: 0;
        }

        .brand-logo {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            background: var(--blue);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.1rem;
            box-shadow: 0 4px 14px rgba(26, 111, 212, .5);
        }

        .brand-name {
            font-size: 1.15rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.2px;
            transition: all .3s;
        }

        .brand-name span {
            color: var(--blue-mid);
        }

        .sidebar-nav {
            flex: 1;
            padding: 1rem 0;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-section-title {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .3);
            padding: 1.2rem 1.2rem 0.4rem;
            transition: all .3s;
            white-space: nowrap;
        }

        .nav-item-cf {
            list-style: none;
            margin: 2px 10px;
        }

        .nav-link-cf {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .7rem .85rem;
            border-radius: 10px;
            color: rgba(255, 255, 255, .6);
            text-decoration: none;
            font-size: .875rem;
            font-weight: 500;
            transition: all .2s;
            white-space: nowrap;
            position: relative;
        }

        .nav-link-cf .nav-icon {
            font-size: 1.05rem;
            flex-shrink: 0;
            width: 22px;
            text-align: center;
        }

        .nav-link-cf .nav-badge {
            margin-left: auto;
            background: var(--blue);
            color: #fff;
            font-size: .65rem;
            font-weight: 700;
            border-radius: 99px;
            padding: .15rem .5rem;
            flex-shrink: 0;
        }

        .nav-link-cf:hover {
            background: rgba(255, 255, 255, .07);
            color: #fff;
        }

        .nav-link-cf.active {
            background: linear-gradient(135deg, rgba(26, 111, 212, .35), rgba(45, 128, 232, .2));
            color: #fff;
            box-shadow: inset 3px 0 0 var(--blue);
        }

        .nav-link-cf.active .nav-icon {
            color: var(--blue-mid);
        }

        .sidebar-user {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, .06);
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-shrink: 0;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--blue), var(--blue-mid));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: .9rem;
            border: 2px solid rgba(255, 255, 255, .15);
        }

        .user-info {
            overflow: hidden;
            flex: 1;
        }

        .user-name {
            font-size: .82rem;
            font-weight: 700;
            color: #fff;
            white-space: nowrap;
        }

        .user-role {
            font-size: .72rem;
            color: rgba(255, 255, 255, .4);
            white-space: nowrap;
        }

        /* Mobile overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .55);
            z-index: 199;
            backdrop-filter: blur(2px);
            transition: opacity .3s;
        }

        .sidebar-overlay.visible {
            display: block;
        }

        /* Main Area */
        .main-area {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left .3s cubic-bezier(0.4, 0, 0.2, 1);
            min-width: 0;
        }

        .main-area.expanded {
            margin-left: var(--sidebar-w-c);
        }

        /* Topbar */
        .topbar {
            height: var(--topbar-h);
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        [data-theme="dark"] .topbar {
            background: var(--card-bg);
            border-color: var(--border);
        }

        .btn-sidebar-toggle {
            width: 36px;
            height: 36px;
            background: var(--blue-xlight);
            border: none;
            border-radius: 9px;
            color: var(--blue);
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all .2s;
            flex-shrink: 0;
        }

        .btn-sidebar-toggle:hover {
            background: var(--blue);
            color: #fff;
        }

        .topbar-breadcrumb {
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .82rem;
            color: var(--text-muted);
        }

        .topbar-breadcrumb .current {
            color: var(--text-dark);
            font-weight: 700;
        }

        .topbar-search {
            flex: 1;
            max-width: 360px;
            margin-left: auto;
            position: relative;
        }

        .topbar-search input {
            width: 100%;
            background: var(--bg);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .45rem 1rem .45rem 2.4rem;
            font-size: .85rem;
            font-family: inherit;
            color: var(--text-dark);
            transition: border-color .2s;
            outline: none;
        }

        .topbar-search input:focus {
            border-color: var(--blue);
            background: #fff;
        }

        .topbar-search .search-icon {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: .9rem;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: none;
            background: var(--bg);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: all .2s;
            position: relative;
        }

        .icon-btn:hover {
            background: var(--blue-light);
            color: var(--blue);
        }

        .icon-btn .badge-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 8px;
            height: 8px;
            background: var(--red);
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .topbar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--blue-dark), var(--blue-mid));
            color: #fff;
            font-weight: 700;
            font-size: .88rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 2px solid var(--border);
            transition: all .2s;
        }

        .topbar-avatar:hover {
            border-color: var(--blue);
        }

        /* Page Content */
        .page-content {
            padding: 1.75rem;
            flex: 1;
        }

        /* Cards */
        .cf-card {
            background: #fff;
            border-radius: var(--card-radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        [data-theme="dark"] .cf-card {
            background: var(--card-bg);
            border-color: var(--border);
            color: var(--text-dark);
        }

        .cf-card-header {
            padding: 1.1rem 1.4rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .cf-card-header h5 {
            font-size: .95rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
            flex: 1;
        }

        [data-theme="dark"] .cf-card-header h5 {
            color: var(--text-dark);
        }

        .cf-card-body {
            padding: 1.4rem;
        }

        .card-icon-header {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: var(--blue-light);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
        }

        /* Stat Cards */
        .stat-card {
            background: #fff;
            border-radius: var(--card-radius);
            padding: 1.4rem 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            transition: all .3s cubic-bezier(.4, 0, .2, 1);
            position: relative;
            overflow: hidden;
        }

        [data-theme="dark"] .stat-card {
            background: var(--card-bg);
            border-color: var(--border);
            color: var(--text-dark);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            border-radius: 0 var(--card-radius) 0 80px;
            opacity: .06;
        }

        .stat-card.blue::after {
            background: var(--blue);
        }

        .stat-card.green::after {
            background: var(--green);
        }

        .stat-card.orange::after {
            background: var(--orange);
        }

        .stat-card.red::after {
            background: var(--red);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .stat-icon.blue {
            background: var(--blue-light);
            color: var(--blue);
        }

        .stat-icon.green {
            background: var(--green-light);
            color: var(--green);
        }

        .stat-icon.orange {
            background: var(--orange-light);
            color: var(--orange);
        }

        .stat-icon.red {
            background: var(--red-light);
            color: var(--red);
        }

        .stat-val {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -1px;
            color: var(--text-dark);
            line-height: 1;
        }

        [data-theme="dark"] .stat-val {
            color: var(--text-dark);
        }

        .stat-lbl {
            font-size: .8rem;
            color: var(--text-muted);
            margin-top: .3rem;
            font-weight: 500;
        }

        .stat-trend {
            display: inline-flex;
            align-items: center;
            gap: .25rem;
            font-size: .75rem;
            font-weight: 700;
            border-radius: 99px;
            padding: .2rem .55rem;
            margin-top: .6rem;
        }

        .stat-trend.up {
            background: var(--green-light);
            color: var(--green);
        }

        .stat-trend.flat {
            background: var(--orange-light);
            color: var(--orange);
        }

        /* Buttons */
        .btn-report {
            background: linear-gradient(135deg, var(--blue), var(--blue-mid));
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: .7rem 1.4rem;
            font-size: .9rem;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            transition: all .25s;
            box-shadow: 0 4px 18px rgba(26, 111, 212, .35);
        }

        .btn-report:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(26, 111, 212, .45);
        }

        .btn-add {
            background: var(--blue);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: .38rem .9rem;
            font-size: .8rem;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            transition: all .2s;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            border-radius: 99px;
            padding: .25rem .7rem;
            font-size: .73rem;
            font-weight: 700;
        }

        .status-badge .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-badge.new {
            background: #e0f2fe;
            color: #0369a1;
        }

        .status-badge.new .dot {
            background: #0369a1;
        }

        .status-badge.progress {
            background: var(--orange-light);
            color: var(--orange);
        }

        .status-badge.progress .dot {
            background: var(--orange);
        }

        .status-badge.resolved {
            background: var(--green-light);
            color: var(--green);
        }

        .status-badge.resolved .dot {
            background: var(--green);
        }

        .status-badge.rejected {
            background: var(--red-light);
            color: var(--red);
        }

        .status-badge.rejected .dot {
            background: var(--red);
        }

        .prio {
            font-size: .72rem;
            font-weight: 700;
        }

        .prio.high {
            color: var(--red);
        }

        .prio.medium {
            color: var(--orange);
        }

        .prio.low {
            color: var(--green);
        }

        .cat-pill {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            background: var(--blue-light);
            color: var(--blue);
            border-radius: 99px;
            padding: .2rem .65rem;
            font-size: .72rem;
            font-weight: 600;
        }

        .incident-id {
            font-family: "JetBrains Mono", monospace;
            font-size: .78rem;
            color: var(--blue);
            font-weight: 500;
        }

        /* Incident Cards */
        .incident-card {
            background: #fff;
            border-radius: var(--card-radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            padding: 1.1rem 1.25rem;
            transition: all .25s cubic-bezier(.4, 0, .2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        [data-theme="dark"] .incident-card {
            background: var(--card-bg);
            border-color: var(--border);
        }

        .incident-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            border-radius: 4px 0 0 4px;
        }

        .incident-card.high::before {
            background: var(--red);
        }

        .incident-card.medium::before {
            background: var(--orange);
        }

        .incident-card.low::before {
            background: var(--green);
        }

        .incident-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            border-color: var(--blue-light);
        }

        .incident-card-img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: .8rem;
            background: linear-gradient(135deg, var(--blue-light), #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
        }

        .incident-card-title {
            font-size: .9rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: .2rem;
        }

        [data-theme="dark"] .incident-card-title {
            color: var(--text-dark);
        }

        .incident-card-loc {
            font-size: .75rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: .25rem;
        }

        .incident-card-meta {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: wrap;
            margin-top: .6rem;
        }

        .incident-card-time {
            font-size: .72rem;
            color: var(--text-muted);
            margin-left: auto;
        }

        /* Leaflet Map Container */
        .leaflet-map {
            border-radius: 12px;
            overflow: hidden;
            z-index: 1;
        }

        [data-theme="dark"] .leaflet-map {
            filter: brightness(0.9) contrast(1.1);
        }

        /* Map Placeholder (fallback) */
        .map-placeholder {
            background: linear-gradient(135deg, #e8f4fd, #d1e8f5);
            border-radius: 12px;
            height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .map-pin {
            position: absolute;
            font-size: 1.6rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, .2));
            animation: mapFloat 3s ease-in-out infinite;
        }

        @keyframes mapFloat {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-8px)
            }
        }

        .map-overlay-label {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(6px);
            border-radius: 8px;
            padding: .45rem .9rem;
            font-size: .75rem;
            font-weight: 700;
            color: var(--blue);
            border: 1px solid var(--border);
            z-index: 10;
        }

        .map-legend {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(6px);
            border-radius: 10px;
            padding: .6rem .9rem;
            border: 1px solid var(--border);
            z-index: 10;
        }

        .map-legend-item {
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .72rem;
            font-weight: 600;
            color: var(--text-mid);
        }

        .map-legend-item+.map-legend-item {
            margin-top: .3rem;
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* Filter Bar */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: .6rem;
            flex-wrap: wrap;
            padding: 1rem 1.4rem;
            border-bottom: 1px solid var(--border);
            background: #fafcff;
        }

        [data-theme="dark"] .filter-bar {
            background: var(--card-bg);
        }

        .filter-select {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: .35rem .7rem;
            font-size: .8rem;
            font-family: inherit;
            color: var(--text-mid);
            outline: none;
            cursor: pointer;
            transition: border-color .2s;
        }

        [data-theme="dark"] .filter-select {
            background: var(--white);
            color: var(--text-dark);
        }

        .filter-select:focus {
            border-color: var(--blue);
        }

        .filter-search-wrap {
            position: relative;
            flex: 1;
            min-width: 180px;
        }

        .filter-search-wrap .bi {
            position: absolute;
            left: .6rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: .85rem;
        }

        .filter-search {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: .35rem .7rem .35rem 2rem;
            font-size: .8rem;
            font-family: inherit;
            color: var(--text-mid);
            outline: none;
            transition: border-color .2s;
            width: 100%;
        }

        [data-theme="dark"] .filter-search {
            background: var(--white);
            color: var(--text-dark);
        }

        .filter-search:focus {
            border-color: var(--blue);
        }

        /* Table */
        .cf-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cf-table thead th {
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .8px;
            text-transform: uppercase;
            color: var(--text-muted);
            background: var(--bg);
            padding: .7rem 1rem;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        [data-theme="dark"] .cf-table thead th {
            background: var(--card-bg);
            color: var(--text-muted);
        }

        .cf-table tbody td {
            padding: .9rem 1rem;
            border-bottom: 1px solid var(--border);
            font-size: .85rem;
            color: var(--text-mid);
            vertical-align: middle;
        }

        [data-theme="dark"] .cf-table tbody td {
            color: var(--text-mid);
        }

        .cf-table tbody tr {
            transition: background .15s;
        }

        .cf-table tbody tr:hover {
            background: var(--blue-xlight);
        }

        [data-theme="dark"] .cf-table tbody tr:hover {
            background: rgba(59, 141, 240, .08);
        }

        .cf-table tbody tr:last-child td {
            border-bottom: none;
        }

        .tbl-btn {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
            cursor: pointer;
            transition: all .2s;
        }

        .tbl-btn.view {
            background: var(--blue-light);
            color: var(--blue);
        }

        .tbl-btn.del {
            background: var(--red-light);
            color: var(--red);
        }

        .tbl-btn:hover {
            filter: brightness(.9);
            transform: scale(1.08);
        }

        /* Pagination */
        .cf-pagination {
            display: flex;
            align-items: center;
            gap: .3rem;
            padding: 1rem 1.4rem;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .cf-page-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1.5px solid var(--border);
            background: #fff;
            color: var(--text-mid);
            font-size: .8rem;
            font-weight: 600;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all .2s;
        }

        [data-theme="dark"] .cf-page-btn {
            background: var(--white);
            color: var(--text-mid);
        }

        .cf-page-btn:hover {
            border-color: var(--blue);
            color: var(--blue);
        }

        .cf-page-btn.active {
            background: var(--blue);
            border-color: var(--blue);
            color: #fff;
        }

        .cf-page-info {
            font-size: .78rem;
            color: var(--text-muted);
            margin-left: auto;
        }

        /* Activity */
        .activity-item {
            display: flex;
            gap: .85rem;
            padding: .85rem 0;
            border-bottom: 1px solid var(--border);
        }

        .activity-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .activity-dot {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
        }

        .activity-dot.new {
            background: #e0f2fe;
            color: #0369a1;
        }

        .activity-dot.resolved {
            background: var(--green-light);
            color: var(--green);
        }

        .activity-dot.comment {
            background: #f3e8ff;
            color: #7c3aed;
        }

        .activity-dot.assign {
            background: var(--orange-light);
            color: var(--orange);
        }

        .activity-content {
            flex: 1;
            min-width: 0;
        }

        .activity-text {
            font-size: .83rem;
            color: var(--text-mid);
            line-height: 1.5;
        }

        [data-theme="dark"] .activity-text {
            color: var(--text-mid);
        }

        .activity-text strong {
            color: var(--text-dark);
            font-weight: 700;
        }

        .activity-time {
            font-size: .72rem;
            color: var(--text-muted);
            margin-top: .15rem;
        }

        /* Progress */
        .cf-progress {
            height: 6px;
            background: var(--border);
            border-radius: 99px;
            overflow: hidden;
        }

        .cf-progress-bar {
            height: 100%;
            border-radius: 99px;
            transition: width 1.2s cubic-bezier(.4, 0, .2, 1);
        }

        /* Hero Banner */
        .hero-banner {
            background: linear-gradient(135deg, var(--sidebar-bg) 0%, #1a3a6e 100%);
            border-radius: var(--card-radius);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.75rem;
        }

        .hero-banner::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 240px;
            height: 240px;
            background: radial-gradient(circle, rgba(26, 111, 212, .3) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-banner::after {
            content: "";
            position: absolute;
            bottom: -60px;
            left: 30%;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(45, 128, 232, .2) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: .3rem;
            position: relative;
            z-index: 1;
        }

        .hero-sub {
            font-size: .88rem;
            color: rgba(255, 255, 255, .6);
            margin-bottom: 1.4rem;
            position: relative;
            z-index: 1;
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            position: relative;
            z-index: 1;
            flex-wrap: wrap;
        }

        .hero-stat-val {
            font-size: 1.6rem;
            font-weight: 800;
            color: #fff;
            line-height: 1;
        }

        .hero-stat-lbl {
            font-size: .72rem;
            color: rgba(255, 255, 255, .5);
            margin-top: .15rem;
        }

        .hero-illus {
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 6rem;
            opacity: .12;
            z-index: 0;
            pointer-events: none;
        }

        /* Modals */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: var(--shadow-lg);
            background: #fff;
        }

        [data-theme="dark"] .modal-content {
            background: var(--card-bg);
            color: var(--text-dark);
        }

        .modal-header {
            border-bottom: 1px solid var(--border);
            padding: 1.25rem;
        }

        .modal-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        [data-theme="dark"] .modal-title {
            color: var(--text-dark);
        }

        .modal-body {
            padding: 1.25rem;
            font-size: .88rem;
            color: var(--text-mid);
        }

        [data-theme="dark"] .modal-body {
            color: var(--text-mid);
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 1rem 1.25rem;
        }

        /* Upload Zone */
        .upload-zone {
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 2rem 1rem;
            text-align: center;
            cursor: pointer;
            transition: all .2s;
            background: var(--bg);
        }

        .upload-zone:hover {
            border-color: var(--blue);
            background: var(--blue-xlight);
        }

        .upload-zone i {
            font-size: 2rem;
            color: var(--text-muted);
            margin-bottom: .5rem;
            display: block;
        }

        .upload-zone p {
            font-size: .8rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* Notifications */
        .notif-item {
            display: flex;
            gap: .85rem;
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            transition: background .15s;
            cursor: pointer;
        }

        .notif-item:hover {
            background: var(--blue-xlight);
        }

        [data-theme="dark"] .notif-item:hover {
            background: rgba(59, 141, 240, .08);
        }

        .notif-item:last-child {
            border-bottom: none;
        }

        .notif-item.unread {
            background: #fafcff;
            border-left: 3px solid var(--blue);
        }

        [data-theme="dark"] .notif-item.unread {
            background: rgba(59, 141, 240, .08);
            border-left-color: var(--blue-mid);
        }

        .notif-dot {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .notif-text {
            font-size: .83rem;
            color: var(--text-mid);
            line-height: 1.5;
            margin-bottom: .15rem;
        }

        [data-theme="dark"] .notif-text {
            color: var(--text-mid);
        }

        .notif-text strong {
            color: var(--text-dark);
            font-weight: 700;
        }

        .notif-time {
            font-size: .72rem;
            color: var(--text-muted);
        }

        .unread-dot {
            width: 8px;
            height: 8px;
            background: var(--blue);
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: .25rem;
        }

        /* Profile */
        .profile-avatar-lg {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--blue), var(--blue-mid));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 800;
            border: 4px solid #fff;
            box-shadow: var(--shadow-md);
        }

        .profile-stat {
            text-align: center;
        }

        .profile-stat-val {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .profile-stat-lbl {
            font-size: .72rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Form Elements */
        .form-label {
            font-size: .82rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: .35rem;
            display: block;
        }

        [data-theme="dark"] .form-label {
            color: var(--text-dark);
        }

        .form-control,
        .form-select {
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .5rem .85rem;
            font-size: .85rem;
            font-family: inherit;
            transition: border-color .2s;
            outline: none;
        }

        [data-theme="dark"] .form-control,
        [data-theme="dark"] .form-select {
            background: var(--white);
            border-color: var(--border);
            color: var(--text-dark);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(26, 111, 212, .08);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 90px;
        }

        /* Step Wizard */
        .step-indicator {
            display: flex;
            align-items: center;
            gap: 0;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .step-dot {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .78rem;
            font-weight: 700;
            border: 2px solid var(--border);
            background: #fff;
            color: var(--text-muted);
            flex-shrink: 0;
            transition: all .3s;
            position: relative;
            z-index: 1;
        }

        [data-theme="dark"] .step-dot {
            background: var(--white);
            color: var(--text-muted);
        }

        .step-dot.active {
            background: var(--blue);
            border-color: var(--blue);
            color: #fff;
        }

        .step-dot.done {
            background: var(--green);
            border-color: var(--green);
            color: #fff;
        }

        .step-line {
            flex: 1;
            height: 2px;
            background: var(--border);
            min-width: 40px;
        }

        .step-line.done {
            background: var(--green);
        }

        .step-lbl {
            font-size: .65rem;
            color: var(--text-muted);
            text-align: center;
            margin-top: .2rem;
            font-weight: 600;
            white-space: nowrap;
        }

        /* Sections */
        .page-section {
            display: none;
            width: 100%;
            animation: fadeIn .3s ease;
        }

        .page-section.active {
            display: block;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .anim-1 {
            animation: fadeInUp .5s .05s ease both;
        }

        .anim-2 {
            animation: fadeInUp .5s .12s ease both;
        }

        .anim-3 {
            animation: fadeInUp .5s .19s ease both;
        }

        .anim-4 {
            animation: fadeInUp .5s .26s ease both;
        }

        .anim-5 {
            animation: fadeInUp .5s .33s ease both;
        }

        /* Language Dropdown */
        .lang-dropdown {
            position: relative;
            display: inline-block;
        }

        .lang-dropdown-btn {
            background: var(--bg);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: .35rem .7rem;
            font-size: .8rem;
            font-weight: 600;
            color: var(--text-mid);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: .4rem;
            transition: all .2s;
        }

        [data-theme="dark"] .lang-dropdown-btn {
            background: var(--card-bg);
            color: var(--text-mid);
        }

        .lang-dropdown-btn:hover {
            border-color: var(--blue);
            color: var(--blue);
        }

        .lang-dropdown-menu {
            position: absolute;
            right: 0;
            top: calc(100% + 4px);
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: var(--shadow-md);
            min-width: 140px;
            z-index: 1000;
            display: none;
        }

        [data-theme="dark"] .lang-dropdown-menu {
            background: var(--card-bg);
            border-color: var(--border);
        }

        .lang-dropdown-menu.open {
            display: block;
        }

        .lang-dropdown-item {
            padding: .5rem .8rem;
            font-size: .8rem;
            color: var(--text-mid);
            cursor: pointer;
            transition: all .15s;
            display: flex;
            align-items: center;
            gap: .4rem;
        }

        [data-theme="dark"] .lang-dropdown-item {
            color: var(--text-mid);
        }

        .lang-dropdown-item:hover {
            background: var(--blue-xlight);
            color: var(--blue);
        }

        [data-theme="dark"] .lang-dropdown-item:hover {
            background: rgba(59, 141, 240, .1);
        }

        /* Profile Map */
        .profile-map-container {
            height: 200px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            margin-top: 1rem;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
                box-shadow: var(--shadow-lg);
            }

            .main-area {
                margin-left: 0 !important;
            }

            .topbar-search {
                display: none;
            }

            .hero-stats {
                gap: 1rem;
            }

            .hero-illus {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .page-content {
                padding: 1rem;
            }

            .hero-banner {
                padding: 1.5rem;
            }

            .hero-title {
                font-size: 1.3rem;
            }

            .stat-card {
                padding: 1rem;
            }

            .stat-val {
                font-size: 1.5rem;
            }

            .cf-card-body {
                padding: 1rem;
            }

            .filter-bar {
                flex-direction: column;
                align-items: stretch;
                gap: .5rem;
            }

            .filter-search-wrap {
                min-width: 100%;
            }

            .cf-table {
                display: block;
                overflow-x: auto;
            }

            .cf-pagination {
                justify-content: center;
            }

            .cf-page-info {
                margin-left: 0;
                margin-top: .5rem;
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 575px) {
            .topbar {
                padding: 0 1rem;
            }

            .topbar-actions {
                gap: .25rem;
            }

            .icon-btn,
            .topbar-avatar {
                width: 32px;
                height: 32px;
            }

            .topbar-avatar {
                font-size: .75rem;
            }

            .btn-sidebar-toggle {
                width: 32px;
                height: 32px;
            }

            .hero-banner {
                padding: 1rem;
            }

            .hero-stat-val {
                font-size: 1.2rem;
            }

            .stat-val {
                font-size: 1.3rem;
            }

            .incident-card {
                padding: .8rem;
            }

            .incident-card-img {
                height: 100px;
            }
        }

        /* Leaflet popup custom */
        .leaflet-popup-content-wrapper {
            border-radius: 12px !important;
            box-shadow: var(--shadow-md) !important;
            padding: 0 !important;
            overflow: hidden;
        }

        .leaflet-popup-content {
            margin: 0 !important;
        }

        .cf-popup {
            padding: 10px 14px;
            font-family: "Plus Jakarta Sans", sans-serif;
            min-width: 180px;
        }

        [data-theme="dark"] .cf-popup {
            background: var(--card-bg);
            color: var(--text-dark);
        }

        .cf-popup-title {
            font-size: .85rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        [data-theme="dark"] .cf-popup-title {
            color: var(--text-dark);
        }

        .cf-popup-loc {
            font-size: .72rem;
            color: var(--text-muted);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .leaflet-popup-tip {
            background: white !important;
        }

        .leaflet-popup-close-button {
            top: 6px !important;
            right: 8px !important;
            color: var(--text-muted) !important;
            font-size: 1.2rem !important;
        }
    </style>
</head>

<body>
    <div class="admin-wrap">

        <!-- Mobile Overlay -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <div class="brand-logo"><i class="bi bi-geo-alt-fill"></i></div>
                <span class="brand-name">Smart<span>City</span></span>
            </div>

            <nav class="sidebar-nav">
                <ul style="list-style:none;padding:0;margin:0">
                    <li class="sidebar-section-title">Navigation</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf active" data-section="accueil">
                            <i class="bi bi-house-fill nav-icon"></i>
                            <span class="nav-label">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="signaler">
                            <i class="bi bi-plus-circle-fill nav-icon"></i>
                            <span class="nav-label">Signaler un problème</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="carte">
                            <i class="bi bi-map-fill nav-icon"></i>
                            <span class="nav-label">Carte des incidents</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Mon espace</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="mes-signalements">
                            <i class="bi bi-flag-fill nav-icon"></i>
                            <span class="nav-label">Mes signalements</span>
                            <span class="nav-badge">3</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="notifications">
                            <i class="bi bi-bell-fill nav-icon"></i>
                            <span class="nav-label">Notifications</span>
                            <span class="nav-badge">5</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="profil">
                            <i class="bi bi-person-circle nav-icon"></i>
                            <span class="nav-label">Mon profil</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Aide</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="faq">
                            <i class="bi bi-question-circle-fill nav-icon"></i>
                            <span class="nav-label">FAQ & Aide</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-user">
                <div class="user-avatar">JM</div>
                <div class="user-info">
                    <div class="user-name">Jean Mbarga</div>
                    <div class="user-role">Citoyen · Akwa, Douala</div>
                </div>
                <a href="#" title="Déconnexion"
                    style="color:rgba(255,255,255,.3);font-size:1rem;text-decoration:none;transition:color .2s"
                    onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,.3)'">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
        </aside>

        <!-- Main Area -->
        <div class="main-area" id="mainArea">

            <!-- Topbar -->
            <header class="topbar">
                <button class="btn-sidebar-toggle" id="sidebarToggle"><i
                        class="bi bi-layout-sidebar-inset"></i></button>
                <div class="topbar-breadcrumb">
                    <i class="bi bi-house-fill" style="font-size:.75rem"></i>
                    <span>/</span>
                    <span class="current" id="currentPageTitle">Accueil</span>
                </div>
                <div class="topbar-search">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" placeholder="Rechercher un incident, une rue…" />
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn" title="Notifications" onclick="goTo('notifications')">
                        <i class="bi bi-bell-fill"></i>
                        <span class="badge-dot"></span>
                    </button>
                    <div class="topbar-avatar" title="Mon profil" onclick="goTo('profil')">JM</div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">

                <!--ACCUEIL-->
                <div id="accueilSection" class="page-section active">
                    <div class="hero-banner anim-1">
                        <div class="hero-illus">🏙️</div>
                        <div class="hero-title">Bonjour, Jean 👋</div>
                        <div class="hero-sub">Signalez un problème dans votre quartier et contribuez à améliorer votre
                            ville.</div>
                        <div class="hero-stats">
                            <div>
                                <div class="hero-stat-val">12</div>
                                <div class="hero-stat-lbl">Mes signalements</div>
                            </div>
                            <div>
                                <div class="hero-stat-val">8</div>
                                <div class="hero-stat-lbl">Résolus</div>
                            </div>
                            <div>
                                <div class="hero-stat-val">1 284</div>
                                <div class="hero-stat-lbl">Incidents dans la ville</div>
                            </div>
                            <button class="btn-report ms-auto" onclick="goTo('signaler')"><i
                                    class="bi bi-plus-circle-fill"></i> Signaler un problème</button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-xl-3 anim-2">
                            <div class="stat-card blue">
                                <div class="stat-icon blue"><i class="bi bi-flag-fill"></i></div>
                                <div class="stat-val">12</div>
                                <div class="stat-lbl">Mes signalements</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +2 ce mois</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-2">
                            <div class="stat-card green">
                                <div class="stat-icon green"><i class="bi bi-check-circle-fill"></i></div>
                                <div class="stat-val">8</div>
                                <div class="stat-lbl">Problèmes résolus</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +1 cette
                                    semaine</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-3">
                            <div class="stat-card orange">
                                <div class="stat-icon orange"><i class="bi bi-hourglass-split"></i></div>
                                <div class="stat-val">3</div>
                                <div class="stat-lbl">En attente</div>
                                <span class="stat-trend flat"><i class="bi bi-dash"></i> Stable</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-4">
                            <div class="stat-card red">
                                <div class="stat-icon red"><i class="bi bi-star-fill"></i></div>
                                <div class="stat-val">47</div>
                                <div class="stat-lbl">Points citoyen</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +5 pts</span>
                            </div>
                        </div>
                    </div>

                    <!--Feed + Sidebarright -->
                    <div class="row g-3 anim-5">
                        <div class="col-lg-8">
                            <div class="cf-card mb-3">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-geo-alt-fill"></i></div>
                                    <h5>Incidents près de chez moi</h5>
                                    <select class="filter-select ms-auto"
                                        style="font-size:.75rem;padding:.25rem .6rem">
                                        <option>500 m</option>
                                        <option>1 km</option>
                                        <option>2 km</option>
                                    </select>
                                </div>
                                <div style="padding:1rem">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="incident-card high" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">🕳️</div>
                                                <div class="incident-card-title">Nid-de-poule profond</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Rue Joss, Akwa — 120 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge new"><span
                                                            class="dot"></span>Nouveau</span>
                                                    <span class="cat-pill">🕳️ Voirie</span>
                                                    <span class="incident-card-time">Il y a 4 min</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="incident-card medium" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">💡</div>
                                                <div class="incident-card-title">Lampadaire éteint</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Bd de la Liberté — 340 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span>
                                                    <span class="cat-pill">💡 Éclairage</span>
                                                    <span class="incident-card-time">Il y a 2h</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="incident-card high" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">💧</div>
                                                <div class="incident-card-title">Fuite d'eau importante</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Carrefour Ndokotti — 480 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span>
                                                    <span class="cat-pill">💧 Eau</span>
                                                    <span class="incident-card-time">Il y a 5h</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="incident-card low" onclick="goTo('mes-signalements')">
                                                <div class="incident-card-img">🗑️</div>
                                                <div class="incident-card-title">Dépôt sauvage d'ordures</div>
                                                <div class="incident-card-loc"><i class="bi bi-geo-alt"
                                                        style="font-size:.7rem"></i> Quartier New Bell — 490 m</div>
                                                <div class="incident-card-meta">
                                                    <span class="status-badge resolved"><span
                                                            class="dot"></span>Résolu</span>
                                                    <span class="cat-pill">🗑️ Ordures</span>
                                                    <span class="incident-card-time">Hier</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex flex-column gap-3">
                            <!--Mini mapLeaflet -->
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                                    <h5>Carte de mon quartier</h5>
                                    <a href="#" onclick="goTo('carte')"
                                        style="font-size:.78rem;color:var(--blue);font-weight:600;text-decoration:none;margin-left:auto">Agrandir</a>
                                </div>
                                <div class="cf-card-body" style="padding-bottom:1rem">
                                    <div id="miniMap" class="leaflet-map" style="height:200px; width:100%;"></div>
                                </div>
                            </div>

                            <div class="cf-card flex-grow-1">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-activity"></i></div>
                                    <h5>Mes activités récentes</h5>
                                </div>
                                <div class="cf-card-body" style="padding-top:.5rem;padding-bottom:.5rem">
                                    <div class="activity-item">
                                        <div class="activity-dot new"><i class="bi bi-flag-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Vous avez signalé un
                                                <strong>nid-de-poule</strong> Rue Joss
                                            </div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 4 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot comment"><i class="bi bi-chat-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Un agent a commenté <strong>#CF-1279</strong>
                                            </div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 1h</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot resolved"><i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">Votre signalement <strong>#CF-1268</strong> a
                                                été
                                                résolu</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Hier, 14h32</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot assign"><i class="bi bi-person-check-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text"><strong>#CF-1275</strong> assigné à Agent Kouam
                                            </div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 2 jours</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--SIGNALER-->
                <div id="signalerSection" class="page-section">
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
                                                    <div
                                                        style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Éclairage</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">🗑️</div>
                                                    <div
                                                        style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Ordures</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">💧</div>
                                                    <div
                                                        style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Fuite d'eau</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">🌲</div>
                                                    <div
                                                        style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
                                                        Espaces verts</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4" onclick="selectCat(this)">
                                                <div class="cat-select-card"
                                                    style="border:2px solid var(--border);border-radius:12px;padding:.8rem;text-align:center;cursor:pointer;background:#fff;transition:all .2s">
                                                    <div style="font-size:1.5rem;margin-bottom:.3rem">⚡</div>
                                                    <div
                                                        style="font-size:.78rem;font-weight:700;color:var(--text-mid)">
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
                                        <div class="upload-zone"
                                            onclick="showToast('info','Fonctionnalité à venir !')">
                                            <i class="bi bi-cloud-arrow-up"></i>
                                            <p style="font-weight:700;margin-bottom:.2rem;color:var(--text-mid)">
                                                Glissez
                                                vos photos ici</p>
                                            <p>ou <span
                                                    style="color:var(--blue);font-weight:600;cursor:pointer">parcourez
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

                <!--CARTE-->
                <div id="carteSection" class="page-section">
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
                            <div id="mainMap" class="leaflet-map"
                                style="height:440px;width:100%;border-radius:12px;">
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

                <!--MES SIGNALEMENTS-->
                <div id="mes-signalementsSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Mes signalements</h1>
                            <p>Suivez l'avancement de vos signalements en temps réel.</p>
                        </div>
                        <button class="btn-report ms-auto" onclick="goTo('signaler')"><i
                                class="bi bi-plus-circle-fill"></i> Nouveau signalement</button>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-flag-fill"></i></div>
                            <h5>Historique de mes signalements</h5>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher…" /></div>
                            <select class="filter-select">
                                <option>Tous statuts</option>
                                <option>Nouveau</option>
                                <option>En cours</option>
                                <option>Résolu</option>
                                <option>Rejeté</option>
                            </select>
                            <select class="filter-select">
                                <option>Catégorie</option>
                                <option>Nid-de-poule</option>
                                <option>Éclairage</option>
                                <option>Ordures</option>
                                <option>Fuite d'eau</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Incident</th>
                                        <th>Catégorie</th>
                                        <th>Statut</th>
                                        <th>Priorité</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="incident-id">#CF-1284</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">
                                                Nid-de-poule profond</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i
                                                    class="bi bi-geo-alt" style="font-size:.7rem"></i> Rue Joss, Akwa
                                            </div>
                                        </td>
                                        <td><span class="cat-pill">🕳️ Nid-de-poule</span></td>
                                        <td><span class="status-badge new"><span class="dot"></span>Nouveau</span>
                                        </td>
                                        <td><span class="prio high">● Haute</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1275</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">
                                                Lampadaire éteint</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i
                                                    class="bi bi-geo-alt" style="font-size:.7rem"></i> Bd de la
                                                Liberté
                                            </div>
                                        </td>
                                        <td><span class="cat-pill">💡 Éclairage</span></td>
                                        <td><span class="status-badge progress"><span class="dot"></span>En
                                                cours</span>
                                        </td>
                                        <td><span class="prio medium">● Moyenne</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 2
                                                jours</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1268</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">Fuite
                                                d'eau importante</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i
                                                    class="bi bi-geo-alt" style="font-size:.7rem"></i> Carrefour
                                                Ndokotti</div>
                                        </td>
                                        <td><span class="cat-pill">💧 Fuite d'eau</span></td>
                                        <td><span class="status-badge resolved"><span
                                                    class="dot"></span>Résolu</span>
                                        </td>
                                        <td><span class="prio high">● Haute</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Hier, 14h32</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1251</span></td>
                                        <td>
                                            <div style="font-weight:600;color:var(--text-dark);font-size:.87rem">Dépôt
                                                sauvage d'ordures</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)"><i
                                                    class="bi bi-geo-alt" style="font-size:.7rem"></i> Rue Castelnau
                                            </div>
                                        </td>
                                        <td><span class="cat-pill">🗑️ Ordures</span></td>
                                        <td><span class="status-badge resolved"><span
                                                    class="dot"></span>Résolu</span>
                                        </td>
                                        <td><span class="prio low">● Basse</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">13 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewSignalModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn del"
                                                    onclick="showToast('error','Signalement supprimé !')"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination">
                            <button class="cf-page-btn"><i class="bi bi-chevron-left"></i></button>
                            <button class="cf-page-btn active">1</button>
                            <button class="cf-page-btn">2</button>
                            <button class="cf-page-btn"><i class="bi bi-chevron-right"></i></button>
                            <span class="cf-page-info">Affichage 1–4 sur 12 signalements</span>
                        </div>
                    </div>
                </div>

                <!--NOTIFICATIONS-->
                <div id="notificationsSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Notifications</h1>
                            <p>Restez informé de l'avancement de vos signalements.</p>
                        </div>
                        <button class="btn-add ms-auto"
                            onclick="showToast('success','Toutes les notifications marquées comme lues !')"><i
                                class="bi bi-check2-all"></i> Tout marquer lu</button>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
                            <h5>Toutes les notifications</h5>
                            <span
                                style="margin-left:auto;background:var(--blue);color:#fff;font-size:.65rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">5
                                non lues</span>
                        </div>
                        <div class="notif-item unread"
                            onclick="showToast('info','Notification : Signalement résolu')">
                            <div class="notif-dot" style="background:var(--green-light);color:var(--green)"><i
                                    class="bi bi-check-circle-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1268</strong> a été
                                    <strong>résolu</strong> par l'Agent Kouam Pierre.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                                    45
                                    min</div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread"
                            onclick="showToast('info','Notification : Signalement assigné')">
                            <div class="notif-dot" style="background:var(--orange-light);color:var(--orange)"><i
                                    class="bi bi-person-check-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1275</strong> a été assigné à
                                    <strong>Agent Kouam Pierre</strong>.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                                    1h
                                </div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread"
                            onclick="showToast('info','Notification : Nouveau commentaire')">
                            <div class="notif-dot" style="background:#f3e8ff;color:#7c3aed"><i
                                    class="bi bi-chat-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Un commentaire a été ajouté sur votre signalement
                                    <strong>#CF-1279</strong>.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                                    2h
                                </div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread"
                            onclick="showToast('info','Notification : Signalement enregistré')">
                            <div class="notif-dot" style="background:#e0f2fe;color:#0369a1"><i
                                    class="bi bi-flag-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1284</strong> a bien été
                                    enregistré.</div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a 4
                                    min</div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item unread"
                            onclick="showToast('error','Notification : Signalement rejeté')">
                            <div class="notif-dot" style="background:var(--red-light);color:var(--red)"><i
                                    class="bi bi-x-circle-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1240</strong> a été
                                    <strong>rejeté</strong>. Raison : doublon.
                                </div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Hier,
                                    10h22
                                </div>
                            </div>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:var(--green-light);color:var(--green)"><i
                                    class="bi bi-check-circle-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Votre signalement <strong>#CF-1251</strong> a été résolu.</div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> 13 Avr.,
                                    09h00</div>
                            </div>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:var(--blue-light);color:var(--blue)"><i
                                    class="bi bi-star-fill"></i></div>
                            <div style="flex:1">
                                <div class="notif-text">Vous avez gagné <strong>+5 points citoyen</strong> pour votre
                                    contribution.</div>
                                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> 12 Avr.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PROFIL-->
                <div id="profilSection" class="page-section">
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
                                    <div
                                        style="font-size:.88rem;font-weight:700;color:var(--blue);margin-bottom:.4rem">
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
                                        <div class="col-md-6"><label class="form-label">Nom</label><input
                                                type="text" class="form-control" value="Mbarga" readonly
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
                                                    class="bi bi-moon-stars-fill me-2"
                                                    style="color:var(--blue)"></i>Mode sombre</div>
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
                                            <div style="font-weight:600;font-size:.88rem"><i
                                                    class="bi bi-translate me-2" style="color:var(--blue)"></i>Langue
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
                                                type="checkbox" checked
                                                style="width:2.5rem;height:1.3rem;cursor:pointer"
                                                onclick="showToast('success','Préférence mise à jour !')"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div style="font-weight:600;font-size:.88rem">Commentaires des agents</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Être notifié quand un
                                                agent commente</div>
                                        </div>
                                        <div class="form-check form-switch mb-0"><input class="form-check-input"
                                                type="checkbox" checked
                                                style="width:2.5rem;height:1.3rem;cursor:pointer"
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
                                                type="checkbox" checked
                                                style="width:2.5rem;height:1.3rem;cursor:pointer"
                                                onclick="showToast('success','Préférence mise à jour !')"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--FAQ -->
                <div id="faqSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>FAQ & Aide</h1>
                        <p>Trouvez des réponses à vos questions fréquentes.</p>
                    </div>
                    <div class="row g-3 anim-2">
                        <div class="col-lg-8">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-question-circle-fill"></i></div>
                                    <h5>Questions fréquentes</h5>
                                </div>
                                <div class="cf-card-body">
                                    <div class="accordion" id="faqAccordion">
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden;margin-bottom:.75rem">
                                            <h2 class="accordion-header"><button class="accordion-button"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faq1">Comment signaler un problème ?</button></h2>
                                            <div id="faq1" class="accordion-collapse collapse show"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Cliquez sur
                                                    <strong>"Signaler un problème"</strong> dans le menu ou le bouton en
                                                    haut de page. Remplissez le formulaire avec la catégorie, une
                                                    description claire, la localisation et une photo si possible.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden;margin-bottom:.75rem">
                                            <h2 class="accordion-header"><button class="accordion-button collapsed"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faq2">Quel
                                                    est le délai de traitement ?</button></h2>
                                            <div id="faq2" class="accordion-collapse collapse"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Le délai moyen de
                                                    traitement est de <strong>3,2 jours</strong>. Les signalements
                                                    prioritaires sont traités en moins de 24h. Vous serez notifié à
                                                    chaque étape.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden;margin-bottom:.75rem">
                                            <h2 class="accordion-header"><button class="accordion-button collapsed"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faq3">Comment sont attribués les points citoyen
                                                    ?</button></h2>
                                            <div id="faq3" class="accordion-collapse collapse"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Vous gagnez des
                                                    points à chaque signalement (<strong>+5 pts</strong>), quand votre
                                                    signalement est résolu (<strong>+10 pts</strong>) et quand il est
                                                    validé avec photo (<strong>+3 pts</strong>).</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item"
                                            style="border:1px solid var(--border);border-radius:10px;overflow:hidden">
                                            <h2 class="accordion-header"><button class="accordion-button collapsed"
                                                    style="font-size:.88rem;font-weight:700;font-family:inherit"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#faq4">Que
                                                    faire si mon signalement est rejeté ?</button></h2>
                                            <div id="faq4" class="accordion-collapse collapse"
                                                data-bs-parent="#faqAccordion">
                                                <div class="accordion-body"
                                                    style="font-size:.83rem;color:var(--text-mid)">Vous recevrez une
                                                    notification avec la raison du rejet (doublon, hors zone, etc.).
                                                    Vous pouvez resoumettre un signalement corrigé ou contacter le
                                                    support.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-headset"></i></div>
                                    <h5>Contacter le support</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="d-flex gap-3 align-items-center p-3 rounded-3"
                                        style="background:var(--bg);border:1px solid var(--border);cursor:pointer;transition:all .2s"
                                        onmouseover="this.style.borderColor='var(--blue)'"
                                        onmouseout="this.style.borderColor='var(--border)'"
                                        onclick="showToast('info','Contact par email')">
                                        <div
                                            style="width:38px;height:38px;border-radius:10px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:.85rem">Email</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">support@Smart-City.cm
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 align-items-center p-3 rounded-3"
                                        style="background:var(--bg);border:1px solid var(--border);cursor:pointer;transition:all .2s"
                                        onmouseover="this.style.borderColor='var(--green)'"
                                        onmouseout="this.style.borderColor='var(--border)'"
                                        onclick="showToast('info','Contact par téléphone')">
                                        <div
                                            style="width:38px;height:38px;border-radius:10px;background:var(--green-light);color:var(--green);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:.85rem">Téléphone</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">+237 233 XX XX XX
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 align-items-center p-3 rounded-3"
                                        style="background:var(--bg);border:1px solid var(--border);cursor:pointer;transition:all .2s"
                                        onmouseover="this.style.borderColor='var(--orange)'"
                                        onmouseout="this.style.borderColor='var(--border)'"
                                        onclick="showToast('info','Chat en direct')">
                                        <div
                                            style="width:38px;height:38px;border-radius:10px;background:var(--orange-light);color:var(--orange);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0">
                                            <i class="bi bi-chat-dots-fill"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:.85rem">Chat en direct</div>
                                            <div style="font-size:.75rem;color:var(--text-muted)">Lun–Ven, 8h–17h</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.page-content -->
        </div>
        <!-- /.main-area -->

        <!-- ─── Modals ─── -->
        <div class="modal fade" id="viewSignalModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Détails du signalement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><strong>ID :</strong> <span class="incident-id">#CF-1284</span></div>
                        <div class="mb-3"><strong>Titre :</strong> Nid-de-poule profond</div>
                        <div class="mb-3"><strong>Localisation :</strong> Rue Joss, Akwa</div>
                        <div class="mb-3"><strong>Catégorie :</strong> <span class="cat-pill">🕳️
                                Nid-de-poule</span>
                        </div>
                        <div class="mb-3"><strong>Statut :</strong> <span class="status-badge new"><span
                                    class="dot"></span>Nouveau</span></div>
                        <div class="mb-3"><strong>Priorité :</strong> <span class="prio high">● Haute</span></div>
                        <div class="mb-3"><strong>Date :</strong> Il y a 4 min</div>
                        <div class="mb-3"><strong>Description :</strong>
                            <p class="mb-0 mt-1" style="font-size:.85rem;color:var(--text-mid)">Un nid-de-poule très
                                profond et dangereux pour les usagers de la route.</p>
                        </div>
                        <div
                            style="background:var(--orange-light);border-radius:10px;padding:.75rem 1rem;font-size:.82rem;color:var(--orange);font-weight:600">
                            <i class="bi bi-hourglass-split me-1"></i>En attente d'assignation à un agent terrain.
                        </div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Fermer</button></div>
                </div>
            </div>
        </div>

    </div><!-- /.admin-wrap -->

    <!-- Toast Container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer" style="z-index:9999"></div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
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
    </script>
</body>

</html>
