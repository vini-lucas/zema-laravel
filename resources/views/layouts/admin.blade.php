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
        @can('dashboard')
            <a href="{{ route('dashboard') }}">Dashboard</a> - 
        @endcan

        @can('inss.index')
            <a href="{{ route('inss.index') }}">INSS</a> - 
        @endcan

        @can('users.index')
            <a href="{{ route('users.index') }}">Usuários</a> - 
        @endcan
        @can('enterprises.index')
            <a href="{{ route('enterprises.index') }}">Empresas</a> - 
        @endcan
        @can('branchs.index')
            <a href="{{ route('branchs.index') }}">Filiais</a> - 
        @endcan
        @can('products.index')
            <a href="{{ route('products.index') }}">Produtos</a> - 
        @endcan
        @can('flats.index')
            <a href="{{ route('flats.index') }}">Planos de produtos</a> - 
        @endcan
        @can('statuses.index')
            <a href="{{ route('statuses.index') }}">Status</a> - 
        @endcan
        @can('levels_access.index')
            <a href="{{ route('levels_access.index') }}">Níveis de acesso</a> - 
        @endcan
        @can('profile')
            <a href="{{ route('profile', ['user' => Auth::id()]) }}">Perfil</a> - 
        @endcan
        <a href="{{ route('logout') }}">Sair</a>
    </div>

    @yield('content')
</body>

</html>
