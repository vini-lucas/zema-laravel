@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Usuário</h2>

    <x-alert />

    <form method="POST" action="{{ route('users.select-enterprise-active') }}">
        @csrf
        @method('POST')

        <label for="enterprise">Empresa:</label>
        <select name="enterprise" id="enterprise">
            <option value="null">Selecione:</option>
            @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->id }}" {{ old('enterprise') == $enterprise->id ? 'selected' : '' }}>
                    {{ $enterprise->name }}</option>
            @endforeach
        </select> -
        <button type="submit">Buscar filiais</button><br><br>
    </form>

    <label for="branch">Filiais:</label>
    <select name="branch_id" id="branch">
        <option value="null">Selecione a empresa!</option>
    </select>
@endsection
