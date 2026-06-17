```blade
<x-guest-layout>

<div style="
    width: 460px;
    max-width: 100%;
    background: rgba(255, 255, 255, 0.96);
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.28);
">

    <div class="text-center mb-6">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Hanna Imobiliária"
            style="
                width: 200px;
                max-width: 100%;
                display: block;
                margin: 0 auto 22px auto;
            ">

        <h2 class="text-2xl font-bold" style="color:#0b1f3a;">
            Acesso ao sistema
        </h2>

        <p class="text-sm text-gray-600 mt-1">
            Faça login para continuar
        </p>

    </div>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label
                for="email"
                :value="'Email'" />

            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-lg"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Digite o seu email"
                required
                autofocus
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />
        </div>

        <div class="mt-4">

            <x-input-label
                for="password"
                :value="'Palavra-passe'" />

            <div class="password-wrapper">

                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-lg"
                    type="password"
                    name="password"
                    placeholder="Digite a sua palavra-passe"
                    required
                    autocomplete="current-password" />

                <button
                    type="button"
                    class="password-toggle"
                    data-target="password">

                    <i class="bi bi-eye"></i>

                </button>

            </div>

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        <div class="flex items-center justify-between mt-4">

            <label for="remember_me" class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 shadow-sm">

                <span class="ms-2 text-sm text-gray-600">
                    Lembrar-me
                </span>

            </label>

            @if (Route::has('password.request'))

                <a href="{{ route('password.request') }}"
                   class="text-sm font-semibold"
                   style="color:#c9a227;">

                    Esqueceu a palavra-passe?

                </a>

            @endif

        </div>

        <button
            type="submit"
            class="w-full mt-5 py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2"
            style="
                background:#0b1f3a;
                min-height:44px;
            ">

            <i class="bi bi-box-arrow-in-right"
               style="color:#c9a227;"></i>

            Entrar

        </button>

        <div class="mt-6 pt-5 text-center"
             style="border-top:1px solid #e5e7eb;">

            <p class="text-sm text-gray-600 mb-2">
                Ainda não tem uma conta?
            </p>

            <a href="{{ route('register') }}"
               class="text-sm font-semibold"
               style="color:#c9a227;">

                <i class="bi bi-person-plus-fill me-1"></i>

                Criar conta

            </a>

        </div>

    </form>

</div>

</x-guest-layout>
```
