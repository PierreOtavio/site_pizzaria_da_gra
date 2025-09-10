<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo! | Pizzaria da Grá</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts: Poppins (moderno) -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:700,400" rel="stylesheet">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #fbeee6 0%, #ffd580 100%);
            min-height: 100vh;
            font-family: 'Poppins', Arial, sans-serif;
            position: relative;
        }
        .welcome-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(200, 40, 40, 0.11);
            padding: 2rem 2rem 4rem 2rem;
            max-width: 500px;
            max-height: 95vh;
            overflow-y: auto;
            margin: 64px auto 0 auto;
            text-align: center;
        }
        .logo-pizza {
            width: 64px;
            height: 64px;
            object-fit: contain;
            margin-bottom: 12px;
        }
        .welcome-card h1 {
            font-size: 2.0rem;
            font-weight: 700;
            color: #c62828;
        }
        .welcome-card .slogan {
            color: #a06623;
            font-size: 1.11rem;
            margin-bottom: 22px;
            font-weight: 500;
        }
        .welcome-card p {
            color: #555;
        }
        .pizza-btn {
            background: #c62828;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            margin-bottom: 0.35rem;
            margin-left: 0.1rem;
            transition: background 200ms;
            font-size: 1rem;
            font-weight: bold;
            box-shadow: 0 3px 8px rgba(168,44,39,0.08);
        }
        .pizza-btn:hover {
            background: #b71c1c;
        }
        .register-btn {
            background: #ffb300;
            color: #6d4100;
            margin-left: 0.1rem;
        }
        .register-btn:hover {
            background: #ffa000;
            color: #4b2c00;
        }
        .footer-pizza {
            position: fixed;
            left: 0; right: 0; bottom: 0;
            width: 100%;
            background: #f2c279;
            color: #702911;
            text-align: center;
            padding: 0.7rem 0.4rem 0.6rem 0.4rem;
            font-size: 1.07rem;
            letter-spacing: .02em;
            font-weight: 500;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 99;
        }
        .footer-pizza .whatsapp-link {
            color: #25d366;
            font-weight: bold;
            margin-left: 8px;
            text-decoration: none;
        }
        .footer-pizza .whatsapp-link:hover {
            color: #128c7e;
            text-decoration: underline;
        }
        @media (max-width: 450px) {
            .welcome-card {
                padding: 1.3rem 0.3rem 2rem 0.3rem;
                margin: 28px 4px 0 4px;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-start justify-content-center" style="min-height: 100vh;">
        <div class="welcome-card mt-4">
            {{-- Sua logo --}}
            <img src="{{ asset('images/pizza_da_gra.png') }}" alt="Logo Pizzaria" class="logo-pizza">

            <h1>Bem-vindo!</h1>
            <div class="slogan">
                A pizza feita com <strong>amor e sabor</strong>, direto do forno para você! 🍕
            </div>
            <p>Faça seu login ou cadastre-se para pedir a melhor pizza da cidade.</p>

            <div class="mt-4 mb-2 d-flex flex-column align-items-center gap-3">
                <a href="{{ route('login') }}" class="pizza-btn shadow-sm" style="width: 200px;">Entrar</a>
                <a href="{{ route('register') }}" class="pizza-btn register-btn shadow-sm" style="width: 200px;">Cadastrar</a>
        </div>

        </div>
    </div>

    {{-- Rodapé fixo --}}
    <footer class="footer-pizza">
        <div>
            <span><b>Faça seu pedido pelo WhatsApp:</b>
            <a class="whatsapp-link" href="https://wa.me/5537999340069" target="_blank">
                (37) 99934-0069
            </a></span>
        </div>
        <div>
            <span><b>Funcionamento:</b> Quarta a Domingo • 18h às 22h</span>
        </div>
    </footer>
</body>
</html>
