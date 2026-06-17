<x-guest-layout>

```
<div style="
    width: 460px;
    max-width: 95%;
    background: rgba(255,255,255,0.96);
    border-radius: 24px;
    padding: 35px;
    box-shadow: 0 25px 60px rgba(0,0,0,0.28);
">

    <div class="text-center mb-4">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Hanna Imobiliária"
            style="
                width: 160px;
                max-width:100%;
                display:block;
                margin:0 auto 18px auto;
            ">

        <h2 class="text-2xl font-bold" style="color:#0b1f3a;">
            Confirmar Email
        </h2>

        <p class="text-sm text-gray-600 mt-2">
            Falta apenas um passo para concluir o registo.
        </p>

    </div>

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
                class="w-full py-3 rounded-lg text-white font-semibold d-flex justify-content-center align-items-center gap-2"
                style="background:#0b1f3a;">

                <i class="bi bi-envelope-fill"
                   style="color:#c9a227;"></i>

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

</div>


</x-guest-layout>
