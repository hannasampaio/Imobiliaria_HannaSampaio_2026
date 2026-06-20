<x-guest-layout
    title="Redefinir palavra-passe"
    subtitle="Crie uma nova palavra-passe para recuperar o acesso ao sistema.">
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}">
        <div>
            <x-input-label
                for="email"
                :value="'Email'" />
            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-lg"
                type="email"
                name="email"
                :value="old('email', $request->email)"
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
                :value="'Nova palavra-passe'" />

            <div class="password-wrapper">
                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-lg"
                    type="password"
                    name="password"
                    placeholder="Digite a nova palavra-passe"
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
        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                :value="'Confirmar palavra-passe'" />

            <div class="password-wrapper">
                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full rounded-lg"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirme a nova palavra-passe"
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
            class="w-full mt-5 py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2 auth-button">
            <i class="bi bi-key-fill"></i>
            Redefinir palavra-passe
        </button>
        <div class="mt-6 pt-5 text-center auth-divider">
            <a
                href="{{ route('login') }}"
                class="auth-link">
                <i class="bi bi-arrow-left-circle-fill me-1"></i>
                Voltar ao login
            </a>
        </div>
    </form>
</x-guest-layout>
