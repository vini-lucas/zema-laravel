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
        class="flex flex-col min-h-140 2xl:min-h-195 sm:min-h-118 border border-solid border-[#808080] rounded-md mx-3 my-2 sm:ml-67 transform duration-300 ease-in-out"
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
                <?php
                $cpf_array = str_split($user->cpf);
                $cpf = $cpf_array[0] . $cpf_array[1] . $cpf_array[2] . '.' . $cpf_array[3] . $cpf_array[4] . $cpf_array[5] . '.' . $cpf_array[6] . $cpf_array[7] . $cpf_array[8] . '-' . $cpf_array[9] . $cpf_array[10];
                $telephone_array = str_split($user->telephone);
                $telephone = '(' . $telephone_array[0] . $telephone_array[1] . ')' . ' ' . $telephone_array[2] . ' ' . $telephone_array[3] . $telephone_array[4] . $telephone_array[5] . $telephone_array[6] . ' - ' . $telephone_array[7] . $telephone_array[8] . $telephone_array[9] . $telephone_array[10];
                ?>
                <div class="bg-[#DCDCDC] fixed border border-solid border-[#808080] rounded-md shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30 w-80 h-80 top-50 left-30 sm:w-100 sm:h-100 sm:left-152.5 sm:top-32 2xl:left-220 2xl:top-70 z-50 flex flex-col hidden"
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
                        <div class="2xl:max-w-45 2xl:w-45 w-36.5 flex justify-center items-center">
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

            @empty
                <p style="color: #f00">Nenhum registro encontrado!</p>
            @endforelse
        </div>

    </section>

    {{ $users->links() }} <br>

    <a href="{{ route('users.select-enterprise') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
