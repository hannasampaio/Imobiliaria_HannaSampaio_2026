<x-guest-layout
    title="Confirmar identidade"
    subtitle="Por motivos de segurança, confirme a sua palavra-passe para continuar.">
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div>
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
        <button
            type="submit"
            class="w-full mt-5 py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2 auth-button">
            <i class="bi bi-shield-lock-fill"></i>
            Confirmar acesso
        </button>
        <div class="mt-6 pt-5 text-center auth-divider">
            <a href="{{ route('dashboard') }}"
               class="auth-link">
                <i class="bi bi-arrow-left-circle-fill me-1"></i>
                Voltar ao sistema
            </a>
        </div>
    </form>
</x-guest-layout>
