@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Usuário</h2>

    <x-alert />

    <label for="enterprise">Empresa:</label>
    <select name="enterprise" id="enterprise">
        <option value="{{ $enterprise_active->id }}"> {{ $enterprise_active->name }} </option>
    </select>

    <form method="POST" action="{{ route('users.select-enterprise-active') }}">
        @csrf
        @method('POST')

        <label for="branch">Filiais:</label>
        <select name="branch_id" id="branch">
            <option value="null">Selecione:</option>
            {{-- @foreach ($branches as $branch)
               <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach --}}
        </select>
        {{ dd($branch) }}
    </form>

    <a href="{{ route('users.select-enterprise') }}">Voltar</a>
@endsection
