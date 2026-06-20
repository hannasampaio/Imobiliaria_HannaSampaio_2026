<x-guest-layout
    title="Criar conta"
    subtitle="Registe-se para aceder ao sistema">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <x-input-label for="name" :value="'Nome'" />
            <x-text-input
                id="name"
                class="block mt-1 w-full rounded-lg"
                type="text"
                name="name"
                :value="old('name')"
                placeholder="Digite o seu nome"
                required
                autofocus
                autocomplete="name" />
            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2" />
        </div>
        <div class="mt-3">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-lg"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Digite o seu email"
                required
                autocomplete="username" />
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />
        </div>
        <div class="mt-3">
            <x-input-label
                for="password"
                :value="'Palavra-passe'" />
            <div class="password-wrapper">
                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-lg"
                    type="password"
                    name="password"
                    placeholder="Crie uma palavra-passe"
                    required
                    autocomplete="new-password" />
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
        <div class="mt-3">
            <x-input-label
                for="password_confirmation"
                :value="'Confirmar palavra-passe'" />
            <div class="password-wrapper">
                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full rounded-lg"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirme a palavra-passe"
                    required
                    autocomplete="new-password" />
                <button
                    type="button"
                    class="password-toggle"
                    data-target="password_confirmation">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2" />
        </div>
        <button
            type="submit"
            class="w-full mt-4 py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2 auth-button">
            <i class="bi bi-person-plus-fill"></i>
            Criar conta
        </button>
        <div class="mt-4 pt-3 text-center auth-divider">
            <p class="text-sm text-gray-600 mb-2">
                Já tem uma conta?
            </p>
            <a href="{{ route('login') }}"
               class="auth-link">
                <i class="bi bi-person-fill me-1"></i>
                Entrar no sistema
            </a>
        </div>
    </form>
</x-guest-layout>
