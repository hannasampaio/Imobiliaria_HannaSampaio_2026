<x-guest-layout
    title="Recuperar acesso"
    subtitle="Indique o seu email para receber o link de recuperação da palavra-passe.">
    <x-auth-session-status
        class="mb-4"
        :status="session('status')" />
    <form method="POST" action="{{ route('password.email') }}">
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
                autofocus />
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />
        </div>
        <button
            type="submit"
            class="w-full mt-5 py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2 auth-button">
            <i class="bi bi-envelope-check-fill"></i>
            Enviar link de recuperação
        </button>
        <div class="mt-6 pt-5 text-center auth-divider">
            <a href="{{ route('login') }}"
               class="auth-link">
                <i class="bi bi-arrow-left-circle-fill me-1"></i>
                Voltar ao login
            </a>
        </div>
    </form>
</x-guest-layout>
