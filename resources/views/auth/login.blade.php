<x-guest-layout
    title="Acesso ao sistema"
    subtitle="Faça login para continuar">
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
                   class="auth-link">
                    Esqueceu a palavra-passe?
                </a>
            @endif
        </div>
        <button
            type="submit"
            class="w-full mt-5 py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2 auth-button">
            <i class="bi bi-box-arrow-in-right"></i>
            Entrar
        </button>
        <div class="mt-6 pt-5 text-center auth-divider">
            <p class="text-sm text-gray-600 mb-2">
                Ainda não tem uma conta?
            </p>
            <a href="{{ route('register') }}"
               class="auth-link">
                <i class="bi bi-person-plus-fill me-1"></i>
                Criar conta
            </a>
        </div>
    </form>
</x-guest-layout>
