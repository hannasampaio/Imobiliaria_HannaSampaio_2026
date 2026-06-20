<x-guest-layout
    title="Confirmar Email"
    subtitle="Falta apenas um passo para concluir o registo.">
    <div class="mb-4 text-sm text-gray-600 text-center">
        Verifique a sua caixa de correio eletrónico e clique no link de confirmação enviado pela Hanna Imobiliária.
        <br><br>
        Caso não tenha recebido o email, poderá solicitar um novo envio.
    </div>
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success text-center mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            Foi enviado um novo email de verificação.
        </div>
    @endif
    <div class="d-grid gap-3">
        <form method="POST"
              action="{{ route('verification.send') }}">
            @csrf
            <button
                type="submit"
                class="w-full py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2 auth-button">
                <i class="bi bi-envelope-fill"></i>
                Reenviar Email
            </button>
        </form>
        <form method="POST"
              action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="btn btn-outline-secondary w-100">
                <i class="bi bi-box-arrow-right me-2"></i>
                Terminar Sessão
            </button>
        </form>
    </div>
</x-guest-layout>
