@extends('layouts.login')

@section('content')
    <form action="{{ route('login.proccess') }}" method="POST">
        @csrf
        @method('POST')

        <div
            class="w-full sm:w-150 h-60 bg-[#DCDCDC] rounded-md flex items-center justify-center shadow-[0_0_15px_rgba(0,0,0,0.15)] shadow-black/30">
            <div class="h-45 w-full flex items-center justify-center flex-col gap-4">

                <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"
                    class="w-[80%] h-8 bg-[#C0C0C0] border-2 border-[#808080] rounded-sm text-center text-[#4F4F4F] font-semibold focus:outline-none focus:shadow-[0_0_15px_rgba(0,0,0,0.15)] focus:shadow-black/30 cursor-pointer"
                    autocomplete="off">

                <input type="password" name="password" id="password" placeholder="************"
                    value="{{ old('password') }}"
                    class="w-[80%] h-8 bg-[#C0C0C0] border-2 border-[#808080] rounded-sm text-center text-[#4F4F4F] font-bold focus:outline-none focus:shadow-[0_0_15px_rgba(0,0,0,0.15)] focus:shadow-black/30 text-lg cursor-pointer mb-5"
                    autocomplete="off">

                <div class="w-full h-10 -mb-8 flex justify-center sm:justify-between px-2">
                    <button type="submit"
                        class="bg-[#32CD32] border-3 border-[#228B22] text-[#008000] p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-70 hover:bg-[#228B22] hover:text-[#32CD32] transition-all duration-300 ease-in-out gap-1">
                        Entrar
                        <i class="fa-solid fa-arrow-right-to-bracket text-lg"></i>
                    </button>
                    <div class="inline-flex gap-2">
                        <button type="button" class="bg-red-400 border-3 border-red-700 text-red-800 p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-red-700 hover:text-red-400 transition-all duration-300 ease-in-out gap-1">
                            Esqueceu?
                            <i class="fa-solid fa-user-pen"></i>
                        </button>
                        <button type="button" class="bg-blue-400 border-3 border-blue-700 text-blue-800 p-4 rounded-sm text-sm font-bold flex items-center justify-center cursor-pointer w-35 hover:bg-blue-700 hover:text-blue-400 transition-all duration-300 ease-in-out gap-1">
                            Sou NOVO!
                        <i class="fa-solid fa-user-plus"></i>
                    </button>
                    </div>
                </div>

            </div>
        </div>


    </form>
    {{-- <h2>Conecte-se!</h2>

    <x-alert />

    <form action="{{ route('login.proccess') }}" method="POST">
        @csrf
        @method('POST')

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"><br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="****************" value="{{ old('password') }}"><br><br>

        <button type="submit">Entrar</button> - <a href="{{ route('login.create') }}">Sou novo!</a> - <a href="{{ route('recover.create') }}">Esqueceu?</a>
    </form> --}}
@endsection
