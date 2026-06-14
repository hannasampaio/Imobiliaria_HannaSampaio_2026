<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanna Imobiliária</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --azul-marinho: #0b1f3a;
            --dourado: #c9a227;
            --cinza-claro: #f4f6f8;
        }

        body {
            background-color: var(--cinza-claro);
            font-family: Arial, sans-serif;
        }

        .navbar-custom {
            background-color: var(--azul-marinho);
        }

        .navbar-brand {
            font-weight: bold;
            color: white;
            letter-spacing: 0.5px;
        }

        .navbar-brand:hover {
            color: white;
        }

        .navbar-brand span {
            color: var(--dourado);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            transition: 0.2s;
        }

        .nav-link:hover {
            color: var(--dourado);
        }

        .page-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .btn-gold {
            background-color: var(--dourado);
            border-color: var(--dourado);
            color: white;
        }

        .btn-gold:hover {
            background-color: #b08c20;
            border-color: #b08c20;
            color: white;
        }

        .user-dropdown {
            margin-left: 100px;
        }

        .user-dropdown .dropdown-toggle {
            color: white;
            font-weight: 600;
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-dropdown .dropdown-toggle:hover {
            color: var(--dourado);
        }

        .user-dropdown .dropdown-toggle:focus {
            box-shadow: none;
        }

        .user-dropdown .dropdown-menu {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid px-4">

            <a class="navbar-brand" href="{{ route('dashboard') }}">
                Hanna <span>Imobiliária</span>
            </a>

            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('clientes.index') }}">
                    Clientes
                </a>

                <a class="nav-link" href="{{ route('apartamentos.index') }}">
                    Apartamentos
                </a>

                <a class="nav-link" href="{{ route('vendas.index') }}">
                    Vendas
                </a>
            </div>

            @auth

                <div class="dropdown user-dropdown ms-5">

                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <i class="bi bi-person-circle"></i>

                        {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow">

                        <li>
                            <span class="dropdown-item-text text-muted">
                                Utilizador autenticado
                            </span>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="dropdown-item text-danger">

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    Terminar Sessão

                                </button>
                            </form>
                        </li>

                    </ul>

                </div>

            @endauth

        </div>
    </nav>

    <div class="container mt-4 mb-5">

        @if (session('success'))
            <div class="alert alert-success shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="page-card">
            @yield('content')
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

</body>

</html>
