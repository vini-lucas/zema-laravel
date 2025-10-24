<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zema - Entrar</title>
    </head>
    <body>
        <h1>Bem-vindo à Zema!</h1>
        <a href="{{ route('enterprises.index') }}">Empresas</a>
    </body>
</html>
