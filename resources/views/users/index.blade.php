@extends('layouts.admin')

@section('content')
    <!-- Trilha de navegação -->
    <div class="w-full inline-flex gap-1 justify-end pr-2">
        <h6 class="text-[#808080]"><a href="dashboard.html">Dashboard</a></h6>
        <span class="text-[#808080]">/</span>
        <h6 class="text-[#363636]">Usuários</h6>
    </div>

    <!-- Conteúdo -->
    <section
        class="flex flex-col min-h-140 sm:min-h-118 border border-solid border-[#808080] rounded-md mx-3 my-2 sm:ml-67 transform duration-300 ease-in-out"
        id="content">

        <!-- Filtragem dos usuários -->
        <div class="h-20 w-full flex-col mb-2">

            <div class="h-7 w-full inline-flex items-center gap-3">
                <span class="bg-[#808080] h-px flex-0.5 w-4 ml-3"></span>
                <h2 class="text-[#363636]">FILTRAGEM</h2>
                <div class="bg-[#808080] h-px flex-1 mr-3"></div>
            </div>

            <div class="w-full h-1/3 inline-flex justify-center gap-4">
                <div
                    class="bg-[#C0C0C0] w-50 h-full border border-solid border-[#808080] rounded-md ml-3 flex items-center justify-center">
                    <span class="text-sm text-[#808080]">ID, CPF, NOME OU LOJA</span>
                </div>
            </div>

            <div class="bg-[#808080] h-px mx-3 mt-2"></div>
        </div>

        <!-- Listagem dos usuários -->
        <div class="w-full h-full grid grid-cols-1 sm:grid-cols-4 2xl:grid-cols-5 gap-4 justify-items-center my-auto">

            @forelse ($users as $user)

            <!-- Modal de cada usuário -->
            <div class="border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30 h-50 w-50 flex flex-col mb-4"
                onclick="return openModalUser()" id="ppOne">
                <div class="w-full h-1/2 flex items-center justify-center">
                    <img src="{{ asset('user.webp') }}" width="80" height="80" alt="Perfil" class="rounded-md">
                </div>
                <div class="w-full h-1/2 flex flex-col justify-center items-center">
                    <span class="text-sm text-[#696969]">{{ $user->cpf }}</span>
                    <span class="text-sm text-[#696969]">{{ $user->name }}</span>
                    <div class="inline-flex gap-2 my-3">
                        <i class="fa-solid fa-eye text-lg text-[#191970] cursor-pointer"
                            onclick="return openModal()"></i>
                        <i class="fa-solid fa-pen-to-square text-lg text-[#006400] cursor-pointer"></i>
                        <i class="fa-solid fa-trash-can text-lg text-[#FF0000] cursor-pointer"></i>
                    </div>
                </div>
            </div>

            @empty
                <p style="color: #f00">Nenhum registro encontrado!</p>
            @endforelse
        </div>

    </section>

    {{ $users->links() }} <br>

    <a href="{{ route('users.select-enterprise') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
