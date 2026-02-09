@extends('layouts.admin')
@section('content')

<!-- Trilha de navegação -->
    <div class="w-full inline-flex gap-1 justify-end pr-2 mt-2 -ml-2">
        <h6 class="text-[#363636]">Dashboard</h6>
    </div>
    
    <section
        class="flex flex-col min-h-140 2xl:min-h-195 sm:min-h-114 border border-solid border-[#808080] rounded-md mx-3 my-3 sm:ml-67 transform duration-300 ease-in-out text-center"
        id="content">
            <h2 class="font-bold text-[#696969] mt-5">Olá, {{ ucfirst($name . '!') }} </h2><br>
            <h2 class="font-semibold">PÁGINA EM MANUTENÇÃO, RETORNE NOVAMENTE POSTERIORMENTE!</h2>
    </section>
@endsection
