<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg: #07030a;
            --panel: rgba(21, 8, 18, 0.94);
            --panel-2: rgba(9, 5, 12, 0.98);
            --red: #ff174d;
            --red-soft: #ff5577;
            --text: #f7edf1;
            --muted: #b9a1aa;
            --line: rgba(255, 23, 77, 0.30);
        }

        body {
            background:
                radial-gradient(circle at 20% 8%, rgba(255, 23, 77, 0.20), transparent 27%),
                radial-gradient(circle at 100% 0%, rgba(255, 255, 255, 0.06), transparent 23%),
                linear-gradient(135deg, #07030a 0%, #17020b 58%, #050307 100%);
            color: var(--text);
            font-size: 14px;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image: linear-gradient(rgba(255, 23, 77, 0.055) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 23, 77, 0.045) 1px, transparent 1px);
            background-size: 44px 44px;
            z-index: -1;
        }

        .header {
            background: linear-gradient(135deg, rgba(255, 23, 77, 0.26), rgba(10, 4, 13, 0.95));
            color: #ffffff;
            padding: 14px 22px;
            border-bottom: 1px solid var(--line);
            box-shadow: 0 0 28px rgba(255, 23, 77, 0.20);
        }

        .header-title {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 0.03em;
            margin: 0;
            text-shadow: 0 0 12px rgba(255, 23, 77, 0.9);
        }

        .header-sub { font-size: 11px; color: var(--muted); margin: 0; }

        .sidebar {
            width: 230px;
            min-height: calc(100vh - 58px);
            background: rgba(12, 6, 15, 0.94);
            border-right: 1px solid var(--line);
            padding: 16px 0;
            flex-shrink: 0;
            box-shadow: 16px 0 42px rgba(0, 0, 0, 0.32);
        }

        .avatar-area { padding: 0 14px 16px; border-bottom: 1px solid rgba(255, 23, 77, 0.18); margin-bottom: 12px; }
        .avatar-circle { width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid var(--red); box-shadow: 0 0 18px rgba(255, 23, 77, 0.45); margin-bottom: 8px; }
        .avatar-greeting { font-size: 11px; color: var(--muted); margin: 0; }
        .avatar-name { font-size: 13px; font-weight: 700; color: var(--text); margin: 0; }
        .sidebar-label { font-size: 10px; color: var(--red-soft); padding: 0 14px 8px; text-transform: uppercase; letter-spacing: 0.09em; font-weight: 800; }

        .nav-item {
            padding: 10px 14px;
            font-size: 13px;
            color: var(--muted);
            border-left: 2px solid transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: .18s ease;
        }

        .nav-item:hover { background: rgba(255, 23, 77, 0.12); color: #fff; }
        .nav-item.active { background: rgba(255, 23, 77, 0.18); color: #fff; border-left-color: var(--red); font-weight: 800; box-shadow: inset 0 0 18px rgba(255,23,77,.08); }
        .sidebar-bottom { padding: 12px 14px 0; border-top: 1px solid rgba(255, 23, 77, 0.18); margin-top: auto; }
        .main-content { flex: 1; padding: 24px; }

        .card {
            background: var(--panel) !important;
            border: 1px solid var(--line) !important;
            color: var(--text);
            border-radius: 16px;
            box-shadow: 0 18px 46px rgba(0,0,0,.34), 0 0 22px rgba(255,23,77,.12) !important;
        }

        .table { --bs-table-bg: transparent; --bs-table-color: var(--text); --bs-table-hover-bg: rgba(255, 23, 77, .10); --bs-table-hover-color: #fff; color: var(--text); }
        .table thead tr { background: rgba(255,23,77,.14) !important; }
        .table th { color: var(--red-soft) !important; border-color: rgba(255, 23, 77, 0.20) !important; }
        .table td { border-color: rgba(255, 23, 77, 0.16) !important; color: #eadbe1 !important; }
        .form-control, .form-select, textarea { background: rgba(4, 2, 7, .80) !important; color: #fff !important; border: 1px solid rgba(255,23,77,.30) !important; }
        .form-control:focus, .form-select:focus, textarea:focus { border-color: var(--red) !important; box-shadow: 0 0 0 .2rem rgba(255,23,77,.20) !important; }
        .form-label, h1, h2, h3, h4, h5, h6 { color: var(--text) !important; }
        .form-text { color: var(--muted) !important; }
        .btn-success, .btn-primary { background: linear-gradient(135deg, #ff174d, #7a001e) !important; border-color: rgba(255,23,77,.65) !important; box-shadow: 0 0 16px rgba(255,23,77,.25); }
        .btn-success:hover, .btn-primary:hover { box-shadow: 0 0 26px rgba(255,23,77,.45); }
        .alert-success { background: rgba(20, 255, 155, .12); color: #baffdf; border-color: rgba(20,255,155,.28); }
        .alert-danger { background: rgba(255, 23, 77, .14); color: #ffd6df; border-color: rgba(255,23,77,.32); }
    </style>
</head>
<body>
    <div class="header d-flex align-items-center">
        <div>
            <p class="header-title">Sistem Manajemen Blog</p>
        </div>
    </div>

    <div class="d-flex">
        <div class="sidebar d-flex flex-column">
            <div class="avatar-area">
                <img
                    src="{{ asset('storage/foto/' . (Auth::user()->foto ?? 'default.png')) }}"
                    alt="Foto Profil"
                    class="avatar-circle"
                >
                <p class="avatar-greeting">Halo,</p>
                <p class="avatar-name">
                    {{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}
                </p>
            </div>

            <div class="sidebar-label">Menu Utama</div>

            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('artikel.index') }}" class="nav-item {{ request()->routeIs('artikel.*') ? 'active' : '' }}">
                Kelola Artikel
            </a>
            <a href="{{ route('penulis.index') }}" class="nav-item {{ request()->routeIs('penulis.*') ? 'active' : '' }}">
                Kelola Penulis
            </a>
            <a href="{{ route('kategori.index') }}" class="nav-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                Kelola Kategori
            </a>

            <div class="sidebar-bottom mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-sm w-100"
                        style="background-color:#fff0f0; color:#c0392b; border: 1px solid #f5c6c6;">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <div class="main-content">
            @if(session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
