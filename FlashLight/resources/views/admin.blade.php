<!DOCTYPE html>
<html lang="fr" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart-City — Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/MarkerCluster.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/MarkerCluster.Default.css"
        rel="stylesheet" />

    <style>
        /* ====== THEME VARIABLES ====== */
        :root,
        [data-theme="light"] {
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
            --card-bg: #ffffff;
            --card-radius: 16px;
            --shadow-sm: 0 2px 12px rgba(15, 30, 56, .06);
            --shadow-md: 0 6px 28px rgba(15, 30, 56, .10);
            --shadow-lg: 0 16px 48px rgba(15, 30, 56, .16);
            --input-bg: #ffffff;
            --filter-bg: #fafcff;
        }

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
            --input-bg: #1a2a45;
            --filter-bg: #0f1a2e;
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
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text-dark);
            overflow-x: hidden;
            transition: background .3s, color .3s;
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

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 300;
            transition: width .3s cubic-bezier(.4, 0, .2, 1), transform .3s cubic-bezier(.4, 0, .2, 1);
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

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-w) !important;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            z-index: 299;
        }

        .sidebar-overlay.active {
            display: block;
        }

        .sidebar-brand {
            height: var(--topbar-h);
            display: flex;
            align-items: center;
            gap: .8rem;
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
            letter-spacing: -.2px;
            transition: all .3s;
            white-space: nowrap;
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
            padding: 1.2rem 1.2rem .4rem;
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

        /* ===== MAIN AREA ===== */
        .main-area {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left .3s cubic-bezier(.4, 0, .2, 1);
            min-width: 0;
        }

        .main-area.expanded {
            margin-left: var(--sidebar-w-c);
        }

        @media (max-width: 991px) {
            .main-area {
                margin-left: 0 !important;
            }
        }

        /* ===== TOPBAR ===== */
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
            transition: background .3s, border-color .3s;
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
            transition: border-color .2s, background .3s;
            outline: none;
        }

        .topbar-search input:focus {
            border-color: var(--blue);
            background: var(--white);
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
            border: 2px solid var(--white);
        }

        .topbar-avatar-wrap {
            position: relative;
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

        .topbar-dropdown {
            position: absolute;
            right: 0;
            top: calc(100% + 8px);
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            padding: .5rem;
            min-width: 180px;
            display: none;
            z-index: 200;
        }

        .topbar-dropdown.open {
            display: block;
            animation: fadeIn .15s ease;
        }

        .topbar-dropdown-item {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .6rem .85rem;
            border-radius: 8px;
            font-size: .82rem;
            font-weight: 600;
            color: var(--text-mid);
            cursor: pointer;
            transition: all .15s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        .topbar-dropdown-item:hover {
            background: var(--blue-xlight);
            color: var(--blue);
        }

        .topbar-dropdown-item.logout {
            color: var(--red);
        }

        .topbar-dropdown-item.logout:hover {
            background: var(--red-light);
            color: var(--red);
        }

        .topbar-dropdown-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: .3rem 0;
        }

        @media (max-width: 575px) {
            .topbar-search {
                display: none;
            }
        }

        /* ===== PAGE CONTENT ===== */
        .page-content {
            padding: 1.75rem;
            flex: 1;
        }

        @media (max-width: 575px) {
            .page-content {
                padding: 1rem;
            }
        }

        .page-header {
            margin-bottom: 1.75rem;
        }

        .page-header h1 {
            font-size: 1.55rem;
            font-weight: 800;
            letter-spacing: -.3px;
            color: var(--text-dark);
        }

        .page-header p {
            color: var(--text-muted);
            font-size: .88rem;
            margin: .3rem 0 0;
        }

        .date-pill {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: .35rem .85rem;
            font-size: .8rem;
            font-weight: 600;
            color: var(--text-mid);
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: var(--card-bg);
            border-radius: var(--card-radius);
            padding: 1.4rem 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            transition: all .3s cubic-bezier(.4, 0, .2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
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

        /* ===== CARDS ===== */
        .cf-card {
            background: var(--card-bg);
            border-radius: var(--card-radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: background .3s, border-color .3s;
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

        /* CATEGORY ICONS (professional SVG) */
        .cat-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .cat-icon svg {
            width: 18px;
            height: 18px;
        }

        .cat-pill {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: var(--blue-light);
            color: var(--blue);
            border-radius: 8px;
            padding: .25rem .6rem;
            font-size: .72rem;
            font-weight: 700;
        }

        .cat-pill.nid {
            background: rgba(180, 83, 9, .12);
            color: #b45309;
        }

        .cat-pill.eau {
            background: rgba(2, 132, 199, .12);
            color: #0284c7;
        }

        .cat-pill.eclairage {
            background: rgba(234, 179, 8, .12);
            color: #ca8a04;
        }

        .cat-pill.ordures {
            background: rgba(21, 128, 61, .12);
            color: #15803d;
        }

        .cat-pill.vert {
            background: rgba(22, 101, 52, .12);
            color: #166534;
        }

        .cat-pill.autre {
            background: rgba(100, 116, 139, .12);
            color: #475569;
        }

        /* TABLE */
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
            background: var(--filter-bg);
            padding: .7rem 1rem;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .cf-table tbody td {
            padding: .9rem 1rem;
            border-bottom: 1px solid var(--border);
            font-size: .85rem;
            color: var(--text-mid);
            vertical-align: middle;
        }

        .cf-table tbody tr {
            transition: background .15s;
        }

        .cf-table tbody tr:hover {
            background: var(--blue-xlight);
        }

        .cf-table tbody tr:last-child td {
            border-bottom: none;
        }

        .incident-id {
            font-family: 'JetBrains Mono', monospace;
            font-size: .78rem;
            color: var(--blue);
            font-weight: 500;
        }

        .incident-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: .1rem;
            font-size: .87rem;
        }

        .incident-loc {
            font-size: .75rem;
            color: var(--text-muted);
        }

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

        .tbl-btn.edit {
            background: var(--orange-light);
            color: var(--orange);
        }

        .tbl-btn.del {
            background: var(--red-light);
            color: var(--red);
        }

        .tbl-btn:hover {
            filter: brightness(.9);
            transform: scale(1.08);
        }

        .tbl-btn.approve {
            background: var(--green-light);
            color: var(--green);
        }

        /* FILTER BAR*/
        .filter-bar {
            display: flex;
            align-items: center;
            gap: .6rem;
            flex-wrap: wrap;
            padding: 1rem 1.4rem;
            border-bottom: 1px solid var(--border);
            background: var(--filter-bg);
            transition: background .3s;
        }

        .filter-select {
            background: var(--input-bg);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: .35rem .7rem;
            font-size: .8rem;
            font-family: inherit;
            color: var(--text-mid);
            outline: none;
            cursor: pointer;
            transition: border-color .2s, background .3s;
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
            width: 100%;
            background: var(--input-bg);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: .35rem .7rem .35rem 2rem;
            font-size: .8rem;
            font-family: inherit;
            color: var(--text-mid);
            outline: none;
            transition: border-color .2s, background .3s;
        }

        .filter-search:focus {
            border-color: var(--blue);
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

        /*ACTIVITY*/
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

        .activity-dot.user {
            background: var(--blue-light);
            color: var(--blue);
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

        .activity-text strong {
            color: var(--text-dark);
            font-weight: 700;
        }

        .activity-time {
            font-size: .72rem;
            color: var(--text-muted);
            margin-top: .15rem;
        }

        /*PROGRESS*/
        .cf-progress {
            height: 6px;
            background: var(--border);
            border-radius: 99px;
            overflow: hidden;
        }

        .cf-progress-bar {
            height: 100%;
            border-radius: 99px;
        }

        /* ===== MINI MAP ===== */
        #dash-mini-map {
            height: 210px;
            width: 100%;
            border-radius: 12px;
            z-index: 1;
        }

        /* ===== FULL MAP ===== */
        #leaflet-map {
            height: 520px;
            width: 100%;
            border-radius: 12px;
            z-index: 1;
        }

        @media (max-width: 575px) {
            #leaflet-map {
                height: 360px;
            }
        }

        .map-filter-panel {
            display: flex;
            align-items: center;
            gap: .6rem;
            flex-wrap: wrap;
            padding: 1rem 1.4rem;
            border-bottom: 1px solid var(--border);
            background: var(--filter-bg);
        }

        .map-filter-panel label {
            font-size: .75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .8px;
            white-space: nowrap;
        }

        .map-stats-bar {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: .8rem 1.4rem;
            border-top: 1px solid var(--border);
            background: var(--filter-bg);
            flex-wrap: wrap;
        }

        .map-stat-chip {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            border-radius: 8px;
            padding: .3rem .75rem;
            font-size: .75rem;
            font-weight: 700;
        }

        .map-stat-chip.total {
            background: var(--blue-light);
            color: var(--blue);
        }

        .map-stat-chip.new-s {
            background: #e0f2fe;
            color: #0369a1;
        }

        .map-stat-chip.prog-s {
            background: var(--orange-light);
            color: var(--orange);
        }

        .map-stat-chip.res-s {
            background: var(--green-light);
            color: var(--green);
        }

        .map-stat-chip.rej-s {
            background: var(--red-light);
            color: var(--red);
        }

        .map-legend {
            background: rgba(255, 255, 255, .95);
            backdrop-filter: blur(8px);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: .75rem 1rem;
            box-shadow: var(--shadow-md);
            font-size: .75rem;
            min-width: 160px;
        }

        [data-theme="dark"] .map-legend {
            background: rgba(19, 31, 53, .95);
        }

        .map-legend-title {
            font-weight: 800;
            font-size: .7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: .5rem;
        }

        .legend-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-bottom: .3rem;
            font-size: .78rem;
            color: var(--text-mid);
            font-weight: 600;
        }

        .legend-dot-circle {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            flex-shrink: 0;
            border: 2px solid rgba(255, 255, 255, .8);
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .15);
        }

        /* ===== PAGINATION ===== */
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
            background: var(--white);
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

        /* MODALS*/
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: var(--shadow-lg);
            background: var(--card-bg);
            transition: background .3s;
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

        .modal-body {
            padding: 1.25rem;
            font-size: .88rem;
            color: var(--text-mid);
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 1rem 1.25rem;
        }

        .form-control,
        .form-select {
            background: var(--input-bg);
            border-color: var(--border);
            color: var(--text-dark);
            transition: background .3s, border-color .3s;
        }

        .form-control:focus,
        .form-select:focus {
            background: var(--input-bg);
            color: var(--text-dark);
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(26, 111, 212, .15);
        }

        /* ===== PAGE SECTIONS ===== */
        .page-section {
            display: none;
            width: 100%;
            animation: fadeIn .3s ease;
        }

        .page-section.active {
            display: block;
        }

        /*LEGEND CHART*/
        .legend-item {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .legend-val {
            font-size: .8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-left: auto;
        }

        /*DARK MODE TOGGLE*/
        .dm-toggle-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.1rem 1.5rem;
            border-radius: 12px;
            background: var(--bg);
            border: 1.5px solid var(--border);
            transition: background .3s;
        }

        .dm-toggle-label {
            font-size: .9rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .dm-toggle-sub {
            font-size: .78rem;
            color: var(--text-muted);
            margin-top: .15rem;
        }

        .toggle-switch {
            width: 52px;
            height: 28px;
            position: relative;
            flex-shrink: 0;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            inset: 0;
            background: #cbd5e1;
            border-radius: 99px;
            cursor: pointer;
            transition: background .3s;
        }

        .toggle-slider::before {
            content: '';
            position: absolute;
            width: 22px;
            height: 22px;
            left: 3px;
            top: 3px;
            background: #fff;
            border-radius: 50%;
            transition: transform .3s;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
        }

        .toggle-switch input:checked+.toggle-slider {
            background: var(--blue);
        }

        .toggle-switch input:checked+.toggle-slider::before {
            transform: translateX(24px);
        }

        .settings-section-title {
            font-size: .72rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: .75rem;
            padding-bottom: .5rem;
            border-bottom: 1px solid var(--border);
        }

        /*COMMENt*/
        .comment-avatar {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--blue), var(--blue-mid));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: .75rem;
        }

        .comment-text {
            font-size: .83rem;
            color: var(--text-mid);
            line-height: 1.55;
        }

        .comment-text em {
            font-size: .75rem;
            color: var(--text-muted);
            font-style: normal;
            margin-left: .5rem;
        }

        .moderation-badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            border-radius: 99px;
            padding: .2rem .65rem;
            font-size: .7rem;
            font-weight: 700;
        }

        .moderation-badge.pending {
            background: var(--orange-light);
            color: var(--orange);
        }

        .moderation-badge.approved {
            background: var(--green-light);
            color: var(--green);
        }

        .moderation-badge.rejected {
            background: var(--red-light);
            color: var(--red);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
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

        .anim-1 {
            animation: fadeInUp .5s .05s ease both
        }

        .anim-2 {
            animation: fadeInUp .5s .12s ease both
        }

        .anim-3 {
            animation: fadeInUp .5s .19s ease both
        }

        .anim-4 {
            animation: fadeInUp .5s .26s ease both
        }

        .anim-5 {
            animation: fadeInUp .5s .33s ease both
        }

        .anim-6 {
            animation: fadeInUp .5s .40s ease both
        }

        /* Leaflet popup */
        .cf-popup .leaflet-popup-content-wrapper {
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            padding: 0;
            overflow: hidden;
        }

        .cf-popup .leaflet-popup-content {
            margin: 0;
            min-width: 220px;
        }

        .cf-popup .leaflet-popup-tip-container {
            display: none;
        }
    </style>
</head>

<body>
    <div class="admin-wrap">

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <div class="brand-logo"><i class="bi bi-geo-alt-fill"></i></div>
                <span class="brand-name">Smart<span>City</span></span>
            </div>
            <nav class="sidebar-nav">
                <ul style="list-style:none;padding:0;margin:0">
                    <li class="sidebar-section-title">Principal</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf active" data-section="dashboard">
                            <i class="bi bi-grid-fill nav-icon"></i>
                            <span class="nav-label">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="signalements">
                            <i class="bi bi-flag-fill nav-icon"></i>
                            <span class="nav-label">Signalements</span>
                            <span class="nav-badge">24</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="carte">
                            <i class="bi bi-geo-alt-fill nav-icon"></i>
                            <span class="nav-label">Carte en direct</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Gestion</li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="utilisateurs">
                            <i class="bi bi-people-fill nav-icon"></i>
                            <span class="nav-label">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="agents">
                            <i class="bi bi-person-workspace nav-icon"></i>
                            <span class="nav-label">Agents terrain</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="categories">
                            <i class="bi bi-tags-fill nav-icon"></i>
                            <span class="nav-label">Catégories</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="commentaires">
                            <i class="bi bi-chat-dots-fill nav-icon"></i>
                            <span class="nav-label">Commentaires</span>
                            <span class="nav-badge">7</span>
                        </a>
                    </li>
                    <li class="sidebar-section-title">Système</li>
                    <li class="nav-item-cf">
                        <a href="#" id="notif" class="nav-link-cf" data-section="notifications">
                            <i class="bi bi-bell-fill nav-icon"></i>
                            <span class="nav-label">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="parametres">
                            <i class="bi bi-gear-fill nav-icon"></i>
                            <span class="nav-label">Paramètres</span>
                        </a>
                    </li>
                    <li class="nav-item-cf">
                        <a href="#" class="nav-link-cf" data-section="roles">
                            <i class="bi bi-shield-lock-fill nav-icon"></i>
                            <span class="nav-label">Rôles &amp; Accès</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-user">
                <div class="user-avatar">AD</div>
                <div class="user-info">
                    <div class="user-name">Admin User</div>
                    <div class="user-role">Super Admin</div>
                </div>
            </div>
        </aside>

        <!-- Main Area -->
        <div class="main-area" id="mainArea">
            <!-- Topbar -->
            <header class="topbar">
                <button class="btn-sidebar-toggle" id="sidebarToggle" title="Menu">
                    <i class="bi bi-layout-sidebar-inset"></i>
                </button>
                <div class="topbar-breadcrumb">
                    <i class="bi bi-house-fill" style="font-size:.75rem"></i>
                    <span>/</span>
                    <span class="current" id="currentPageTitle">Dashboard</span>
                </div>
                <div class="topbar-search">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" placeholder="Rechercher un incident, utilisateur…" />
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn" title="Notifications">
                        <i class="bi bi-bell-fill"></i>
                        <span class="badge-dot"></span>
                    </button>
                    <button class="icon-btn" title="Messages"><i class="bi bi-envelope-fill"></i></button>
                    <div class="topbar-avatar-wrap">
                        <div class="topbar-avatar" id="topbarAvatarBtn" title="Mon profil">AD</div>
                        <div class="topbar-dropdown" id="topbarDropdown">
                            <button class="topbar-dropdown-item"><i class="bi bi-person-fill"></i> Mon profil</button>
                            <button class="topbar-dropdown-item"
                                onclick="navigateTo('parametres');document.getElementById('topbarDropdown').classList.remove('open')"><i
                                    class="bi bi-gear-fill"></i> Paramètres</button>
                            <hr class="topbar-dropdown-divider">
                            <button class="topbar-dropdown-item logout" onclick="handleLogout()"><i
                                    class="bi bi-box-arrow-right"></i> Déconnexion</button>
                        </div>
                    </div>
                </div>
            </header>

            <div class="page-content">

                <!-- ====== DASHBOARD ====== -->
                <div id="dashboardSection" class="page-section active">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Tableau de bord</h1>
                            <p>Bienvenue, voici l'état en temps réel de la plateforme Smart-City.</p>
                        </div>
                        <div class="ms-md-auto d-flex align-items-center gap-2">
                            <div class="date-pill"><i class="bi bi-calendar3" style="color:var(--blue)"></i> 16 Avril
                                2026</div>
                            <button class="btn-add"><i class="bi bi-download"></i> Exporter</button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-xl-3 anim-1">
                            <div class="stat-card blue">
                                <div class="stat-icon blue"><i class="bi bi-flag-fill"></i></div>
                                <div class="stat-val count-up" data-target="1284">0</div>
                                <div class="stat-lbl">Total signalements</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +12% ce mois</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-2">
                            <div class="stat-card orange">
                                <div class="stat-icon orange"><i class="bi bi-hourglass-split"></i></div>
                                <div class="stat-val count-up" data-target="342">0</div>
                                <div class="stat-lbl">En cours de traitement</div>
                                <span class="stat-trend flat"><i class="bi bi-dash"></i> Stable</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-3">
                            <div class="stat-card green">
                                <div class="stat-icon green"><i class="bi bi-check-circle-fill"></i></div>
                                <div class="stat-val count-up" data-target="896">0</div>
                                <div class="stat-lbl">Problèmes résolus</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +8% ce mois</span>
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 anim-4">
                            <div class="stat-card red">
                                <div class="stat-icon red"><i class="bi bi-people-fill"></i></div>
                                <div class="stat-val count-up" data-target="5241">0</div>
                                <div class="stat-lbl">Utilisateurs inscrits</div>
                                <span class="stat-trend up"><i class="bi bi-arrow-up-short"></i> +24% ce mois</span>
                            </div>
                        </div>
                    </div>

                    <!-- Charts row -->
                    <div class="row g-3 mb-4">
                        <div class="col-lg-8 anim-5">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bar-chart-fill"></i></div>
                                    <h5>Évolution des signalements — Avril 2026</h5>
                                    <span
                                        style="font-size:.75rem;color:var(--text-muted);background:var(--bg);padding:.2rem .6rem;border-radius:8px;margin-left:auto">Données
                                        statiques</span>
                                </div>
                                <div class="cf-card-body" style="padding-bottom:.5rem">
                                    <canvas id="barLineChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 anim-6">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-pie-chart-fill"></i></div>
                                    <h5>Par catégorie</h5>
                                </div>
                                <div class="cf-card-body">
                                    <canvas id="donutChart" height="170"></canvas>
                                    <div class="d-flex flex-column gap-2 mt-3">
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#1a6fd4"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Nid-de-poule</span><span
                                                class="legend-val">311</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#f0a500"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Ordures</span><span
                                                class="legend-val">248</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#16a34a"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Éclairage</span><span
                                                class="legend-val">134</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#ea580c"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Fuite d'eau</span><span
                                                class="legend-val">87</span></div>
                                        <div class="legend-item"><span class="legend-dot"
                                                style="background:#7c3aed"></span><span
                                                style="font-size:.8rem;color:var(--text-mid)">Autres</span><span
                                                class="legend-val">504</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table + Mini-map + Activity -->
                    <div class="row g-3 mb-4">
                        <div class="col-lg-8">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-table"></i></div>
                                    <h5>Signalements récents</h5>
                                </div>
                                <div class="filter-bar">
                                    <div class="filter-search-wrap">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="filter-search" placeholder="Rechercher..." />
                                    </div>
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
                                                    <div class="incident-title">Nid-de-poule profond</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Rue Joss, Akwa</div>
                                                </td>
                                                <td><span class="cat-pill nid">
                                                        <?xml version="1.0"?><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path
                                                                d="M3 12h18M3 12c2-4 5-6 9-6s7 2 9 6M3 12c2 4 5 6 9 6s7-2 9-6" />
                                                            <ellipse cx="12" cy="14" rx="4"
                                                                ry="2" />
                                                        </svg> Nid-de-poule
                                                    </span></td>
                                                <td><span class="status-badge new"><span
                                                            class="dot"></span>Nouveau</span></td>
                                                <td><span class="prio high">● Haute</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4
                                                        min</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1283</span></td>
                                                <td>
                                                    <div class="incident-title">Lampadaire éteint</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Bd de la Liberté</div>
                                                </td>
                                                <td><span class="cat-pill eclairage"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="13"
                                                            height="13" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path
                                                                d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
                                                            <path d="M9 18h6" />
                                                            <path d="M10 22h4" />
                                                        </svg> Éclairage</span></td>
                                                <td><span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span></td>
                                                <td><span class="prio medium">● Moyenne</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a
                                                        2h</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1282</span></td>
                                                <td>
                                                    <div class="incident-title">Fuite d'eau importante</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Carrefour Ndokotti</div>
                                                </td>
                                                <td><span class="cat-pill eau"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                                                        </svg> Fuite d'eau</span></td>
                                                <td><span class="status-badge progress"><span class="dot"></span>En
                                                        cours</span></td>
                                                <td><span class="prio high">● Haute</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a
                                                        5h</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1281</span></td>
                                                <td>
                                                    <div class="incident-title">Dépôt sauvage d'ordures</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Quartier New Bell</div>
                                                </td>
                                                <td><span class="cat-pill ordures"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="13"
                                                            height="13" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6" />
                                                            <path d="M19 6l-1 14H6L5 6" />
                                                            <path d="M10 11v6" />
                                                            <path d="M14 11v6" />
                                                            <path d="M9 6V4h6v2" />
                                                        </svg> Ordures</span></td>
                                                <td><span class="status-badge resolved"><span
                                                            class="dot"></span>Résolu</span></td>
                                                <td><span class="prio low">● Basse</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">Hier,
                                                        14h32</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1280</span></td>
                                                <td>
                                                    <div class="incident-title">Arbre tombé sur route</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Av. Charles de Gaulle</div>
                                                </td>
                                                <td><span class="cat-pill vert"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="13"
                                                            height="13" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M17 14l3-3-3-3" />
                                                            <path d="M14 17l3 3-3 3" />
                                                            <path d="M3 7l9 9M3 17l9-9" />
                                                            <path d="M12 3v18" />
                                                        </svg> Espaces verts</span></td>
                                                <td><span class="status-badge rejected"><span
                                                            class="dot"></span>Rejeté</span></td>
                                                <td><span class="prio medium">● Moyenne</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">13
                                                        Avr.</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
                                                                class="bi bi-trash-fill"></i></button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="incident-id">#CF-1279</span></td>
                                                <td>
                                                    <div class="incident-title">Bouche d'égout ouverte</div>
                                                    <div class="incident-loc"><i class="bi bi-geo-alt"
                                                            style="font-size:.7rem"></i> Rue Prince de Galles</div>
                                                </td>
                                                <td><span class="cat-pill autre"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="13"
                                                            height="13" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2.2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <line x1="12" y1="8" x2="12"
                                                                y2="12" />
                                                            <line x1="12" y1="16" x2="12.01"
                                                                y2="16" />
                                                        </svg> Autre</span></td>
                                                <td><span class="status-badge new"><span
                                                            class="dot"></span>Nouveau</span></td>
                                                <td><span class="prio high">● Haute</span></td>
                                                <td><span style="font-size:.78rem;color:var(--text-muted)">12
                                                        Avr.</span></td>
                                                <td>
                                                    <div class="d-flex gap-1"><button class="tbl-btn view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewIncidentModal"><i
                                                                class="bi bi-eye-fill"></i></button><button
                                                            class="tbl-btn edit" data-bs-toggle="modal"
                                                            data-bs-target="#editIncidentModal"><i
                                                                class="bi bi-pencil-fill"></i></button><button
                                                            class="tbl-btn del" data-bs-toggle="modal"
                                                            data-bs-target="#deleteIncidentModal"><i
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
                                    <button class="cf-page-btn">3</button>
                                    <span style="font-size:.8rem;color:var(--text-muted);padding:0 .3rem">…</span>
                                    <button class="cf-page-btn">12</button>
                                    <button class="cf-page-btn"><i class="bi bi-chevron-right"></i></button>
                                    <span class="cf-page-info">1–6 sur 1 284 signalements</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex flex-column gap-3">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                                    <h5>Carte des incidents</h5>
                                    <a href="#" onclick="navigateTo('carte');return false;"
                                        style="font-size:.78rem;color:var(--blue);font-weight:600;text-decoration:none;margin-left:auto">Voir
                                        tout</a>
                                </div>
                                <div style="padding:.75rem">
                                    <div id="dash-mini-map"></div>
                                </div>
                            </div>

                            <div class="cf-card flex-grow-1">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-activity"></i></div>
                                    <h5>Activité récente</h5>
                                </div>
                                <div class="cf-card-body" style="padding-top:.5rem;padding-bottom:.5rem">
                                    <div class="activity-item">
                                        <div class="activity-dot new"><i class="bi bi-flag-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text"><strong>Jean Mbarga</strong> a signalé un
                                                nid-de-poule Rue Joss</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 4 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot assign"><i class="bi bi-person-check-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Incident <strong>#CF-1283</strong> assigné à
                                                Agent Kouam</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 18 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot resolved"><i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">Incident <strong>#CF-1281</strong> marqué comme
                                                résolu</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 45 min</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot user"><i class="bi bi-person-plus-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Nouvel utilisateur <strong>Aïssatou
                                                    Diallo</strong> inscrit</div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 1h</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-dot comment"><i class="bi bi-chat-fill"></i></div>
                                        <div class="activity-content">
                                            <div class="activity-text">Commentaire ajouté sur incident
                                                <strong>#CF-1279</strong></div>
                                            <div class="activity-time"><i class="bi bi-clock"
                                                    style="font-size:.65rem"></i> Il y a 2h</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom row -->
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-4">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bar-chart-fill"></i></div>
                                    <h5>Taux de résolution</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Nid-de-poule</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--blue)">78%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:78%;background:var(--blue)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Éclairage</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--accent)">62%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:62%;background:var(--accent)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Ordures</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--green)">91%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:91%;background:var(--green)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Fuite d'eau</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--orange)">54%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:54%;background:var(--orange)">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1"><span
                                                style="font-size:.8rem;font-weight:600">Espaces verts</span><span
                                                style="font-size:.8rem;font-weight:700;color:var(--red)">43%</span>
                                        </div>
                                        <div class="cf-progress">
                                            <div class="cf-progress-bar" style="width:43%;background:var(--red)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-trophy-fill"></i></div>
                                    <h5>Top agents terrain</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#f0a500,#fbbf24);display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0">
                                            🥇</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Kouam Pierre</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">48 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--green-light);color:var(--green);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">96%</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#94a3b8,#cbd5e1);display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0">
                                            🥈</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Manga Rose</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">41 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--green-light);color:var(--green);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">91%</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#ea580c,#fb923c);display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0">
                                            🥉</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Nkengne Eric</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">37 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--orange-light);color:var(--orange);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">84%</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:36px;height:36px;border-radius:10px;background:var(--blue-light);display:flex;align-items:center;justify-content:center;color:var(--blue);font-weight:800;font-size:.8rem;flex-shrink:0">
                                            4</div>
                                        <div style="flex:1">
                                            <div style="font-weight:700;font-size:.85rem">Agent Biwole Sara</div>
                                            <div style="font-size:.72rem;color:var(--text-muted)">29 interventions
                                            </div>
                                        </div>
                                        <span
                                            style="background:var(--blue-light);color:var(--blue);font-size:.72rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">79%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-clock-history"></i></div>
                                    <h5>Activité par heure</h5>
                                </div>
                                <div class="cf-card-body">
                                    <canvas id="barChart" height="160"></canvas>
                                    <div class="mt-3 p-3 rounded-3"
                                        style="background:var(--blue-xlight);border:1px solid var(--blue-light)">
                                        <div style="font-size:.75rem;color:var(--text-muted);font-weight:600">Pic
                                            d'activité</div>
                                        <div style="font-size:1.15rem;font-weight:800;color:var(--blue)">08h00 – 10h00
                                        </div>
                                        <div style="font-size:.75rem;color:var(--text-muted)">Heure de pointe des
                                            signalements</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== SIGNALEMENTS ====== -->
                <div id="signalementsSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Signalements</h1>
                        <p>Gérez les signalements des utilisateurs.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-flag-fill"></i></div>
                            <h5>Liste des signalements</h5>
                            <button class="btn-add ms-auto"><i class="bi bi-arrow-clockwise"></i> Actualiser</button>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher..." /></div>
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
                            <select class="filter-select">
                                <option>Priorité</option>
                                <option>Haute</option>
                                <option>Moyenne</option>
                                <option>Basse</option>
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
                                            <div class="incident-title">Nid-de-poule profond</div>
                                            <div class="incident-loc"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Rue Joss, Akwa</div>
                                        </td>
                                        <td><span class="cat-pill nid"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path
                                                        d="M3 12h18M3 12c2-4 5-6 9-6s7 2 9 6M3 12c2 4 5 6 9 6s7-2 9-6" />
                                                    <ellipse cx="12" cy="14" rx="4"
                                                        ry="2" />
                                                </svg> Nid-de-poule</span></td>
                                        <td><span class="status-badge new"><span class="dot"></span>Nouveau</span>
                                        </td>
                                        <td><span class="prio high">● Haute</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn edit" data-bs-toggle="modal"
                                                    data-bs-target="#editIncidentModal"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del" data-bs-toggle="modal"
                                                    data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="incident-id">#CF-1283</span></td>
                                        <td>
                                            <div class="incident-title">Lampadaire éteint</div>
                                            <div class="incident-loc"><i class="bi bi-geo-alt"
                                                    style="font-size:.7rem"></i> Bd de la Liberté</div>
                                        </td>
                                        <td><span class="cat-pill eclairage"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path
                                                        d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
                                                    <path d="M9 18h6" />
                                                    <path d="M10 22h4" />
                                                </svg> Éclairage</span></td>
                                        <td><span class="status-badge progress"><span class="dot"></span>En
                                                cours</span></td>
                                        <td><span class="prio medium">● Moyenne</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 2h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn edit" data-bs-toggle="modal"
                                                    data-bs-target="#editIncidentModal"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del" data-bs-toggle="modal"
                                                    data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination">
                            <button class="cf-page-btn"><i class="bi bi-chevron-left"></i></button>
                            <button class="cf-page-btn active">1</button><button class="cf-page-btn">2</button><button
                                class="cf-page-btn">3</button>
                            <span style="font-size:.8rem;color:var(--text-muted);padding:0 .3rem">…</span>
                            <button class="cf-page-btn">12</button>
                            <button class="cf-page-btn"><i class="bi bi-chevron-right"></i></button>
                            <span class="cf-page-info">1–6 sur 1 284 signalements</span>
                        </div>
                    </div>
                </div>

                <!-- ====== CARTE EN DIRECT ====== -->
                <div id="carteSection" class="page-section">
                    <div
                        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
                        <div>
                            <h1>Carte en direct</h1>
                            <p>Visualisez et filtrez les incidents en temps réel sur Douala.</p>
                        </div>
                        <div class="ms-md-auto d-flex align-items-center gap-2">
                            <div class="date-pill"><i class="bi bi-broadcast" style="color:var(--green)"></i> En
                                direct</div>
                            <button class="btn-add" onclick="resetMapFilters()"><i
                                    class="bi bi-arrow-counterclockwise"></i> Réinitialiser</button>
                        </div>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-map-fill"></i></div>
                            <h5>Carte des incidents — Douala</h5>
                            <span id="mapVisibleCount"
                                style="margin-left:auto;font-size:.78rem;font-weight:700;color:var(--blue);background:var(--blue-light);padding:.2rem .65rem;border-radius:99px">20
                                incidents</span>
                        </div>
                        <div class="map-filter-panel">
                            <label><i class="bi bi-funnel-fill me-1"></i>Filtres :</label>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Catégorie</label>
                                <select class="filter-select" id="mapFilterCat" onchange="applyMapFilters()">
                                    <option value="">Toutes</option>
                                    <option value="nid">Nid-de-poule</option>
                                    <option value="eclairage">Éclairage</option>
                                    <option value="ordures">Ordures</option>
                                    <option value="eau">Fuite d'eau</option>
                                    <option value="vert">Espaces verts</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Statut</label>
                                <select class="filter-select" id="mapFilterStatus" onchange="applyMapFilters()">
                                    <option value="">Tous</option>
                                    <option value="new">Nouveau</option>
                                    <option value="progress">En cours</option>
                                    <option value="resolved">Résolu</option>
                                    <option value="rejected">Rejeté</option>
                                </select>
                            </div>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Priorité</label>
                                <select class="filter-select" id="mapFilterPrio" onchange="applyMapFilters()">
                                    <option value="">Toutes</option>
                                    <option value="high">Haute</option>
                                    <option value="medium">Moyenne</option>
                                    <option value="low">Basse</option>
                                </select>
                            </div>
                            <div style="display:flex;align-items:center;gap:.3rem">
                                <label
                                    style="letter-spacing:0;text-transform:none;font-size:.8rem;font-weight:600;color:var(--text-mid)">Quartier</label>
                                <select class="filter-select" id="mapFilterZone" onchange="applyMapFilters()">
                                    <option value="">Tous</option>
                                    <option value="Akwa">Akwa</option>
                                    <option value="Bonanjo">Bonanjo</option>
                                    <option value="Bepanda">Bepanda</option>
                                    <option value="Deido">Deido</option>
                                    <option value="New Bell">New Bell</option>
                                    <option value="Ndokotti">Ndokotti</option>
                                    <option value="Bonapriso">Bonapriso</option>
                                </select>
                            </div>
                            <div class="filter-search-wrap" style="max-width:200px">
                                <i class="bi bi-search"></i>
                                <input type="text" class="filter-search" id="mapFilterSearch"
                                    placeholder="Chercher un incident..." oninput="applyMapFilters()">
                            </div>
                        </div>
                        <div style="padding:1rem;background:#f0f4fa">
                            <div id="leaflet-map"></div>
                        </div>
                        <div class="map-stats-bar">
                            <span style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Résumé :</span>
                            <span class="map-stat-chip total"><i class="bi bi-geo-alt-fill"></i> <span
                                    id="statTotal">20</span> total</span>
                            <span class="map-stat-chip new-s"><span class="legend-dot-circle"
                                    style="background:#0369a1;width:8px;height:8px"></span><span
                                    id="statNew">0</span> nouveaux</span>
                            <span class="map-stat-chip prog-s"><span class="legend-dot-circle"
                                    style="background:#ea580c;width:8px;height:8px"></span><span
                                    id="statProg">0</span> en cours</span>
                            <span class="map-stat-chip res-s"><span class="legend-dot-circle"
                                    style="background:#16a34a;width:8px;height:8px"></span><span
                                    id="statRes">0</span> résolus</span>
                            <span class="map-stat-chip rej-s"><span class="legend-dot-circle"
                                    style="background:#dc2626;width:8px;height:8px"></span><span
                                    id="statRej">0</span> rejetés</span>
                        </div>
                    </div>
                </div>

                <!-- ====== UTILISATEURS ====== -->
                <div id="utilisateursSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Utilisateurs</h1>
                        <p>Gérez les utilisateurs de la plateforme.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-people-fill"></i></div>
                            <h5>Liste des utilisateurs</h5>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher..." /></div>
                            <select class="filter-select">
                                <option>Quartier</option>
                                <option>Bepanda</option>
                                <option>Akwa</option>
                            </select>
                            <select class="filter-select">
                                <option>Date d'inscription</option>
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Quartier</th>
                                        <th>Téléphone</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="incident-id">#U-001</span></td>
                                        <td>Moussong</td>
                                        <td>Anita</td>
                                        <td>Beedi</td>
                                        <td>6 50 50 50 50</td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn del" data-bs-toggle="modal"
                                                    data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination"><button class="cf-page-btn"><i
                                    class="bi bi-chevron-left"></i></button><button
                                class="cf-page-btn active">1</button><button class="cf-page-btn">2</button><button
                                class="cf-page-btn"><i class="bi bi-chevron-right"></i></button><span
                                class="cf-page-info">1–1 sur 5 241 utilisateurs</span></div>
                    </div>
                </div>

                <!-- ====== AGENTS ====== -->
                <div id="agentsSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Agents terrain</h1>
                        <p>Gérez les agents de la plateforme.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-person-workspace"></i></div>
                            <h5>Liste des agents</h5><button class="btn-add ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addAgentModal"><i class="bi bi-plus-lg"></i> Nouveau</button>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher..." /></div>
                            <select class="filter-select">
                                <option>Zone de travail</option>
                                <option>Douala Nord</option>
                                <option>Douala Sud</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Tél.</th>
                                        <th>Zone</th>
                                        <th>Durée</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="incident-id">#A-001</span></td>
                                        <td>Anatole</td>
                                        <td>Bepanda</td>
                                        <td>6 50 30 30 30</td>
                                        <td>Douala Nord</td>
                                        <td>2h</td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn view"
                                                    data-bs-toggle="modal" data-bs-target="#viewIncidentModal"><i
                                                        class="bi bi-eye-fill"></i></button><button
                                                    class="tbl-btn edit" data-bs-toggle="modal"
                                                    data-bs-target="#editIncidentModal"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del" data-bs-toggle="modal"
                                                    data-bs-target="#deleteIncidentModal"><i
                                                        class="bi bi-trash-fill"></i></button></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cf-pagination"><button class="cf-page-btn"><i
                                    class="bi bi-chevron-left"></i></button><button
                                class="cf-page-btn active">1</button><button class="cf-page-btn"><i
                                    class="bi bi-chevron-right"></i></button><span class="cf-page-info">1–1 sur 12
                                agents</span></div>
                    </div>
                </div>

                <!-- ====== CATÉGORIES ====== -->
                <div id="categoriesSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Catégories</h1>
                        <p>Gérez les catégories d'incidents.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-tags-fill"></i></div>
                            <h5>Catégories d'incidents</h5>
                            <button class="btn-add ms-auto"><i class="bi bi-plus-lg"></i> Nouvelle catégorie</button>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th>Icône</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Signalements</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="cat-pill nid"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path
                                                        d="M3 12h18M3 12c2-4 5-6 9-6s7 2 9 6M3 12c2 4 5 6 9 6s7-2 9-6" />
                                                    <ellipse cx="12" cy="14" rx="4"
                                                        ry="2" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Nid-de-poule</td>
                                        <td style="color:var(--text-muted)">Dégradation de la chaussée</td>
                                        <td>311</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill eclairage"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path
                                                        d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
                                                    <path d="M9 18h6" />
                                                    <path d="M10 22h4" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Éclairage</td>
                                        <td style="color:var(--text-muted)">Pannes éclairage public</td>
                                        <td>134</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill ordures"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6" />
                                                    <path d="M19 6l-1 14H6L5 6" />
                                                    <path d="M10 11v6M14 11v6M9 6V4h6v2" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Ordures</td>
                                        <td style="color:var(--text-muted)">Dépôts sauvages, poubelles</td>
                                        <td>248</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill eau"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Fuite d'eau</td>
                                        <td style="color:var(--text-muted)">Fuites et inondations</td>
                                        <td>87</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill vert"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M17 14l3-3-3-3M14 17l3 3-3 3M3 7l9 9M3 17l9-9M12 3v18" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Espaces verts</td>
                                        <td style="color:var(--text-muted)">Arbres, végétation</td>
                                        <td>56</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="cat-pill autre"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="8" x2="12"
                                                        y2="12" />
                                                    <line x1="12" y1="16" x2="12.01"
                                                        y2="16" />
                                                </svg></span></td>
                                        <td style="font-weight:700">Autre</td>
                                        <td style="color:var(--text-muted)">Incidents divers</td>
                                        <td>448</td>
                                        <td>
                                            <div class="d-flex gap-1"><button class="tbl-btn edit"><i
                                                        class="bi bi-pencil-fill"></i></button><button
                                                    class="tbl-btn del"><i class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ====== COMMENTAIRES ====== -->
                <div id="commentairesSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Commentaires</h1>
                        <p>Modérez et gérez les commentaires des utilisateurs.</p>
                    </div>
                    <div class="cf-card anim-2">
                        <div class="cf-card-header">
                            <div class="card-icon-header"><i class="bi bi-chat-dots-fill"></i></div>
                            <h5>Tous les commentaires</h5>
                            <div class="ms-auto d-flex gap-2">
                                <span
                                    style="background:var(--orange-light);color:var(--orange);font-size:.75rem;font-weight:700;border-radius:8px;padding:.25rem .75rem"><i
                                        class="bi bi-hourglass-split me-1"></i>7 en attente</span>
                                <button class="btn-add"><i class="bi bi-arrow-clockwise"></i> Actualiser</button>
                            </div>
                        </div>
                        <div class="filter-bar">
                            <div class="filter-search-wrap"><i class="bi bi-search"></i><input type="text"
                                    class="filter-search" placeholder="Rechercher un commentaire, auteur…" /></div>
                            <select class="filter-select">
                                <option value="">Statut modération</option>
                                <option value="pending">En attente</option>
                                <option value="approved">Approuvé</option>
                                <option value="rejected">Rejeté</option>
                            </select>
                            <select class="filter-select">
                                <option>Incident associé</option>
                                <option>#CF-1284</option>
                                <option>#CF-1283</option>
                                <option>#CF-1282</option>
                                <option>#CF-1281</option>
                            </select>
                            <select class="filter-select">
                                <option>Date</option>
                                <option>Aujourd'hui</option>
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                            </select>
                        </div>
                        <div style="overflow-x:auto">
                            <table class="cf-table">
                                <thead>
                                    <tr>
                                        <th style="width:40px"><input type="checkbox" class="form-check-input" />
                                        </th>
                                        <th>Auteur</th>
                                        <th>Commentaire</th>
                                        <th>Incident</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar">JM</div>
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Jean Mbarga</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Ce nid-de-poule est vraiment dangereux, j'ai
                                                failli avoir un accident hier soir. Il faut intervenir rapidement.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1284</span></td>
                                        <td><span class="moderation-badge pending"><i
                                                    class="bi bi-hourglass-split"></i> En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 4 min</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#7c3aed,#a855f7)">AD
                                                </div>
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Aïssatou Diallo</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Le lampadaire est éteint depuis 3 semaines
                                                maintenant. Le quartier est très sombre la nuit, c'est dangereux.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1283</span></td>
                                        <td><span class="moderation-badge approved"><i
                                                    class="bi bi-check-circle-fill"></i> Approuvé</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 1h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#16a34a,#22c55e)">KP
                                                </div>
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Kouam Pierre</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Agent terrain
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Intervention planifiée pour demain matin.
                                                L'équipe de plomberie est mobilisée.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1282</span></td>
                                        <td><span class="moderation-badge approved"><i
                                                    class="bi bi-check-circle-fill"></i> Approuvé</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 3h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#ea580c,#f97316)">MN
                                                </div>
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Martin Ngaleu</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Problème signalé il y a plus d'un mois. Aucune
                                                action de votre part. C'est inadmissible !!</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1281</span></td>
                                        <td><span class="moderation-badge pending"><i
                                                    class="bi bi-hourglass-split"></i> En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Il y a 5h</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#0369a1,#38bdf8)">SB
                                                </div>
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Sophie Bebe</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Merci pour l'intervention rapide sur ce point !
                                                La situation est vraiment améliorée.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1280</span></td>
                                        <td><span class="moderation-badge rejected"><i
                                                    class="bi bi-x-circle-fill"></i> Rejeté</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">Hier</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn del" title="Supprimer"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#be123c,#f43f5e)">FK
                                                </div>
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Fatou Kamga</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyenne
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">La bouche d'égout est ouverte depuis des
                                                semaines. Des enfants jouent près d'elle, c'est très risqué.</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1279</span></td>
                                        <td><span class="moderation-badge pending"><i
                                                    class="bi bi-hourglass-split"></i> En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">12 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input" /></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="comment-avatar"
                                                    style="background:linear-gradient(135deg,#b45309,#d97706)">BT
                                                </div>
                                                <div>
                                                    <div
                                                        style="font-weight:700;font-size:.83rem;color:var(--text-dark)">
                                                        Blaise Tchinda</div>
                                                    <div style="font-size:.7rem;color:var(--text-muted)">Citoyen</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="max-width:300px">
                                            <div class="comment-text">Toujours pas d'intervention ! Cela fait
                                                maintenant 2 semaines. Que se passe-t-il ?</div>
                                        </td>
                                        <td><span class="incident-id">#CF-1278</span></td>
                                        <td><span class="moderation-badge pending"><i
                                                    class="bi bi-hourglass-split"></i> En attente</span></td>
                                        <td><span style="font-size:.78rem;color:var(--text-muted)">12 Avr.</span></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="tbl-btn view" title="Voir"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button class="tbl-btn approve" title="Approuver"><i
                                                        class="bi bi-check-lg"></i></button>
                                                <button class="tbl-btn del" title="Rejeter"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
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
                            <span class="cf-page-info">1–7 sur 142 commentaires</span>
                        </div>
                    </div>
                </div>

                <!--NOTIFICATIONS-->
                <div id="notificationsSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Notifications</h1>
                        <p>Gérez les notifications de la plateforme.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-body" style="text-align:center;padding:3rem"><i
                                class="bi bi-bell-fill" style="font-size:3rem;color:var(--border)"></i>
                            <p style="color:var(--text-muted);margin-top:1rem">Section en cours de développement</p>
                        </div>
                    </div>
                </div>

                <!-- ====== PARAMÈTRES ====== -->
                <div id="parametresSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Paramètres</h1>
                        <p>Configurez votre espace de travail et les préférences de la plateforme.</p>
                    </div>

                    <div class="row g-3">
                        <!-- Apparence -->
                        <div class="col-lg-6 anim-2">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-palette-fill"></i></div>
                                    <h5>Apparence</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Thème</div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label"><i class="bi bi-moon-stars-fill me-2"
                                                    style="color:var(--blue)"></i>Mode sombre</div>
                                            <div class="dm-toggle-sub">Réduit la luminosité pour un confort visuel
                                                optimal</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="darkModeToggle"
                                                onchange="toggleDarkMode(this.checked)">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>

                                    <div class="settings-section-title mt-2">Langue de l'interface</div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label"><i class="bi bi-translate me-2"
                                                    style="color:var(--blue)"></i>Langue</div>
                                            <div class="dm-toggle-sub">Langue d'affichage du tableau de bord</div>
                                        </div>
                                        <select class="filter-select" style="min-width:120px">
                                            <option selected>🇫🇷 Français</option>
                                            <option>🇬🇧 English</option>
                                        </select>
                                    </div>

                                    <div class="settings-section-title mt-2">Densité d'affichage</div>
                                    <div class="d-flex gap-2">
                                        <button class="btn-add"
                                            style="flex:1;justify-content:center;background:var(--blue)">Confortable</button>
                                        <button class="btn-add"
                                            style="flex:1;justify-content:center;background:var(--bg);color:var(--text-mid);border:1.5px solid var(--border)">Compact</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="col-lg-6 anim-3">
                            <div class="cf-card h-100">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
                                    <h5>Notifications</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-2">
                                    <div class="settings-section-title">Alertes système</div>
                                    <div class="dm-toggle-wrap mb-2">
                                        <div>
                                            <div class="dm-toggle-label">Nouveau signalement</div>
                                            <div class="dm-toggle-sub">Recevoir une alerte à chaque nouveau
                                                signalement</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                    <div class="dm-toggle-wrap mb-2">
                                        <div>
                                            <div class="dm-toggle-label">Commentaires à modérer</div>
                                            <div class="dm-toggle-sub">Alerte pour les commentaires en attente</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                    <div class="dm-toggle-wrap">
                                        <div>
                                            <div class="dm-toggle-label">Rapport quotidien</div>
                                            <div class="dm-toggle-sub">Résumé journalier par email</div>
                                        </div>
                                        <label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Compte -->
                        <div class="col-lg-6 anim-4">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"><i class="bi bi-person-fill"></i></div>
                                    <h5>Mon compte</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Informations personnelles</div>
                                    <div class="row g-2">
                                        <div class="col-6"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Prénom</label><input
                                                type="text" class="form-control" value="Admin"></div>
                                        <div class="col-6"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Nom</label><input
                                                type="text" class="form-control" value="User"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Adresse
                                                email</label><input type="email" class="form-control"
                                                value="admin@smartcity-douala.cm"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Téléphone</label><input
                                                type="tel" class="form-control"
                                                placeholder="Ex: +237 6 00 00 00 00"></div>
                                    </div>
                                    <button class="btn-add" style="align-self:flex-start"><i
                                            class="bi bi-save-fill"></i> Enregistrer</button>
                                </div>
                            </div>
                        </div>

                        <!-- Sécurité -->
                        <div class="col-lg-6 anim-5">
                            <div class="cf-card">
                                <div class="cf-card-header">
                                    <div class="card-icon-header"
                                        style="background:var(--red-light);color:var(--red)"><i
                                            class="bi bi-shield-lock-fill"></i></div>
                                    <h5>Sécurité</h5>
                                </div>
                                <div class="cf-card-body d-flex flex-column gap-3">
                                    <div class="settings-section-title">Changer le mot de passe</div>
                                    <div class="row g-2">
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Mot
                                                de passe actuel</label><input type="password" class="form-control"
                                                placeholder="••••••••"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Nouveau
                                                mot de passe</label><input type="password" class="form-control"
                                                placeholder="••••••••"></div>
                                        <div class="col-12"><label class="form-label"
                                                style="font-size:.78rem;font-weight:700;color:var(--text-muted)">Confirmer</label><input
                                                type="password" class="form-control" placeholder="••••••••"></div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2"
                                        style="padding:.75rem 1rem;background:var(--red-light);border-radius:10px;border:1px solid rgba(220,38,38,.2)">
                                        <i class="bi bi-exclamation-triangle-fill"
                                            style="color:var(--red);font-size:1rem"></i>
                                        <span style="font-size:.78rem;color:var(--red);font-weight:600">Choisissez un
                                            mot de passe fort d'au moins 12 caractères.</span>
                                    </div>
                                    <button class="btn-add" style="align-self:flex-start;background:var(--red)"><i
                                            class="bi bi-lock-fill"></i> Mettre à jour</button>
                                </div>
                            </div>
                        </div>

                        <!-- Déconnexion danger zone -->
                        <div class="col-12 anim-6">
                            <div class="cf-card" style="border-color:rgba(220,38,38,.3)">
                                <div class="cf-card-header" style="background:var(--red-light)">
                                    <div class="card-icon-header"
                                        style="background:rgba(220,38,38,.2);color:var(--red)"><i
                                            class="bi bi-exclamation-octagon-fill"></i></div>
                                    <h5 style="color:var(--red)">Zone de danger</h5>
                                </div>
                                <div class="cf-card-body d-flex align-items-center gap-4 flex-wrap">
                                    <div>
                                        <div style="font-weight:700;font-size:.9rem;color:var(--text-dark)">Se
                                            déconnecter</div>
                                        <div style="font-size:.8rem;color:var(--text-muted);margin-top:.2rem">Terminer
                                            la session admin en cours.</div>
                                    </div>
                                    <button class="btn-add ms-auto" style="background:var(--red)"
                                        onclick="handleLogout()"><i class="bi bi-box-arrow-right"></i>
                                        Déconnexion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== RÔLES ====== -->
                <div id="rolesSection" class="page-section">
                    <div class="page-header anim-1">
                        <h1>Rôles &amp; Accès</h1>
                        <p>Gérez les permissions.</p>
                    </div>
                    <div class="cf-card">
                        <div class="cf-card-body" style="text-align:center;padding:3rem"><i
                                class="bi bi-shield-lock-fill" style="font-size:3rem;color:var(--border)"></i>
                            <p style="color:var(--text-muted);margin-top:1rem">Section en cours de développement</p>
                        </div>
                    </div>
                </div>

            </div><!-- end page-content -->
        </div><!-- end main-area -->
    </div><!-- end admin-wrap -->

    <!-- ====== MODALS ====== -->
    <div class="modal fade" id="viewIncidentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Détails de l'incident</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><strong>ID :</strong> <span class="incident-id">#CF-1284</span></div>
                    <div class="mb-3"><strong>Titre :</strong> Nid-de-poule profond</div>
                    <div class="mb-3"><strong>Localisation :</strong> Rue Joss, Akwa</div>
                    <div class="mb-3"><strong>Catégorie :</strong> <span class="cat-pill nid">Nid-de-poule</span>
                    </div>
                    <div class="mb-3"><strong>Statut :</strong> <span class="status-badge new"><span
                                class="dot"></span>Nouveau</span></div>
                    <div class="mb-3"><strong>Priorité :</strong> <span class="prio high">● Haute</span></div>
                    <div class="mb-3"><strong>Date :</strong> Il y a 4 min</div>
                    <div class="mb-0"><strong>Description :</strong> Un nid-de-poule très profond et dangereux pour
                        les usagers de la route.</div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Fermer</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editIncidentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier l'incident</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Titre</label><input type="text"
                            class="form-control" value="Nid-de-poule profond"></div>
                    <div class="mb-3"><label class="form-label">Localisation</label><input type="text"
                            class="form-control" value="Rue Joss, Akwa"></div>
                    <div class="mb-3"><label class="form-label">Catégorie</label><select class="form-select">
                            <option selected>Nid-de-poule</option>
                            <option>Éclairage</option>
                            <option>Ordures</option>
                            <option>Fuite d'eau</option>
                        </select></div>
                    <div class="mb-3"><label class="form-label">Statut</label><select class="form-select">
                            <option selected>Nouveau</option>
                            <option>En cours</option>
                            <option>Résolu</option>
                            <option>Rejeté</option>
                        </select></div>
                    <div class="mb-3"><label class="form-label">Priorité</label><select class="form-select">
                            <option selected>Haute</option>
                            <option>Moyenne</option>
                            <option>Basse</option>
                        </select></div>
                    <div class="mb-0"><label class="form-label">Description</label>
                        <textarea class="form-control" rows="3">Un nid-de-poule très profond et dangereux pour les usagers de la route.</textarea>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Annuler</button><button type="button"
                        class="btn btn-primary">Enregistrer</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteIncidentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer l'incident</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cet incident ? Cette action est irréversible.</p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Annuler</button><button type="button"
                        class="btn btn-danger">Supprimer</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAgentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un agent</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">ID / Matricule</label><input type="text"
                            class="form-control" placeholder="Ex: A-042"></div>
                    <div class="mb-3"><label class="form-label">Nom</label><input type="text"
                            class="form-control" placeholder="Nom de famille"></div>
                    <div class="mb-3"><label class="form-label">Prénom</label><input type="text"
                            class="form-control" placeholder="Prénom"></div>
                    <div class="mb-3"><label class="form-label">Numéro de téléphone</label><input type="text"
                            class="form-control" placeholder="Ex: 6 50 00 00 00"></div>
                    <div class="mb-3"><label class="form-label">Zone de travail</label><input type="text"
                            class="form-control" placeholder="Ex: Akwa Nord"></div>
                    <div class="mb-3"><label class="form-label">Durée de travail (h/j)</label><input
                            type="text" class="form-control" placeholder="Ex: 8h"></div>
                    <div class="mb-0"><label class="form-label">Date de prise de poste</label><input
                            type="date" class="form-control"></div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Annuler</button><button type="button"
                        class="btn btn-primary">Ajouter</button></div>
            </div>
        </div>
    </div>

    <!-- Modal déconnexion confirmation -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center" style="padding:2rem">
                    <div
                        style="width:60px;height:60px;background:var(--red-light);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:1.5rem;color:var(--red)">
                        <i class="bi bi-box-arrow-right"></i></div>
                    <h5 style="font-weight:800;margin-bottom:.5rem">Déconnexion</h5>
                    <p style="color:var(--text-muted);font-size:.85rem">Voulez-vous vraiment mettre fin à votre
                        session ?</p>
                </div>
                <div class="modal-footer justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger"><i
                            class="bi bi-box-arrow-right me-1"></i>Confirmer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/leaflet.markercluster.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <script>
        /*INCIDENTS DATA*/
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
    </script>
</body>

</html>
