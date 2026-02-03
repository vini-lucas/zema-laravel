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
                <div class="border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30 h-50 w-50 flex flex-col mb-4">
                    <div class="w-full h-1/2 flex items-center justify-center">
                        <img src="{{ asset('user.webp') }}" width="80" height="80" alt="Perfil"
                            class="rounded-md">
                    </div>
                    <div class="w-full h-1/2 flex flex-col justify-center items-center gap-1">
                        <div class="max-w-29 inline-flex overflow-hidden">
                            <div
                                class="px-2 rounded-l-md bg-[#C0C0C0] border-[#808080] border-l-2 border-t-2 border-solid w-2/10 h-5 whitespace-nowrap text-sm flex justify-center items-center border-b-3">
                                <i class="fa-solid fa-signature text-sm text-[#696969]"></i>
                            </div>

                            <div
                                class="bg-[#C0C0C0] border-[#808080] px-2 rounded-r-md border-2 border-b-3 border-solid w-25 h-5 whitespace-nowrap text-sm flex justify-center items-center overflow-hidden">
                                <span class="text-sm text-[#696969] truncate ">{{ explode(' ', $user->name)[0] }}</span>
                            </div>
                        </div>
                        <div class="w-29 inline-flex">
                            <div
                                class="bg-green-600 px-2 rounded-l-md border-green-800 border-l-2 border-t-2 border-b-2 border-solid text-green-950 w-2/10 h-5 whitespace-nowrap text-sm flex justify-center items-center">
                                <i class="fa-solid fa-check text-sm text-green-900"></i>
                            </div>

                            <div
                                class="bg-green-600 px-2 rounded-r-md border-green-800 border-2 border-solid text-green-950 w-25 h-5 whitespace-nowrap text-sm flex justify-center items-center">
                                Ativo</div>
                        </div>
                        <div class="inline-flex gap-2 my-3 w-29 justify-center">
                            <div
                                class="bg-[#C0C0C0] border-[#808080] border-2 border-solid text-[#696969] h-auto w-auto px-1  rounded-md group hover:bg-[#808080] transition-all duration-300 ease-in-out">
                                <i class="fa-solid fa-eye text-lg text-[#696969] cursor-pointer group-hover:text-[#C0C0C0]"
                                    onclick="return openModal({{ $user->id }})"></i>
                            </div>
                            <div
                                class="bg-[#C0C0C0] border-[#808080] border-2 border-solid text-[#696969] h-auto w-auto px-1  rounded-md group hover:bg-[#808080] transition-all duration-300 ease-in-out">
                                <i
                                    class="fa-solid fa-pen-to-square text-lg text-[#696969] group-hover:text-[#C0C0C0] cursor-pointer"></i>
                            </div>
                            <div
                                class="bg-[#C0C0C0] border-[#808080] border-2 border-solid text-[#696969] h-auto w-auto px-1  rounded-md group hover:bg-[#808080] transition-all duration-300 ease-in-out">
                                <i
                                    class="fa-solid fa-trash-can text-lg text-[#696969] group-hover:text-[#C0C0C0] cursor-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal detalhes do usuário -->
                <div class="bg-[#DCDCDC] fixed border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30 w-80 h-80 top-59 left-8 sm:w-100 sm:h-100 sm:left-152.5 sm:top-32 z-50 flex flex-col hidden"
                    id="modal-{{ $user->id }}">

                    <!-- Foto de perfil do usuário e botão fechar -->
                    <div class="w-full h-20 flex justify-center items-center gap-2">
                        <img src="{{ asset('user.webp') }}" width="60" height="60" alt="Perfil" class="rounded-md">
                        <div class="flex flex-col px-1 gap-2 items-center">
                            <span class="w-10 h-10 absolute right-0 top-0 flex justify-center items-center">
                                <i class="fa-solid fa-xmark text-[#B22222] text-sm cursor-pointer"
                                    onclick="return closeModal({{ $user->id }})"></i>
                            </span>

                            <div class="max-w-auto">
                                <span
                                    class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap">{{ $user->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="w-full h-px flex justify-center">
                        <div class="w-[90%] h-full bg-[#A9A9A9]"></div>
                    </div>
                    <div class="flex-1 w-full grid grid-cols-2 gap-1 p-3">
                        <div class="max-w-45 flex justify-center bg-amber-500">
                            <div class="inline-flex">
                                <i class="fa-solid fa-signature bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969]"></i>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->cpf }}</span>
                            </div>
                            
                        </div>
                        <div class="max-w-auto flex flex-col justify-center">
                            <span
                                class="text-[10px] bg-[#C0C0C0] px-2 rounded-t-md border-[#808080] border-t-2 border-x-2 border-b-px border-solid w-18 mx-auto flex justify-center items-center">E-mail</span>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->email }}</span>
                        </div>
                        <div class="max-w-auto flex flex-col justify-center">
                            <span
                                class="text-[10px] bg-[#C0C0C0] px-2 rounded-t-md border-[#808080] border-t-2 border-x-2 border-b-px border-solid w-18 mx-auto flex justify-center items-center">Nascimento</span>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->date_birth }}</span>
                        </div>
                        <div class="max-w-auto flex flex-col justify-center">
                            <span
                                class="text-[10px] bg-[#C0C0C0] px-2 rounded-t-md border-[#808080] border-t-2 border-x-2 border-b-px border-solid w-18 mx-auto flex justify-center items-center">Telefone</span>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->telephone }}</span>
                        </div>
                        <div class="max-w-auto flex flex-col justify-center">
                            <span
                                class="text-[10px] bg-[#C0C0C0] px-2 rounded-t-md border-[#808080] border-t-2 border-x-2 border-b-px border-solid w-18 mx-auto flex justify-center items-center">Gênero</span>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->gender }}</span>
                        </div>
                        <div class="max-w-auto flex flex-col justify-center">
                            <span
                                class="text-[10px] bg-[#C0C0C0] px-2 rounded-t-md border-[#808080] border-t-2 border-x-2 border-b-px border-solid w-18 mx-auto flex justify-center items-center">Empresa</span>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->enterprise }}</span>
                        </div>
                        <div class="max-w-auto flex flex-col justify-center">
                            <span
                                class="text-[10px] bg-[#C0C0C0] px-2 rounded-t-md border-[#808080] border-t-2 border-x-2 border-b-px border-solid w-18 mx-auto flex justify-center items-center">Filial</span>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->branch }}</span>
                        </div>
                        <div class="max-w-auto flex flex-col justify-center">
                            <span
                                class="text-[10px] bg-[#C0C0C0] px-2 rounded-t-md border-[#808080] border-t-2 border-x-2 border-b-px border-solid w-18 mx-auto flex justify-center items-center">Acesso</span>
                            <span
                                class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] text-[10px] overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center">{{ $user->level_access }}</span>
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
