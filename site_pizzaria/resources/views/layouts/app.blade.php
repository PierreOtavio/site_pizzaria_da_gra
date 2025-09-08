<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Pizzaria da Gr@')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #F8C471;
            color: #222;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        header, nav {
            background: #C0392B;
            color: #FFF;
            padding: 1em 2em;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        a, button {
            background: #27AE60;
            color: #FFF;
            border: none;
            padding: 0.5em 1em;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            margin: 0 0.25em;
            font-weight: bold;
        }
        a:hover, button:hover {
            background: #145A32;
        }
        .content {
            max-width: 900px;
            margin: 2em auto;
            background: #FFF;
            border-radius: 10px;
            box-shadow: 0 2px 8px #0002;
            padding: 2em;
        }
        .card {
            background: #FDF6E3;
            border: 1px solid #F5CBA7;
            border-radius: 8px;
            margin: 1em 0;
            padding: 1em;
            box-shadow: 0 2px 6px #0001;
        }
        h1, h2, h3 {
            color: #7E5109;
        }
        footer {
            background: #7E5109;
            color: #fff;
            text-align: center;
            padding: 1em;
            margin-top: 4em;
            border-radius: 0 0 10px 10px;
        }
        .logo {
            font-family: 'Segoe Script', cursive, Arial;
            color: #FFF8DC;
            font-size: 2em;
            letter-spacing: 2px;
            text-shadow: 0 2px 3px #0005;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }
        .nav-links a {
            margin-left: 1em;
        }
        .alert {
            background: #F9E79F;
            color: #A04000;
            border: 1px solid #F5CBA7;
            padding: 1em;
            margin: 1em 0;
            border-radius: 5px;
        }
    </style>
    @yield('head')
</head>
<body>
    <header>
        <span class="logo"><img src="{{ asset('images/pizza_da_gra.png')}}" alt="Pizzaria da Grá" style="height: 60px;"></span>
        <nav class="nav-links">
            <a href="{{ route('order.catalog') }}">Catálogo</a>
            @auth
                <a href="{{ route('orders.history') }}">Meus Pedidos</a>
                <a href="{{ route('user.profile') }}">Perfil</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}">Entrar</a>
                <a href="{{ route('register') }}">Cadastrar</a>
            @endauth
            @if(auth()->check() && auth()->user()->is_admin ?? false)
                <a href="{{ route('dashboard') }}">Admin</a>
            @endif
        </nav>
    </header>

    <main class="content">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert">
                @foreach($errors->all() as $err)
                    <div>{{ $err }}</div>
                @endforeach
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        © {{ date('Y') }} Pizzaria da Gr@. Feito com ♥ por Otávio.
    </footer>
</body>
</html>
