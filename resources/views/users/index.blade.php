@extends('layouts.admin')



@section('content')

    <div class="absolute top-0 right-0 h-15 w-60 bg-red-400 transform transition-transform translate-x-full duration-600 ease-in-out rounded-md text-red-800 font-semibold text-md flex justify-center items-center border-3 border-red-800"
        id="msgErrorRed">
        <p id="pMsgError" class="text-center"></p>
        <i class="fa-solid fa-x text-[8px] absolute top-0 right-0 mt-1 mr-1 cursor-pointer" onclick="closeMsgError()"></i>
    </div>

    <div class="absolute top-0 left-0 sm:left-64 h-15 w-auto p-4 bg-green-400 transform transition-transform -translate-x-full duration-600 ease-in-out rounded-md text-green-800 font-semibold text-md flex justify-center items-center border-3 border-green-800"
        id="msgSuccessGreen">
        <p id="pMsgSuccess"></p>
        <i class="fa-solid fa-x text-[10px] absolute top-0 left-0 mt-1 ml-1 cursor-pointer" onclick="closeMsgSuccess()"></i>
    </div>

    <x-alert />

    <!-- Trilha de navegação -->
    <div class="w-full inline-flex gap-1 justify-end pr-2 mt-6 -ml-2">
        <h6 class="text-[#808080]"><a href="{{ route('dashboard') }}">Dashboard</a></h6>
        <span class="text-[#808080]">/</span>
        <h6 class="text-[#363636]">Usuários</h6>
    </div>

    <!-- Conteúdo -->
    <section
        class="flex flex-col min-h-140 2xl:min-h-195 sm:min-h-118 border border-solid border-[#808080] rounded-md mx-3 my-6 sm:ml-67 transform duration-300 ease-in-out"
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

        <div class="w-full inline-flex justify-center sm:justify-end pr-2.5 pb-5">
            <button type="button"
                class="bg-blue-400 border-3 border-blue-600 text-blue-700 p-2 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-30 hover:bg-blue-600 hover:text-blue-400 transition-all duration-300 ease-in-out gap-1 ml-3"
                onclick="openModalAddUser()">
                Adicionar
                <i class="fa-solid fa-user-plus text-lg"></i>
            </button>
            <button type="button"
                class="bg-green-400 border-3 border-green-600 text-green-700 p-2 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-30 hover:bg-green-600 hover:text-green-400 transition-all duration-300 ease-in-out gap-1 ml-3">
                Relatório
                <i class="fa-solid fa-file text-lg"></i>
            </button>
        </div>

        <!-- Listagem dos usuários -->
        <div class="w-full h-full grid grid-cols-1 sm:grid-cols-4 2xl:grid-cols-5 gap-4 justify-items-center">

            @forelse ($users as $user)
                <!-- Modal de cada usuário -->
                <div
                    class="border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30 h-50 w-50 flex flex-col mb-4">
                    <div class="w-full h-1/2 flex items-center justify-center">
                        <img src="{{ asset('user.webp') }}" width="80" height="80" alt="Perfil" class="rounded-md">
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
                            <div class="bg-[#C0C0C0] border-[#808080] border-2 border-solid text-[#696969] h-auto w-auto px-1  rounded-md group hover:bg-[#808080] transition-all duration-300 ease-in-out cursor-pointer"
                                onclick="return openModal({{ $user->id }})">
                                <i class="fa-solid fa-eye text-lg text-[#696969] group-hover:text-[#C0C0C0]"></i>
                            </div>
                            <div class="bg-[#C0C0C0] border-[#808080] border-2 border-solid text-[#696969] h-auto w-auto px-1  rounded-md group hover:bg-[#808080] transition-all duration-300 ease-in-out cursor-pointer"
                                onclick="openModalEditUser({{ $user->id }})">
                                <i class="fa-solid fa-pen-to-square text-lg text-[#696969] group-hover:text-[#C0C0C0]"></i>
                            </div>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST"
                                onsubmit="return confirm('Excluir registro?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-[#C0C0C0] border-[#808080] border-2 border-solid text-[#696969] px-1 rounded-md group hover:bg-[#808080] transition-all duration-300 ease-in-out cursor-pointer">
                                    <i class="fa-solid fa-trash-can text-lg text-[#696969] group-hover:text-[#C0C0C0]"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Modal detalhes do usuário -->
                <?php
                $cpf_array = str_split($user->cpf);
                $cpf = $cpf_array[0] . $cpf_array[1] . $cpf_array[2] . '.' . $cpf_array[3] . $cpf_array[4] . $cpf_array[5] . '.' . $cpf_array[6] . $cpf_array[7] . $cpf_array[8] . '-' . $cpf_array[9] . $cpf_array[10];
                $telephone_array = str_split($user->telephone);
                $telephone = '(' . $telephone_array[0] . $telephone_array[1] . ')' . ' ' . $telephone_array[2] . ' ' . $telephone_array[3] . $telephone_array[4] . $telephone_array[5] . $telephone_array[6] . ' - ' . $telephone_array[7] . $telephone_array[8] . $telephone_array[9] . $telephone_array[10];
                ?>
                <div class="bg-[#DCDCDC] fixed border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30 w-80 h-80 top-50 left-20 sm:w-100 sm:h-100 sm:left-152.5 sm:top-32 2xl:left-220 2xl:top-70 z-50 flex flex-col hidden"
                    id="modal-{{ $user->id }}">

                    <!-- Foto de perfil do usuário e botão fechar -->
                    <div class="w-full h-20 flex justify-center items-center gap-2">
                        <img src="{{ asset('user.webp') }}" width="60" height="60" alt="Perfil" class="rounded-md">
                        <div class="flex flex-col px-1 gap-2 items-center w-[74%]">
                            <span class="w-10 h-10 absolute right-0 top-0 flex justify-center items-center">
                                <i class="fa-solid fa-xmark text-[#B22222] text-sm cursor-pointer mb-2"
                                    onclick="return closeModal({{ $user->id }})"></i>
                            </span>

                            <div class="w-full">
                                <span
                                    class="bg-[#C0C0C0] px-2 rounded-md border-[#808080] border-2 border-solid text-[#696969] overflow-x-auto text-center max-h-7 block whitespace-nowrap w-full">{{ $user->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="w-full h-px flex justify-center">
                        <div class="w-[90%] h-full bg-[#A9A9A9]"></div>
                    </div>
                    <div class="flex-1 w-full grid grid-cols-2 gap-1 p-3">

                        {{-- CPF --}}
                        <div
                            class="2xl:max-w-45 2xl:w-45 sm:w-45 sm:max-w-45 w-36.5 max-w-36.5 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-solid fa-signature text-[#696969]" title="CPF"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid overflow-x-auto max-w-62 max-h-7 block whitespace-nowrap text-center flex-1">
                                    <span
                                        class="text-[#696969] text-[10px] font-semibold sm:text-sm"><?php echo $cpf; ?></span>
                                </div>
                            </div>
                        </div>

                        {{-- E-mail --}}
                        <div class="max-w-45 w-36.5 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-regular fa-envelope text-[#696969] shrink-0" title="E-mail"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid max-w-29.5 min-w-29.5 sm:max-w-38 sm:min-w-38">
                                    <span title="{{ $user->email }}"
                                        class="w-full overflow-hidden whitespace-nowrap text-ellipsis text-[#696969] text-[10px] font-semibold sm:text-sm flex justify-center items-center">
                                        {{ $user->email }}
                                    </span>
                                </div>

                            </div>
                        </div>

                        {{-- Nascimento --}}
                        <div class="max-w-45 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-solid fa-cake-candles text-[#696969]" title="Nascimento"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid max-w-42 flex-1">
                                    <span title="{{ \Carbon\Carbon::parse($user->date_birth)->format('d/m/Y') }}"
                                        class="w-full overflow-hidden whitespace-nowrap text-ellipsis text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center">
                                        {{ \Carbon\Carbon::parse($user->date_birth)->format('d/m/Y') }}
                                    </span>
                                </div>

                            </div>
                        </div>

                        {{-- Telefone --}}
                        <div class="max-w-45 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-solid fa-phone text-[#696969]" title="Telefone"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid max-w-42 flex-1">
                                    <span title="<?php echo $telephone; ?>"
                                        class="w-full overflow-hidden whitespace-nowrap text-ellipsis text-[#696969] text-[10px] font-semibold sm:text-sm flex justify-center items-center">
                                        <?php echo $telephone; ?>
                                    </span>
                                </div>

                            </div>
                        </div>

                        {{-- Gênero --}}
                        <div class="max-w-45 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-solid fa-mars-and-venus text-[#696969]" title="Gênero"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid max-w-42 flex-1">
                                    <span title="{{ ucfirst($user->gender) }}"
                                        class="w-full overflow-hidden whitespace-nowrap text-ellipsis text-[#696969] text-[10px] font-semibold sm:text-sm flex justify-center items-center">
                                        {{ ucfirst($user->gender) }}
                                    </span>
                                </div>

                            </div>
                        </div>

                        {{-- Empresa --}}
                        <div class="max-w-45 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-solid fa-industry text-[#696969]" title="Empresa"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid max-w-42 flex-1">
                                    <span title="{{ $user->enterprise }}"
                                        class="w-full overflow-hidden whitespace-nowrap text-ellipsis text-[#696969] text-[10px] font-semibold sm:text-sm flex justify-center items-center">
                                        {{ $user->enterprise }}
                                    </span>
                                </div>

                            </div>
                        </div>

                        {{-- Filial --}}
                        <div class="max-w-45 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-solid fa-code-branch text-[#696969]" title="Filial"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid max-w-42 flex-1">
                                    <span title="{{ $user->branch->city }}"
                                        class="w-full overflow-hidden whitespace-nowrap text-ellipsis text-[#696969] text-[10px] font-semibold sm:text-sm flex justify-center items-center">
                                        {{ $user->branch->city }}
                                    </span>
                                </div>

                            </div>
                        </div>

                        {{-- Acesso --}}
                        <div class="max-w-45 flex justify-center items-center">
                            <div class="inline-flex w-full">
                                <div
                                    class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                    <i class="fa-solid fa-universal-access text-[#696969]" title="Acesso"></i>
                                </div>
                                <div
                                    class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid max-w-42 flex-1">
                                    <span title="{{ $user->levelAccess->name }}"
                                        class="w-full overflow-hidden whitespace-nowrap text-ellipsis text-[#696969] text-[10px] font-semibold sm:text-sm flex justify-center items-center">
                                        {{ $user->levelAccess->name }}
                                    </span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- Formulário editar usuário --}}
                <div class="bg-[#DCDCDC] fixed border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/10 w-80 h-100 top-30 left-20 sm:w-100 sm:h-100 sm:left-152.5 sm:top-32 2xl:left-220 2xl:top-70 z-50 flex flex-col hidden"
                    id="modalEdit-{{ $user->id }}">

                    <div class="absolute top-0 right-0 mt-1 mr-1 cursor-pointer"
                        onclick="closeModalEditUser({{ $user->id }})">
                        <i class="fa-solid fa-xmark text-red-500"></i>
                    </div>

                    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex-col w-full h-full p-4 mt-4">
                            <div class="grid grid-cols-1 gap-2 w-full">

                                {{-- Nome --}}
                                <div class="2xl:w-full flex justify-center items-center h-10">
                                    <div class="inline-flex w-65 2xl:w-85">
                                        <div
                                            class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                            <i class="fa-solid fa-signature text-[#696969]" title="CPF"></i>
                                        </div>
                                        <div
                                            class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid block whitespace-nowrap text-center flex-1">
                                            <input type="text" name="name" id="name"
                                                value="{{ $user->name }}"
                                                class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none">
                                        </div>
                                    </div>
                                </div>

                                {{-- Nascimento --}}
                                <div class="2xl:w-full flex justify-center items-center h-10">
                                    <div class="inline-flex w-65 2xl:w-85">
                                        <div
                                            class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                            <i class="fa-solid fa-cake-candles text-[#696969]" title="CPF"></i>
                                        </div>
                                        <div
                                            class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid block whitespace-nowrap text-center flex-1">
                                            <input type="date" name="date_birth" id="date_birth"
                                                value="{{ $user->date_birth }}"
                                                class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none">
                                        </div>
                                    </div>
                                </div>

                                {{-- Gênero --}}
                                <div class="2xl:w-full flex justify-center items-center h-10">
                                    <div class="inline-flex w-65 2xl:w-85">
                                        <div
                                            class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                            <i class="fa-solid fa-mars-and-venus text-[#696969]" title="CPF"></i>
                                        </div>

                                        <select name="gender"
                                            class="bg-[#C0C0C0] px-2 rounded-br-md rounded-tr-md border-[#808080] border-2 whitespace-nowrap flex-1 text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none"
                                            id="selectUpUser{{ $user->id }}"
                                            onclick="alterSelectUpUser({{ $user->id }})">
                                            <option value="masculino"
                                                class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center border-[#808080] border-2"
                                                {{ $user->gender == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="feminino"
                                                class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center"
                                                {{ $user->gender == 'feminino' ? 'selected' : '' }}>Feminino</option>
                                            <option value="não_informado"
                                                class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center"
                                                {{ $user->gender == 'não_informado' ? 'selected' : '' }}>Não informar
                                            </option>
                                        </select>

                                    </div>
                                </div>

                                {{-- E-mail --}}
                                <div class="2xl:w-full flex justify-center items-center h-10">
                                    <div class="inline-flex w-65 2xl:w-85">
                                        <div
                                            class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                            <i class="fa-solid fa-envelope text-[#696969]" title="CPF"></i>
                                        </div>
                                        <div
                                            class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid block whitespace-nowrap text-center flex-1">
                                            <input type="text" name="email" id="email"
                                                value="{{ $user->email }}"
                                                class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none">
                                        </div>
                                    </div>
                                </div>

                                {{-- Telefone --}}
                                <div class="2xl:w-full flex justify-center items-center h-10">
                                    <div class="inline-flex w-65 2xl:w-85">
                                        <div
                                            class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                            <i class="fa-solid fa-phone text-[#696969]" title="CPF"></i>
                                        </div>
                                        <div
                                            class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid block whitespace-nowrap text-center flex-1">
                                            <input type="text" name="telephone" id="telephone"
                                                value="{{ $user->telephone }}"
                                                class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none">
                                        </div>
                                    </div>
                                </div>

                                {{-- Nível de acesso --}}
                                @if ($user->level_access_id == 1)
                                    <div class="2xl:w-full flex justify-center items-center h-10">
                                        <div class="inline-flex w-65 2xl:w-85">
                                            <div
                                                class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                                <i class="fa-solid fa-lock text-[#696969]" title="CPF"></i>
                                            </div>

                                            <select name="level_access_id"
                                                class="bg-[#C0C0C0] px-2 rounded-br-md rounded-tr-md border-[#808080] border-2 whitespace-nowrap flex-1 text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none"
                                                id="selectUpUser{{ $user->id }}" disabled>
                                                <option value="{{ $user->level_access_id }}"
                                                    class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center border-[#808080] border-2">
                                                    Desenvolvedor</option>
                                            </select>
                                            <input type="hidden" name="level_access_id"
                                                value="{{ $user->level_access_id }}"></option>

                                        </div>
                                    </div>
                                @else
                                    <div class="2xl:w-full flex justify-center items-center h-10">
                                        <div class="inline-flex w-65 2xl:w-85">
                                            <div
                                                class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                                <i class="fa-solid fa-lock text-[#696969]" title="CPF"></i>
                                            </div>

                                            <select name="level_access_id"
                                                class="bg-[#C0C0C0] px-2 rounded-br-md rounded-tr-md border-[#808080] border-2 whitespace-nowrap flex-1 text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none"
                                                id="levelUpUser{{ $user->id }}"
                                                onclick="alterLevelUpUser({{ $user->id }})">
                                                @foreach ($levels_access as $level_access)
                                                    <option value="{{ $level_access->id }}"
                                                        class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center border-[#808080] border-2"
                                                        {{ $user->level_access_id == $level_access->id ? 'selected' : '' }}>
                                                        {{ $level_access->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                @endif

                                <input type="hidden" name="branch_id" value="{{ $user->branch_id }}">
                                <input type="hidden" name="status_id" value="{{ $user->status_id }}">

                            </div>

                            <div class="w-full flex-1 inline-flex justify-center">
                                <button type="submit"
                                    class="bg-[#32CD32] border-3 border-[#228B22] text-[#008000] p-2 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-[#228B22] hover:text-[#32CD32] transition-all duration-300 ease-in-out gap-1 ml-3 mt-3">
                                    Salvar
                                    <i class="fa-solid fa-circle-check text-lg"></i>
                                </button>
                                <button type="button"
                                    class="bg-yellow-400 border-3 border-yellow-600 text-yellow-700 p-2 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-yellow-600 hover:text-yellow-400 transition-all duration-300 ease-in-out gap-1 ml-3 mt-3"
                                    onclick="openModalUpPass({{ $user->id }})">
                                    Alterar Senha
                                    <i class="fa-solid fa-file-pen text-lg"></i>
                                </button>
                            </div>
                    </form>
                </div>
        </div>

        {{-- Formulário editar senha --}}
        <div class="bg-[#DCDCDC] fixed border border-solid border-[#808080] rounded-md shadow-md shadow-black/10 w-80 h-50 top-60 left-37 sm:w-100 sm:h-50 sm:left-152.5 sm:top-62 2xl:left-220 2xl:top-90 z-50 flex flex-col hidden"
            id="formUpPass-{{ $user->id }}">

            <div class="absolute top-0 right-0 mt-1 mr-1 cursor-pointer"
                onclick="closeModalEditPass({{ $user->id }})">
                <i class="fa-solid fa-xmark text-red-500"></i>
            </div>

            <div class="grid grid-cols-1 gap-2 w-full mt-8">

                <form action="{{ route('users.update-password', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Senha --}}
                    <div class="2xl:w-full flex justify-center items-center h-10">
                        <div class="inline-flex w-65 2xl:w-85">
                            <div
                                class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                <i class="fa-solid fa-lock text-[#696969]" title="CPF"></i>
                            </div>
                            <div
                                class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid block whitespace-nowrap text-center flex-1">
                                <input type="password" name="password" id="password" value="{{ old('password') }}"
                                    class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none"
                                    placeholder="****************">
                            </div>
                        </div>
                    </div>

                    {{-- Confirmar --}}
                    <div class="2xl:w-full flex justify-center items-center h-10">
                        <div class="inline-flex w-65 2xl:w-85">
                            <div
                                class=" bg-[#C0C0C0] px-2 rounded-l-md border-l-[#808080] border-l-2 border-t-[#808080] border-t-2 border-b-[#808080] border-b-2 h-7 w-7 flex justify-center items-center">
                                <i class="fa-solid fa-unlock text-[#696969]" title="CPF"></i>
                            </div>
                            <div
                                class="bg-[#C0C0C0] px-2 rounded-r-md border-[#808080] border-2 border-solid block whitespace-nowrap text-center flex-1">
                                <input type="password" name="confirmation_password" id="confirmation_password"
                                    value="{{ old('confirmation_password') }}"
                                    class="text-[#696969] text-[10px] font-semibold sm:text-sm flex items-center justify-center text-center w-full focus:outline-none"
                                    placeholder="Confirme-a">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="w-full inline-flex justify-center">
                <button type="submit"
                    class="bg-[#32CD32] border-3 border-[#228B22] text-[#008000] p-2 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-[#228B22] hover:text-[#32CD32] transition-all duration-300 ease-in-out gap-1 ml-3 mt-3">
                    Salvar
                    <i class="fa-solid fa-circle-check text-lg"></i>
                </button>

            </div>
        </div>
        </form>

    @empty
        <p style="color: #f00">Nenhum registro encontrado!</p>
        @endforelse

        {{-- Formulário criar usuário --}}
        <div class="bg-[#DCDCDC] fixed border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/10 w-80 h-100 top-30 left-20 sm:w-150 sm:h-125 sm:left-151 sm:top-32 2xl:left-198 2xl:top-70 z-50 flex flex-col hidden"
            id="modalAddUser">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="absolute top-0 right-0 mt-1 mr-3 cursor-pointer" onclick="closeModalAddUser()">
                    <i class="fa-solid fa-xmark text-red-500 text-sm"></i>
                </div>

                <div class="grid grid-cols-2 w-ful h-full justify-items-center mt-8 px-4">

                    {{-- CPF --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-address-card text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX"
                            value="{{ old('cpf') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer"
                            autocomplete="off">
                    </div>

                    {{-- Nome --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-signature text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Ex.: Lucas Vinicius"
                            value="{{ old('name') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer"
                            autocomplete="off">
                    </div>

                    {{-- Nascimento --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-cake-candles text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <input type="date" name="date_birth" id="date_birth" value="{{ old('date_birth') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer flex justify-center items-center"
                            autocomplete="off">
                    </div>

                    {{-- Gênero --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-mars-and-venus text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <select name="gender" id="gender"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer flex justify-center items-center">
                            <option value="null" selected>Selecione:</option>
                            <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="feminino" {{ old('gender') == 'feminino' ? 'selected' : '' }}>Feminino</option>
                            <option value="não_informado" {{ old('gender') == 'não_informado' ? 'selected' : '' }}>Não
                                informar</option>
                        </select>
                    </div>

                    {{-- E-mail --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-envelope text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <input type="text" name="email" id="email" placeholder="exemplo@dominio.com"
                            value="{{ old('email') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer"
                            autocomplete="off">
                    </div>

                    {{-- Telefone --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-phone text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX"
                            value="{{ old('telephone') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer"
                            autocomplete="off">
                    </div>

                    {{-- Empresa --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-industry text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <select name="enterprise_id" id="enterpriseSelect"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer flex justify-center items-center">
                            <option value="null">Selecione:</option>

                            @foreach ($enterprises as $enterprise)
                                <option value="{{ $enterprise->id }}"
                                    {{ old('enterprise') == $enterprise->id ? 'selected' : '' }}>
                                    {{ $enterprise->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filial --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-code-branch text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <select name="branch_id" id="branchSelect"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer flex justify-center items-center">
                            <option value="null">Selecione a empresa</option>
                        </select>
                    </div>

                    {{-- Senha --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-lock text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <input type="password" name="password" id="password" placeholder="************"
                            value="{{ old('password') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer"
                            autocomplete="off">
                    </div>

                    {{-- Confirmar senha --}}
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-unlock text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <input type="password" name="confirmation_password" id="confirmation_password"
                            placeholder="Confirme-a" value="{{ old('password') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer"
                            autocomplete="off">
                    </div>

                </div>

                {{-- Nível de acesso --}}
                <div class="w-full flex justify-center">
                    <div class="inline-flex focus-within:shadow-[0_0_15px_rgba(0,0,0,0.15)] h-8 w-60 mx-auto mb-7">
                        <div
                            class="bg-[#C0C0C0] border-2 border-[#808080] rounded-l-sm h-8 w-10 flex justify-center items-center">
                            <i class="fa-solid fa-universal-access text-[#4F4F4F] font-semibold"></i>
                        </div>
                        <select name="level_access" id="level_access"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer flex justify-center items-center">
                            <option value="null">Selecione:</option>

                            @foreach ($levels_access as $level_access)
                                <option value="{{ $level_access->id }}"
                                    {{ old('enterprise') == $level_access->id ? 'selected' : '' }}>
                                    {{ $level_access->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="w-full inline-flex justify-center -mt-5 mb-7">
                    <button type="submit"
                        class="bg-[#32CD32] border-3 border-[#228B22] text-[#008000] p-2 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-[#228B22] hover:text-[#32CD32] transition-all duration-300 ease-in-out gap-1 ml-3 mt-3">
                        Criar
                        <i class="fa-solid fa-circle-check text-lg"></i>
                    </button>

                </div>
            </form>
        </div>

        <div class="mb-5 justify-between w-50">
            {{ $users->links() }}
        </div>

    </section>

    <script>
        document.getElementById('enterpriseSelect').addEventListener('change', function() {
            /* Quando o usuário selecionar a empresa */

            let enterpriseId = this
                .value; // Captura o ID da empresa selecionada, ou seja, o valor do campo que foi selecionado
            let branchSelect = document.getElementById('branchSelect'); // Captura o ID do select do campo filial

            branchSelect.innerHTML =
                '<option>Carregando...</option>'; // Quando o usuário está selecionando a empresa o campo da filial aparece essa mensagem.

            fetch(`users/branchs/by-enterprise/${enterpriseId}`).then(response => response.json()).then(data => {

                    /* O fetch faz uma requisição http ao Laravel, através desta rota (branchs/by-enterprise/${enterpriseId}), para receber os dados, que retorna um json, depois o js recebe este json e o transforma em um objeto js (then(response => response.json())) */

                    /* O then recebe a resposta da requisição anterior e a atribui, neste caso atribuiu o resultado do fetch e o transformou em um json*/
                    branchSelect.innerHTML = '<option value="">Selecione:</option>';

                    data.forEach(
                        branch => { // Depois, data (que contem um array com as informações obtidas), é lida pelo forEach, onde as informações de cada lida é passada para 'branch'

                            let option = document.createElement(
                                'option'
                                ); // document.createElement cria um elemento (option), mas ele fica só na memória, não vai para o DOM

                            option.value = branch
                                .id; // Value do option recebe o ID da branch (branch aqui é o parâmetro do forEach)
                            option.text = branch
                                .city; // Value do option recebe o ID da cidade (branch aqui é o parâmetro do forEach)

                            branchSelect.appendChild(option); // appendChild faz o elemento ir para o DOM

                        });

                })
                .catch(error => {
                    console.error(error);
                    branchSelect.innerHTML = '<option>Erro!</option>';
                })
        });
    </script>
@endsection
