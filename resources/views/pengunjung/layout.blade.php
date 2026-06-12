<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RBlog Cyberpunk')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg: #07030a;
            --panel: rgba(21, 8, 18, 0.86);
            --panel-2: rgba(12, 6, 15, 0.94);
            --red: #ff174d;
            --red-soft: #ff5577;
            --text: #f7edf1;
            --muted: #b9a1aa;
            --line: rgba(255, 23, 77, 0.28);
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--text);
            background:
                radial-gradient(circle at 15% 10%, rgba(255, 23, 77, 0.18), transparent 28%),
                radial-gradient(circle at 90% 0%, rgba(255, 255, 255, 0.08), transparent 22%),
                linear-gradient(135deg, #07030a 0%, #17020b 55%, #050307 100%);
            font-size: 14px;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image: linear-gradient(rgba(255, 23, 77, 0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 23, 77, 0.04) 1px, transparent 1px);
            background-size: 42px 42px;
            mask-image: linear-gradient(to bottom, black, transparent 88%);
        }

        a { color: inherit; text-decoration: none; }

        .site-shell { width: min(1100px, calc(100% - 28px)); margin: 0 auto; }

        .neon-header {
            margin: 22px auto 26px;
            border: 1px solid var(--line);
            background: linear-gradient(135deg, rgba(255, 23, 77, 0.18), rgba(10, 4, 13, 0.92));
            box-shadow: 0 0 28px rgba(255, 23, 77, 0.22), inset 0 0 18px rgba(255, 23, 77, 0.08);
            border-radius: 18px;
            padding: 18px 22px;
            position: relative;
            overflow: hidden;
        }

        .neon-header::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.08), transparent);
            transform: translateX(-100%);
            animation: scan 7s infinite;
        }

        @keyframes scan { 0%, 70% { transform: translateX(-100%); } 100% { transform: translateX(100%); } }

        .brand-title { font-size: 24px; font-weight: 800; letter-spacing: .04em; margin: 0; text-shadow: 0 0 14px rgba(255, 23, 77, .8); }
        .brand-sub { color: var(--muted); font-size: 12px; margin: 2px 0 0; }
        .nav-link-cyber { color: var(--muted); font-size: 13px; padding: 8px 10px; border-radius: 999px; }
        .nav-link-cyber:hover, .nav-link-cyber.active { color: #fff; background: rgba(255, 23, 77, .14); box-shadow: 0 0 14px rgba(255, 23, 77, .18); }
        .article-content {
            margin-top: 22px;
            color: #f4d7d7;
            font-size: 16px;
            line-height: 1.9;
        }

        .article-content p {
            margin-bottom: 16px;
        }

        .article-content p:empty,
        .article-content p:has(> br:only-child) {
            display: none;
        }

        .article-content strong {
            color: #ff4d6d;
            text-shadow: 0 0 10px rgba(255, 0, 76, 0.7);
            font-weight: 700;
        }

        .article-content a {
            color: #ff4d6d;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 77, 109, 0.6);
        }

        .article-content ul,
        .article-content ol {
            padding-left: 24px;
            margin-bottom: 16px;
        }

        .article-content img {
            max-width: 100%;
            border-radius: 14px;
            margin: 18px 0;
            border: 1px solid rgba(255, 0, 76, 0.35);
            box-shadow: 0 0 20px rgba(255, 0, 76, 0.25);
        }
        .article-card, .side-card, .detail-card {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: 0 18px 50px rgba(0,0,0,.42), 0 0 24px rgba(255, 23, 77, .12);
            overflow: hidden;
            backdrop-filter: blur(12px);
        }

        .article-card { margin-bottom: 24px; }
        .cover { width: 100%; height: 250px; object-fit: cover; background: linear-gradient(135deg, #26020e, #0a050c); border-bottom: 1px solid var(--line); }
        .cover-detail { height: 360px; }

        .article-body, .detail-body { padding: 22px; }
        .badge-cyber { display: inline-flex; align-items: center; gap: 6px; padding: 6px 10px; border-radius: 999px; color: #fff; background: rgba(255, 23, 77, .18); border: 1px solid rgba(255, 23, 77, .35); font-size: 11px; font-weight: 700; letter-spacing: .03em; }
        .article-title { font-size: 21px; font-weight: 800; line-height: 1.3; margin: 14px 0 8px; }
        .article-title a:hover { color: var(--red-soft); text-shadow: 0 0 10px rgba(255,23,77,.6); }
        .meta { color: var(--muted); font-size: 12px; margin-bottom: 14px; }
        .excerpt, .content { color: #decbd2; line-height: 1.8; }
        .content { white-space: pre-line; }

        .btn-neon { border: 1px solid rgba(255, 23, 77, .65); background: linear-gradient(135deg, #ff174d, #7a001e); color: #fff; border-radius: 999px; padding: 9px 15px; font-size: 12px; font-weight: 800; box-shadow: 0 0 18px rgba(255, 23, 77, .35); }
        .btn-neon:hover { color: #fff; transform: translateY(-1px); box-shadow: 0 0 28px rgba(255, 23, 77, .55); }
        .side-card { padding: 18px; position: sticky; top: 20px; }
        .side-title { font-size: 14px; font-weight: 900; margin-bottom: 14px; letter-spacing: .04em; color: #fff; }
        .category-link { display: flex; justify-content: space-between; align-items: center; gap: 10px; padding: 10px 11px; border-radius: 12px; color: var(--muted); margin-bottom: 8px; border: 1px solid transparent; }
        .category-link:hover, .category-link.active { background: rgba(255, 23, 77, .14); color: #fff; border-color: var(--line); }
        .count-pill { background: rgba(255, 23, 77, .22); border: 1px solid var(--line); color: #fff; font-size: 11px; min-width: 28px; text-align: center; padding: 3px 8px; border-radius: 999px; }
        .related-item { display: grid; grid-template-columns: 76px 1fr; gap: 10px; padding: 10px 0; border-bottom: 1px solid rgba(255, 23, 77, .16); }
        .related-item:last-child { border-bottom: 0; }
        .related-img { width: 76px; height: 56px; object-fit: cover; border-radius: 10px; border: 1px solid var(--line); }
        .related-title { font-size: 12px; font-weight: 800; line-height: 1.35; }
        .related-title:hover { color: var(--red-soft); }
        .empty-state { padding: 30px; border: 1px dashed var(--line); color: var(--muted); border-radius: 16px; background: rgba(255,255,255,.03); }
        .breadcrumb-cyber { color: var(--muted); font-size: 12px; margin-bottom: 14px; }
        .breadcrumb-cyber a { color: var(--red-soft); }
        .footer-cyber { margin: 34px auto 20px; padding: 16px; text-align: center; color: var(--muted); font-size: 12px; border-top: 1px solid var(--line); }

        @media (max-width: 768px) {
            .cover, .cover-detail { height: 210px; }
            .neon-header { padding: 16px; }
            .brand-title { font-size: 20px; }
            .side-card { position: static; }
        }
    </style>
</head>
<body>
    <header class="site-shell neon-header">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 position-relative" style="z-index: 1;">
            <a href="{{ route('pengunjung.index') }}">
                <p class="brand-title">R<span style="color: var(--red-soft);">Blog</span></p>
                <p class="brand-sub">Artikel seputar teknologi dan pemrograman.</p>
            </a>
            <nav class="d-flex gap-2 flex-wrap">
                <a class="nav-link-cyber {{ request()->routeIs('pengunjung.index') ? 'active' : '' }}" href="{{ route('pengunjung.index') }}">Beranda</a>
                <a class="nav-link-cyber" href="{{ route('login') }}">CMS Login</a>
            </nav>
        </div>
    </header>

    <main class="site-shell">
        @yield('content')
    </main>

    <footer class="site-shell footer-cyber">
        © {{ date('Y') }} RBlog Neon. Seluruh artikel ditampilkan dari database db_blog.
    </footer>
</body>
</html>
