<x-guest-layout>

    <div style="
        width: 460px;
        max-width: 95%;
        background: rgba(255, 255, 255, 0.96);
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.28);
    ">

        <div class="text-center mb-3">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Hanna Imobiliária"
                 style="width: 160px; max-width: 100%; display: block; margin: 0 auto 15px auto;">

            <h2 class="text-2xl font-bold" style="color:#0b1f3a;">
                Criar conta
            </h2>

            <p class="text-sm text-gray-600 mt-1">
                Registe-se para aceder ao sistema
            </p>
        </div>

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

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
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

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="password" :value="'Palavra-passe'" />

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

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="password_confirmation" :value="'Confirmar palavra-passe'" />

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

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit"
                    class="w-full mt-4 py-3 rounded-lg text-white font-semibold"
                    style="background:#0b1f3a; height: 36px;">
                Criar conta
            </button>

            <div class="mt-4 pt-3 text-center" style="border-top:1px solid #e5e7eb;">
                <p class="text-sm text-gray-600 mb-2">
                    Já tem uma conta?
                </p>

                <a href="{{ route('login') }}"
                   class="text-sm font-semibold"
                   style="color:#c9a227;">

                    <i class="bi bi-person-fill" style="color:#c9a227;"></i>
                    Entrar no sistema

                </a>
            </div>
        </form>

    </div>

</x-guest-layout>
