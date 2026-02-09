<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zema - Entrar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-linear-to-l from-[#191970] to-[#3030D6] h-screen flex justify-center items-center">

    @yield('content')

</body>

</html>
