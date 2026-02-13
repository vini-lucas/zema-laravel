@extends('layouts.admin')
@section('content')
    <div class="absolute top-0 right-0 h-15 w-60 bg-red-400 transform transition-transform translate-x-full duration-600 ease-in-out rounded-md text-red-800 font-semibold text-md flex justify-center items-center border-3 border-red-800"
        id="msgErrorRed">
        <p id="pMsgError" class="text-center"></p>
        <i class="fa-solid fa-x text-[8px] absolute top-0 right-0 mt-1 mr-1 cursor-pointer" onclick="closeMsgError()"></i>
    </div>

    <div class="absolute top-0 left-0 2xl:left-64 h-15 w-auto p-4 bg-green-400 transform transition-transform -translate-x-full duration-600 ease-in-out rounded-md text-green-800 font-semibold text-md flex justify-center items-center border-3 border-green-800"
        id="msgSuccessGreen">
        <p id="pMsgSuccess"></p>
        <i class="fa-solid fa-x text-[10px] absolute top-0 left-0 mt-1 ml-1 cursor-pointer" onclick="closeMsgSuccess()"></i>
    </div>

    <x-alert />

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
