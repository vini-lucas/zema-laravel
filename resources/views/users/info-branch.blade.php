@extends('layouts.admin')

@section('content')
    <h2>Selecionar Empresa</h2>

    <x-alert />

    <form action="{{ route('users.create.enterprise') }}" method="POST">
        @csrf
        @method('POST')

        <label for="enterprise">Empresa:</label>
        <select name="enterprise" id="enterprise">
            <option value="null" selected>Selecione:</option>
            @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->id }}" {{ old('enterprise') == $enterprise->id ? 'selected' : '' }}>
                    {{ $enterprise->name }}</option>
            @endforeach
        </select>
        <input type="hidden" name="name" value="{{ $data->name }}">
        <input type="hidden" name="cpf" value="{{ $data->cpf }}">
        <input type="hidden" name="date_birth" value="{{ $data->date_birth }}">
        <input type="hidden" name="gender" value="{{ $data->gender }}">
        <input type="hidden" name="email" value="{{ $data->email }}">
        <input type="hidden" name="telephone" value="{{ $data->telephone }}">
        <input type="hidden" name="password" value="{{ $data->password }}">
        <input type="hidden" name="confirmation_password" value="{{ $data->confirmation_password }}">

        <button type="submit">Pesquisar filiais</button><br><br>
    </form>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        @method('POST')
        <label for="branch_id">Filial:</label>
        <select name="branch_id" id="branch_id">
            @if ($branches != 'null')
            <option value="null" selected>Selecione:</option> 
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                        {{ $branch->city }}</option>
                @endforeach
            @else
                <option value="null_enterprise">Selecione a Empresa!</option>
            @endif
        </select><br><br>

        <input type="hidden" name="name" value="{{ $data->name }}">
        <input type="hidden" name="cpf" value="{{ $data->cpf }}">
        <input type="hidden" name="date_birth" value="{{ $data->date_birth }}">
        <input type="hidden" name="gender" value="{{ $data->gender }}">
        <input type="hidden" name="email" value="{{ $data->email }}">
        <input type="hidden" name="telephone" value="{{ $data->telephone }}">
        <input type="hidden" name="password" value="{{ $data->password }}">
        <input type="hidden" name="confirmation_password" value="{{ $data->confirmation_password }}">


        <button type="submit">Cadastrar</button> - <a href="{{ route('back') }}">Voltar</a>
    </form>
@endsection
