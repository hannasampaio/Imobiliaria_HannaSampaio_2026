<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanna Imobiliária</title>
    <link rel="icon" href="{{ asset('images/logo.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --navy: #0b1f3a;
            --navy-light: #12345a;
            --gold: #c9a227;
            --gold-light: #e6c766;
            --bg: #f4f6f8;
            --text: #1f2937;
            --muted: #6b7280;
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: Arial, sans-serif;
            color: var(--text);
        }

        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--navy), #07182d);
            color: white;
            padding: 28px 18px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            box-shadow: 8px 0 30px rgba(0, 0, 0, .18);
        }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .sidebar-logo img {
            width: 150px;
            background: white;
            padding: 12px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .2);
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, .82);
            text-decoration: none;
            padding: 13px 16px;
            border-radius: 14px;
            margin-bottom: 8px;
            font-weight: 600;
            transition: .2s;
        }

        .sidebar-menu a i {
            color: var(--gold);
            font-size: 18px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--navy);
        }

        .sidebar-menu a:hover i,
        .sidebar-menu a.active i {
            color: var(--navy);
        }

        .sidebar-user {
            position: absolute;
            bottom: 28px;
            left: 18px;
            right: 18px;
        }

        .user-box {
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 16px;
            padding: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
            background: rgba(255, 255, 255, .06);
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--gold);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .logout-btn {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, .82);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 4px;
        }

        .logout-btn i {
            color: var(--gold);
        }

        .main-content {
            margin-left: 280px;
            width: calc(100% - 280px);
            min-height: 100vh;
        }

        .topbar {
            height: 78px;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(10px);
        }

        .topbar h1 {
            font-size: 24px;
            font-weight: 800;
            color: var(--navy);
            margin: 0;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: var(--navy);
        }

        .content-wrapper {
            padding: 32px;
        }

        .page-card {
            background: rgba(255, 255, 255, .96);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, .08);
            border: 1px solid rgba(255, 255, 255, .7);
        }

        .btn-gold {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--navy);
            font-weight: 700;
        }

        .btn-gold:hover {
            background: #b89121;
            border-color: #b89121;
            color: white;
        }

        .btn-outline-primary {
            color: var(--navy);
            border-color: var(--navy);
        }

        .btn-outline-primary:hover {
            background: var(--navy);
            border-color: var(--navy);
            color: white;
        }

        .alert {
            border-radius: 14px;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 230px;
            }

            .main-content {
                margin-left: 230px;
                width: calc(100% - 230px);
            }

            .sidebar-logo img {
                width: 120px;
            }
        }

        .pagination {
            --bs-pagination-color: #0b1f3a;
            --bs-pagination-hover-color: #0b1f3a;
            --bs-pagination-focus-color: #0b1f3a;

            --bs-pagination-active-bg: #c9a227;
            --bs-pagination-active-border-color: #c9a227;
            --bs-pagination-active-color: #0b1f3a;

            --bs-pagination-hover-bg: #f5ead0;
            --bs-pagination-hover-border-color: #c9a227;

            --bs-pagination-focus-box-shadow: 0 0 0 0.2rem rgba(201, 162, 39, .25);
        }

        .page-link {
            font-weight: 600;
        }

        .page-item.active .page-link {
            font-weight: 700;
        }

        .btn-report {
            color: #0b1f3a;
            border: 2px solid #c9a227;
            background: white;
            font-weight: 600;
            transition: .25s;
        }

        .btn-report i {
            color: #c9a227;
        }

        .btn-report:hover {
            background: #c9a227;
            color: #0b1f3a;
            border-color: #c9a227;
        }

        .btn-report:hover i {
            color: #0b1f3a;
        }

        .custom-toast-success {
            background: linear-gradient(135deg, #0b1f3a, #12345a);
            color: white;
            border-left: 5px solid #c9a227 !important;
            border-radius: 16px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, .22);
            font-weight: 600;
        }

        .custom-toast-error {
            background: linear-gradient(135deg, #7f1d1d, #b91c1c);
            color: white;
            border-left: 5px solid #facc15 !important;
            border-radius: 16px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, .22);
            font-weight: 600;
        }

        .toast {
            min-width: 340px;
            animation: slideInToast .35s ease-out;
        }

        @keyframes slideInToast {
            from {
                opacity: 0;
                transform: translateX(35px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>

    <div class="app-layout">

        <aside class="sidebar">

            <div class="sidebar-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Hanna Imobiliária">
            </div>

            <nav class="sidebar-menu">

                @if (Auth::user()->role !== 'cliente')
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-fill"></i>
                        Dashboard
                    </a>

                    <a href="{{ route('clientes.index') }}"
                        class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        Clientes
                    </a>
                @endif

                <a href="{{ route('apartamentos.index') }}"
                    class="{{ request()->routeIs('apartamentos.*') ? 'active' : '' }}">
                    <i class="bi bi-buildings"></i>

                    @if (Auth::user()->role === 'cliente')
                        Apartamentos Disponíveis
                    @else
                        Apartamentos
                    @endif

                </a>

                @if (Auth::user()->role !== 'cliente')
                    <a href="{{ route('vendas.index') }}" class="{{ request()->routeIs('vendas.*') ? 'active' : '' }}">
                        <i class="bi bi-cash-coin"></i>
                        Vendas
                    </a>
                @endif

            </nav>

            @auth
                <div class="sidebar-user">

                    <div class="user-box">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <div style="font-weight:700;">
                                {{ Auth::user()->name }}
                            </div>

                            <small style="color:rgba(255,255,255,.65);">

                                @if (Auth::user()->role === 'admin')
                                    Administrador
                                @elseif (Auth::user()->role === 'vendedor')
                                    Vendedor
                                @else
                                    Cliente
                                @endif

                            </small>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i>
                            Sair do sistema
                        </button>
                    </form>

                </div>
            @endauth

        </aside>

        <main class="main-content">

            <header class="topbar">

                <div>
                    <h1>Painel de Gestão</h1>
                    <small class="text-muted">
                        Hanna Imobiliária
                    </small>
                </div>

                @auth
                    <div class="topbar-user">
                        <i class="bi bi-person-circle" style="color:#c9a227; font-size:26px;"></i>
                        {{ Auth::user()->name }}
                    </div>
                @endauth

            </header>

            <div class="content-wrapper">

                <div class="toast-container position-fixed top-0 end-0 p-4" style="z-index: 9999;">

                    @if (session('success'))
                        <div class="toast align-items-center border-0 show custom-toast-success" role="alert"
                            aria-live="assertive" aria-atomic="true">

                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {{ session('success') }}
                                </div>

                                <button type="button" class="btn-close btn-close-white me-3 m-auto"
                                    data-bs-dismiss="toast" aria-label="Fechar"></button>
                            </div>

                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="toast align-items-center border-0 show custom-toast-error" role="alert"
                            aria-live="assertive" aria-atomic="true">

                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>

                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>

                                <button type="button" class="btn-close btn-close-white me-3 m-auto"
                                    data-bs-dismiss="toast" aria-label="Fechar"></button>
                            </div>

                        </div>
                    @endif

                </div>

                <div class="page-card">
                    @yield('content')
                </div>

            </div>

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Toasts Bootstrap
            const toastElements = document.querySelectorAll('.toast');

            toastElements.forEach(function(toastElement) {
                const toast = new bootstrap.Toast(toastElement, {
                    delay: 4000
                });

                toast.show();
            });

            // SweetAlert para eliminar
            document.querySelectorAll('.delete-form').forEach(function(form) {

                form.addEventListener('submit', function(e) {

                    e.preventDefault();

                    Swal.fire({
                        title: 'Eliminar registo?',
                        text: 'Esta ação não pode ser desfeita.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#c9a227',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sim, eliminar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
                    }).then((result) => {

                        if (result.isConfirmed) {
                            form.submit();
                        }

                    });

                });

            });

        });
    </script>

</body>

</html>
