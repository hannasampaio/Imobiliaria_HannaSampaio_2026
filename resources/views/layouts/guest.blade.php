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

    <style>

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-image:
                linear-gradient(rgba(11, 31, 58, 0.20), rgba(11, 31, 58, 0.20)),
                url('{{ asset('images/login-bg.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .auth-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 28px 15px;
        }

        .auth-footer {
            color: white;
            font-size: 12px;
            opacity: .95;
            margin-top: 22px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            color: #c9a227;
            cursor: pointer;
            font-size: 18px;
        }

        .password-toggle:hover {
            color: #b89121;
        }

    </style>

</head>

<body>

    <div class="auth-page">

        {{ $slot }}

        <p class="auth-footer">
            © 2026 Hanna Imobiliária. Todos os direitos reservados.
        </p>

    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.password-toggle').forEach(button => {

                button.addEventListener('click', function() {

                    const input =
                        document.getElementById(
                            this.dataset.target
                        );

                    const icon =
                        this.querySelector('i');

                    if (input.type === 'password') {

                        input.type = 'text';

                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');

                    } else {

                        input.type = 'password';

                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');

                    }

                });

            });

        });

    </script>

</body>

</html>
