<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Painel Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('adminlte.partials.navbar')
    @include('adminlte.partials.sidebar')

    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    @include('adminlte.partials.footer')
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
