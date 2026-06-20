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
    <link rel="stylesheet" href="{{ asset('css/hanna-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hanna-pages.css') }}">
</head>

<body>
    <div class="app-layout">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Hanna Imobiliária" class="img-fluid">
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
                            <div class="user-name-wrapper">
                                {{ Auth::user()->name }}
                            </div>
                            <small class="user-role-text">
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
                        <i class="bi bi-person-circle"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                @endauth
            </header>
            <div class="content-wrapper">
                <div class="page-card">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.HannaApp = {
            success: @json(session('success')),
            error: @json($errors->first())
        };
    </script>
    <script src="{{ asset('js/hanna-layout.js') }}"></script>
</body>
</html>