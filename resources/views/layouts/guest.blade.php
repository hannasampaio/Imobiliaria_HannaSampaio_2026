@props([
    'title' => null,
    'subtitle' => null,
    'logoWidth' => '200px',
])

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hanna Imobiliária</title>

    <link rel="icon" href="{{ asset('images/logo.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/hanna-auth.css') }}">
</head>

<body style="--login-bg: url('{{ asset('images/login-bg.png') }}');">

    <div class="auth-page">

        @if ($title)

            <div class="auth-card">

                <div class="text-center mb-6">

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Hanna Imobiliária"
                        class="auth-logo"
                        style="width: {{ $logoWidth }};">

                    <h2 class="auth-title">
                        {{ $title }}
                    </h2>

                    @if($subtitle)
                        <p class="auth-subtitle">
                            {{ $subtitle }}
                        </p>
                    @endif

                </div>

                {{ $slot }}

            </div>

        @else

            {{ $slot }}

        @endif

        <p class="auth-footer">
            © 2026 Hanna Imobiliária. Todos os direitos reservados.
        </p>

    </div>

    <script src="{{ asset('js/hanna-auth.js') }}"></script>

</body>

</html>