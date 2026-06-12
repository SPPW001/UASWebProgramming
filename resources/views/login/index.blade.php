<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — RBlog Neon</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --bg-dark: #07070c;
            --bg-card: rgba(18, 8, 14, 0.86);
            --red-main: #ff003c;
            --red-soft: #ff4d6d;
            --red-dark: #7a001e;
            --text-main: #fff3f6;
            --text-muted: #b98994;
            --border-neon: rgba(255, 0, 60, 0.45);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--text-main);
            background:
                radial-gradient(circle at 20% 20%, rgba(255, 0, 60, 0.22), transparent 28%),
                radial-gradient(circle at 80% 80%, rgba(255, 0, 60, 0.14), transparent 30%),
                linear-gradient(135deg, #050507 0%, #12050a 45%, #050507 100%);
            overflow-x: hidden;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(255, 0, 60, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 0, 60, 0.05) 1px, transparent 1px);
            background-size: 42px 42px;
            mask-image: linear-gradient(to bottom, rgba(0,0,0,0.9), transparent);
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background: repeating-linear-gradient(
                to bottom,
                rgba(255, 255, 255, 0.025) 0px,
                rgba(255, 255, 255, 0.025) 1px,
                transparent 1px,
                transparent 4px
            );
            opacity: 0.28;
        }

        .login-wrapper {
            position: relative;
            z-index: 2;
        }

        .brand-glitch {
            text-align: center;
            margin-bottom: 22px;
        }

        .brand-glitch h1 {
            margin: 0;
            font-size: 34px;
            letter-spacing: 3px;
            font-weight: 800;
            color: #fff;
            text-transform: uppercase;
            text-shadow:
                0 0 8px rgba(255, 0, 60, 0.9),
                0 0 20px rgba(255, 0, 60, 0.55),
                0 0 42px rgba(255, 0, 60, 0.35);
        }

        .brand-glitch p {
            margin-top: 8px;
            color: var(--text-muted);
            font-size: 13px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .card {
            border: 1px solid var(--border-neon);
            border-radius: 22px;
            background:
                linear-gradient(145deg, rgba(24, 8, 14, 0.94), rgba(10, 6, 10, 0.94));
            box-shadow:
                0 0 0 1px rgba(255, 0, 60, 0.12),
                0 0 32px rgba(255, 0, 60, 0.28),
                0 20px 70px rgba(0, 0, 0, 0.72);
            backdrop-filter: blur(14px);
            overflow: hidden;
        }

        .card::before {
            content: "";
            display: block;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--red-main), var(--red-soft), var(--red-main), transparent);
            box-shadow: 0 0 18px rgba(255, 0, 60, 0.9);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(255, 0, 60, 0.18);
            padding: 28px 32px 16px;
        }

        .card-header h5 {
            color: #fff;
            font-size: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-shadow: 0 0 14px rgba(255, 0, 60, 0.75);
        }

        .card-header p {
            color: var(--text-muted) !important;
        }

        .card-body {
            padding: 26px 32px 34px;
        }

        .form-label {
            color: #ffd7de;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .form-control {
            color: var(--text-main);
            background-color: rgba(7, 7, 12, 0.88);
            border: 1px solid rgba(255, 0, 60, 0.34);
            border-radius: 14px;
            padding: 12px 14px;
            box-shadow: inset 0 0 18px rgba(255, 0, 60, 0.05);
        }

        .form-control::placeholder {
            color: rgba(255, 215, 222, 0.35);
        }

        .form-control:focus {
            color: #fff;
            background-color: rgba(12, 7, 11, 0.96);
            border-color: var(--red-main);
            box-shadow:
                0 0 0 0.18rem rgba(255, 0, 60, 0.18),
                0 0 22px rgba(255, 0, 60, 0.38);
        }

        .btn-primary {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 0, 60, 0.8);
            border-radius: 14px;
            background: linear-gradient(135deg, #b0002a, #ff003c, #ff4d6d);
            color: #fff;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 12px 16px;
            box-shadow:
                0 0 18px rgba(255, 0, 60, 0.55),
                0 0 36px rgba(255, 0, 60, 0.22);
        }

        .btn-primary:hover {
            border-color: #ff7a90;
            background: linear-gradient(135deg, #ff003c, #ff4d6d, #ff003c);
            box-shadow:
                0 0 24px rgba(255, 0, 60, 0.75),
                0 0 48px rgba(255, 0, 60, 0.35);
            transform: translateY(-1px);
        }

        .btn-primary::after {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 70%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
            transform: skewX(-25deg);
            transition: 0.5s;
        }

        .btn-primary:hover::after {
            left: 130%;
        }

        .alert-danger {
            color: #ffdce3;
            background: rgba(255, 0, 60, 0.13);
            border: 1px solid rgba(255, 0, 60, 0.45);
            border-radius: 14px;
            box-shadow: 0 0 18px rgba(255, 0, 60, 0.18);
        }

        .btn-close {
            filter: invert(1);
        }

        .login-footer {
            margin-top: 18px;
            text-align: center;
            color: rgba(255, 215, 222, 0.45);
            font-size: 12px;
            letter-spacing: 1px;
        }

        @media (max-width: 576px) {
            .card-header,
            .card-body {
                padding-left: 22px;
                padding-right: 22px;
            }

            .brand-glitch h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="container login-wrapper">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5 col-lg-4">
                <div class="brand-glitch">
                    <h1>RBlog</h1>
                    <p>Artikel seputar teknologi dan pemrograman.</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-1 fw-semibold">Login Admin</h5>
                        <p class="small mb-0">
                            Masukkan Username dan Password untuk mengakses sistem
                        </p>
                    </div>

                    <div class="card-body">
                        @if($errors->has('gagal'))
                            <div class="alert alert-danger alert-dismissible fade show py-2 small" role="alert">
                                {{ $errors->first('gagal') }}

                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert">
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('login.proses') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label
                                    for="user_name"
                                    class="form-label small fw-semibold">
                                    Username
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="user_name"
                                    name="user_name"
                                    value="{{ old('user_name') }}"
                                    placeholder="Masukkan username"
                                    autofocus
                                >
                            </div>

                            <div class="mb-4">
                                <label
                                    for="password"
                                    class="form-label small fw-semibold">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password"
                                >
                            </div>

                            <div class="d-grid">
                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    Masuk Sistem
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>