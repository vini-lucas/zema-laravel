@extends('layouts.login')

@section('content')
    <div class="absolute top-0 right-0 h-15 w-60 bg-red-400 transform transition-transform translate-x-full duration-600 ease-in-out rounded-md text-red-800 font-semibold text-md flex justify-center items-center border-3 border-red-800"
        id="msgErrorRed">
        <p id="pMsgError" class="text-center"></p>
        <i class="fa-solid fa-x text-[10px] absolute top-0 right-0 mt-1 mr-1 cursor-pointer" onclick="closeMsgError()"></i>
    </div>

    <div class="absolute top-0 left-0 h-15 w-170 bg-green-400 transform transition-transform -translate-x-full duration-600 ease-in-out rounded-md text-green-800 font-semibold text-md flex justify-center items-center border-3 border-green-800"
        id="msgSuccessGreen">
        <p id="pMsgSuccess"></p>
        <i class="fa-solid fa-x text-[10px] absolute top-0 left-0 mt-1 ml-1 cursor-pointer" onclick="closeMsgSuccess()"></i>
    </div>

    <x-alert />

    <form action="{{ route('login.proccess') }}" method="POST">
        @csrf
        @method('POST')

        {{-- Formulário conectar-se --}}
        <div class="w-full sm:w-150 h-60 bg-[#DCDCDC] rounded-md flex items-center justify-center shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-[#3030D6]"
            id="formLogin">

            <div class="h-45 w-full flex items-center justify-center flex-col gap-4">

                <h2 class="-mt-5 text-2xl font-serif">Conecte-se!</h2>

                <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"
                    class="w-[80%] h-8 bg-[#C0C0C0] border-2 border-[#808080] rounded-sm text-center text-[#4F4F4F] font-semibold focus:outline-none focus:shadow-[0_0_15px_rgba(0,0,0,0.15)] focus:shadow-black/30 cursor-pointer"
                    autocomplete="off">

                <input type="password" name="password" id="password" placeholder="************"
                    value="{{ old('password') }}"
                    class="w-[80%] h-8 bg-[#C0C0C0] border-2 border-[#808080] rounded-sm text-center text-[#4F4F4F] font-bold focus:outline-none focus:shadow-[0_0_15px_rgba(0,0,0,0.15)] focus:shadow-black/30 text-lg cursor-pointer mb-5"
                    autocomplete="off">

                <div class="w-full h-10 -mb-4 flex justify-center px-2 gap-2">
                    <button type="submit"
                        class="bg-[#32CD32] border-3 border-[#228B22] text-[#008000] p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-[#228B22] hover:text-[#32CD32] transition-all duration-300 ease-in-out gap-1">
                        Entrar
                        <i class="fa-solid fa-arrow-right-to-bracket text-lg"></i>
                    </button>
                    <div class="inline-flex gap-2">
                        <button type="button"
                            class="bg-red-400 border-3 border-red-700 text-red-800 p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-red-700 hover:text-red-400 transition-all duration-300 ease-in-out gap-1"
                            onclick="openFormRecover()">
                            Esqueceu?
                            <i class="fa-solid fa-user-pen"></i>
                        </button>
                        <button type="button"
                            class="bg-blue-400 border-3 border-blue-700 text-blue-800 p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-blue-700 hover:text-blue-400 transition-all duration-300 ease-in-out gap-1" onclick="openFormSubscribe()">
                            Sou NOVO!
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>


    </form>

    {{-- Formulário esqueceu a senha --}}
    <form action="{{ route('storeRecover.create') }}" method="POST">
        @csrf
        @method('POST')

        <div class="w-full sm:w-150 h-60 bg-[#DCDCDC] rounded-md flex items-center justify-center shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-[#3030D6] hidden"
            id="formRecover">

            <div class="h-45 w-full flex items-center justify-center flex-col gap-4">

                <h2 class="-mt-5 text-2xl font-serif">Reconecte-se!</h2>

                <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"
                    class="w-[80%] h-8 bg-[#C0C0C0] border-2 border-[#808080] rounded-sm text-center text-[#4F4F4F] font-semibold focus:outline-none focus:shadow-[0_0_15px_rgba(0,0,0,0.15)] focus:shadow-black/30 cursor-pointer"
                    autocomplete="off">

                <div class="w-full h-10 -mb-4 flex justify-center px-2 gap-2">
                    <button type="submit"
                        class="bg-[#32CD32] border-3 border-[#228B22] text-[#008000] p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-[#228B22] hover:text-[#32CD32] transition-all duration-300 ease-in-out gap-1">
                        Recuperar
                        <i class="fa-solid fa-arrow-right-to-bracket text-lg"></i>
                    </button>
                    <button type="button"
                        class="bg-blue-400 border-3 border-blue-700 text-blue-800 p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-blue-700 hover:text-blue-400 transition-all duration-300 ease-in-out gap-1"
                        onclick="openFormConect()">
                        Lembrou?
                        <i class="fa-solid fa-circle-exclamation text-lg"></i>
                    </button>

                </div>
            </div>
        </div>
    </form>

    {{-- Formulário criar acesso --}}
    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="w-full sm:w-150 h-100 bg-[#DCDCDC] rounded-md flex items-center justify-center shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-[#3030D6] hidden"
            id="formSubscribe">

            <div class="h-45 w-full flex items-center justify-center flex-col gap-4">

                <h2 class="-mt-5 text-2xl font-serif">Cadastre-se!</h2>

                <div class="grid grid-cols-2 w-ful h-full justify-items-center gap-4">

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
                        <select name="gender" id="gender" class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer flex justify-center items-center">
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
                        <input type="password" name="confirmation_password" id="confirmation_password" placeholder="Confirme-a"
                            value="{{ old('password') }}"
                            class="w-60 h-8 bg-[#C0C0C0] border-r-2 border-t-2 border-b-2 border-[#808080] rounded-r-sm text-center text-[#4F4F4F] font-semibold focus:outline-none cursor-pointer"
                            autocomplete="off">
                    </div>

                </div>

                <div class="w-full h-10 -mb-4 flex justify-center px-2 gap-2 mt-5">
                    <button type="submit"
                        class="bg-[#32CD32] border-3 border-[#228B22] text-[#008000] p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-[#228B22] hover:text-[#32CD32] transition-all duration-300 ease-in-out gap-1">
                        Cadastrar
                        <i class="fa-solid fa-arrow-right-to-bracket text-lg"></i>
                    </button>
                    <button type="button"
                        class="bg-blue-400 border-3 border-blue-700 text-blue-800 p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-blue-700 hover:text-blue-400 transition-all duration-300 ease-in-out gap-1"
                        onclick="openFormConect()">
                        Login
                        <i class="fa-solid fa-circle-exclamation text-lg"></i>
                    </button>

                </div>

            </div>

        </div>

    </form>
@endsection
