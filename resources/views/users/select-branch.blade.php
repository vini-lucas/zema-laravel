@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Usuário</h2>

    <x-alert />

    <label for="enterprise">Empresa:</label>
    <select name="enterprise" id="enterprise">
        <option value="{{ $enterprise_active->id }}"> {{ $enterprise_active->name }} </option>
    </select> - <a href="{{ route('users.select-enterprise') }}">Selecionar outra empresa</a><br><br>

    <form method="POST" action="{{ route('users.create') }}">
        @csrf
        @method('POST')

        <label for="branch">Filiais:</label>
        <select name="branch_id" id="branch">
            <option value="null">Selecione:</option>
            @foreach ($branches as $branch)
               <option value="{{ $branch->id }}">{{ $branch->id . ' - ' . $enterprise_active->name . ' | ' . $branch->city }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Selecionar</button> - <a href="{{ route('users.select-enterprise') }}">Voltar</a>
    </form>
@endsection
