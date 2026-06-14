<x-guest-layout>
    <div class="text-center mb-6">

        <div class="mb-4">
            <h1 class="text-3xl font-bold" style="color:#0b1f3a;">
                Hanna <span style="color:#c9a227;">Imobiliária</span>
            </h1>

            <p class="text-sm text-gray-600 mt-2">
                Sistema de Gestão de Clientes, Apartamentos e Vendas
            </p>
        </div>

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="'Email'" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="'Palavra-passe'" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 shadow-sm"
                    style="color:#0b1f3a;"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600">
                    Lembrar-me
                </span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-5">

            <a href="{{ route('register') }}"
                class="underline text-sm text-gray-600 hover:text-gray-900">
                Criar conta
            </a>

            <button type="submit"
                class="px-5 py-2 rounded-md text-white font-semibold"
                style="background-color:#0b1f3a;">
                Entrar
            </button>

        </div>
    </form>
</x-guest-layout>
