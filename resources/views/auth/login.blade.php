@extends('layouts.login')

@section('content')
    <form action="{{ route('login.proccess') }}" method="POST">
        @csrf
        @method('POST')

        <div class="w-full sm:w-150 h-90 bg-[#DCDCDC] rounded-md flex items-center justify-center">
            <div class="bg-amber-500 h-45 w-full flex items-center justify-center flex-col gap-2">

                <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"
                    class="w-[50%] h-8 bg-[#C0C0C0] border-2 border-[#808080] rounded-sm text-center text-[#4F4F4F] font-semibold focus:outline-none focus:shadow-[0_0_15px_rgba(0,0,0,0.15)] focus:shadow-black/30"
                    autocomplete="off">

                <input type="password" name="password" id="password" placeholder="************"
                    value="{{ old('password') }}"
                    class="w-[50%] h-8 bg-[#C0C0C0] border-2 border-[#808080] rounded-sm text-center text-[#4F4F4F] font-bold focus:outline-none focus:shadow-[0_0_15px_rgba(0,0,0,0.15)] focus:shadow-black/30 text-lg"
                    autocomplete="off">

                <div class="bg-emerald-700 w-full h-10 -mb-15 flex justify-between">
                    <div>
                        <input type="submit" value="Entrar" class="">
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
