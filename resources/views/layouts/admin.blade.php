<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zema - Administrativo</title>
</head>

<body>

    <div>
        <a href="{{ route('dashboard') }}">Dashboard</a> - 
        <a href="{{ route('users.index') }}">Usuários</a> -
        <a href="{{ route('enterprises.index') }}">Empresas</a> -
        <a href="{{ route('branchs.index') }}">Filiais</a> -
        <a href="{{ route('products.index') }}">Produtos</a> -
        <a href="{{ route('flats.index') }}">Planos de produtos</a> - 
        <a href="{{ route('logout') }}">Sair</a>
    </div>

    @yield('content')
</body>

</html>
