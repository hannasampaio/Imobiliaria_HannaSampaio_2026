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

            <img src="{{ asset('images/logo.png') }}"
                 alt="Hanna Imobiliária"
                 style="width: 190px; max-width: 100%; display: block; margin: 0 auto 22px auto;">

            <h2 class="text-2xl font-bold" style="color:#0b1f3a;">
                Redefinir palavra-passe
            </h2>

            <p class="text-sm text-gray-600 mt-2">
                Crie uma nova palavra-passe para recuperar o acesso ao sistema.
            </p>

        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden"
                   name="token"
                   value="{{ $request->route('token') }}">

            <div>
                <x-input-label for="email" :value="'Email'" />

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

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                class="w-full mt-5 py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2"
                style="background:#0b1f3a; min-height:44px;">

                <i class="bi bi-key-fill"
                   style="color:#c9a227;"></i>

                Redefinir palavra-passe

            </button>

            <div class="mt-6 pt-5 text-center"
                 style="border-top:1px solid #e5e7eb;">

                <a href="{{ route('login') }}"
                   class="text-sm font-semibold"
                   style="color:#c9a227;">

                    <i class="bi bi-arrow-left-circle-fill me-1"></i>

                    Voltar ao login

                </a>

            </div>

        </form>

    </div>

</x-guest-layout>

