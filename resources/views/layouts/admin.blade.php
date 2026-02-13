<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zema - Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#DCDCDC] min-h-screen overflow-x-hidden">

    <!-- Sidebar -->
    <div class="flex">
        <aside
            class="bg-linear-to-t from-[#191970] to-[#3030D6] w-64 inset-y-0 fixed left-0 shadow-2xl transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out p-5 mt z-50 overflow-y-auto overflow-x-hidden"
            id="aside">
            <button class="flex ml-45 mt-5 cursor-pointer sm:hidden" onclick="return openNavbar()">
                <i class="fa-solid fa-xmark text-xl text-[#DCDCDC]"></i>
            </button>
            <div class="w-full h-full">
                <div class="h-25 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('zema-logo.png') }}" alt="Zema" class="h-10 w-10"></a>
                </div>
                <div class="w-full h-123.5 flex flex-col">
                    @can('dashboard')
                        <div
                            class="w-full h-15 flex justify-center items-center gap-1 hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                            <i class="fa-solid fa-house text-[#DCDCDC]"></i>
                            <span class="text-[#DCDCDC] text-sm"><a href="{{ route('dashboard') }}">DASHBOARD</a></span>
                        </div>
                    @endcan

                    @can('users.index')
                        <div
                            class="w-full h-15 flex justify-center items-center gap-1 hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                            <i class="fa-solid fa-users text-[#DCDCDC]"></i>
                            <span class="text-[#DCDCDC] text-sm"><a href="{{ route('users.index') }}">USUÁRIOS</a></span>
                        </div>
                    @endcan
                    @can('inss.index')
                        <div
                            class="w-full h-15 flex justify-center items-center gap-1 relative hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                            <i class="fa-solid fa-coins text-[#DCDCDC]"></i>
                            <span class="text-[#DCDCDC] text-sm"><a href="{{ route('inss.index') }}">INSS</a></span>
                        </div>
                    @endcan
                    @can('enterprises.index')
                        <div
                            class="w-full h-15 flex justify-center items-center gap-1 hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                            <i class="fa-solid fa-store text-[#DCDCDC]"></i>
                            <span class="text-[#DCDCDC] text-sm"><a
                                    href="{{ route('enterprises.index') }}">EMPRESAS</a></span>
                        </div>
                    @endcan
                    @can('branchs.index')
                        <div
                            class="w-full h-15 flex justify-center items-center gap-1 hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                            <i class="fa-solid fa-code-branch text-[#DCDCDC]"></i>
                            <span class="text-[#DCDCDC] text-sm"><a href="{{ route('branchs.index') }}">
                                    FILIAIS</a></span>
                        </div>
                    @endcan
                    @can('products.index')
                        <div
                            class="w-full h-15 flex justify-center items-center gap-1 hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                            <i class="fa-solid fa-cart-arrow-down text-[#DCDCDC]"></i>
                            <span class="text-[#DCDCDC] text-sm"><a href="{{ route('products.index') }}">PRODUTOS</a></span>
                        </div>
                    @endcan
                    @can('flats.index')
                        <div
                            class="w-full h-15 flex justify-center items-center gap-1 hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                            <i class="fa-brands fa-product-hunt text-[#DCDCDC]"></i>
                            <span class="text-[#DCDCDC] text-sm"><a href="{{ route('flats.index') }}">PLANOS DE
                                    PRODUTOS</a></span>
                        </div>
                    @endcan
                    <div
                        class="w-full h-15 flex justify-center items-center gap-1 hover:bg-[#191970] transition ease-linear hover:ease-linear delay-10 duration-100">
                        <i class="fa-solid fa-arrow-right-from-bracket text-[#DCDCDC]"></i>
                        <span class="text-[#DCDCDC] text-sm"><a href="{{ route('logout') }}">SAIR</a></span>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Navbar -->
    <nav class="bg-linear-to-l from-[#191970] to-[#3030D6] h-30 w-full flex items-center justify-between p-5">

        <button id="buttonOpenSidebar" class="flex ml-10 cursor-pointer">
            <i class="fa-solid fa-bars text-2xl text-[#DCDCDC]"></i>
        </button>

        <div class="flex mr-10">
            <i class="fa-solid fa-user text-2xl text-[#DCDCDC] cursor-pointer"
                onclick="return modalOptionsProfile()"></i>
        </div>

        <!-- Modal opções de perfil -->
        <div class="absolute h-30 w-25 right-6 top-20 border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30 bg-[#DCDCDC] flex flex-col hidden"
            id="modalOptionsProfile">
            <div class="w-full h-1/3 flex flex-col justify-center items-center gap-1">

                {{-- Trazer o primeiro nome do usuário --}}
                <?php
                $nameInt = Auth::user()->name;
                $nameIntArray = explode(' ', $nameInt);
                $name = $nameIntArray[0];
                ?>
                <span class="text-md text-[#1C1C1C]">Olá, {{ $name }}!</span>
                <div class="h-px w-[90%] bg-[#C0C0C0]"></div>
            </div>
            <div class="w-full h-1/3 flex items-center justify-center hover:bg-[#C0C0C0] cursor-help" title="Indisponível">
                <span class="text-sm text-[#1C1C1C]">Perfil</span>
            </div>
            <div class="w-full h-1/3 flex items-center justify-center hover:bg-[#C0C0C0] cursor-pointer">
                <span class="text-sm text-[#1C1C1C]"><a href="{{ route('logout') }}">Sair</a></span>
            </div>
        </div>
    </nav>

    @yield('content')
</body>

</html>
