<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zema</title>
</head>
<body>

    <a href="{{ route('users.index') }}">Usuários</a> -  
    <a href="{{ route('enterprises.index') }}">Empresas</a> - 
    <a href="{{ route('branchs.index') }}">Filiais</a> - 
    <a href="{{ route('products.index') }}">Produtos</a> - 
    <a href="{{ route('flats.index') }}">Planos de produtos</a>

    @yield('content')

</body>

</html>
