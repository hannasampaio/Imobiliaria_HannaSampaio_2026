<x-guest-layout>

    <style>
        :root {
            --navy:  #0B1F3A;
            --gold:  #C9922A;
            --gold-light: #E8B04B;
            --card-bg: rgba(255, 255, 255, 0.96);
            --text-muted: #6B7280;
            --radius: 20px;
        }

        .home-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 40px 36px 32px;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.35);
            text-align: center;
        }

        .home-card .logo-img {
            width: 180px;
            display:block;
            margin:0 auto 6px;
        }

        .home-card .brand-name {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 3px;
            color: var(--navy);
            line-height: 1;
            margin: 0;
        }

        .home-card .brand-sub {
            font-size: 11px;
            letter-spacing: 2.5px;
            color: var(--gold);
            text-transform: uppercase;
            margin: 2px 0 0;
        }

        .home-card .brand-tagline {
            font-size: 10px;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            text-transform: uppercase;
            margin: 4px 0 0;
        }

        .home-card .divider {
            width: 48px;
            height: 2px;
            background: var(--gold);
            border: none;
            margin: 8px auto 8px;
        }

        .home-card .card-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
            margin: 0 0 4px;
            line-height: 1.3;
        }

        .home-card .card-title span {
            color: var(--gold);
        }

        .home-card .card-desc {
            font-size: 13.5px;
            color: var(--text-muted);
            line-height: 1.55;
            margin: 0 0 24px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 28px;
        }

        .feature-card {
            background: #F8F8FA;
            border-radius: 12px;
            padding: 18px 10px 14px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            border: 1px solid #EBEBEB;
        }

        .feature-card i {
            font-size: 26px;
            color: var(--gold);
        }

        .feature-card span {
            font-size: 12px;
            font-weight: 600;
            color: var(--navy);
        }

        .btn-primary-conta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 15px;
            background: var(--navy);
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
            margin-bottom: 12px;
        }

        .btn-primary-conta:hover {
            background: #142d52;
            color: #fff;
        }

        .btn-outline-conta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            background: transparent;
            color: black;
            font-size: 15px;
            font-weight: 700;
            border: 2px solid var(--gold);
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            margin-bottom: 20px;
        }

        .btn-outline-conta:hover {
            background: var(--gold);
            color: #fff;
        }

        .security-note {
            font-size: 12px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .security-note i {
            color: var(--gold);
            font-size: 14px;
        }
    </style>

    <div class="home-card">

        <img src="{{ asset('images/logo.png') }}" alt="conta Imobiliária" class="logo-img">

        <hr class="divider">

        <h1 class="card-title">
            Sistema de Gestão<br>
            <span>Imobiliária</span>
        </h1>
        <p class="card-desc">
            Gerencie clientes, apartamentos e vendas<br>
            numa única plataforma completa.
        </p>

        <div class="feature-grid">
            <div class="feature-card">
                <i class="bi bi-people-fill"></i>
                <span>Clientes</span>
                <hr class="divider">
            </div>
            <div class="feature-card">
                <i class="bi bi-buildings-fill"></i>
                <span>Apartamentos</span>
                <hr class="divider">
            </div>
            <div class="feature-card">
                <i class="bi bi-currency-dollar"></i>
                <span>Vendas</span>
                <hr class="divider">
            </div>
        </div>

        <a href="{{ route('login') }}" class="btn-primary-conta">
            <i class="bi bi-box-arrow-in-right" style="color:#c9a227;"></i>
            Entrar no Sistema
        </a>

        <a href="{{ route('register') }}" class="btn-outline-conta">
            <i class="bi bi-person-plus-fill" style="color:#c9a227;"></i>
            Criar Conta
        </a>

        <p class="security-note">
            <i class="bi bi-shield-check"></i>
            Seguro, moderno e feito <strong>para você.</strong>
        </p>

    </div>

</x-guest-layout>
