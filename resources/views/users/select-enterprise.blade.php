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
            @if (is_array($enterprises))
                @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->id }}" {{ old('enterprise') == $enterprise->id ? 'selected' : '' }}>
                    {{ $enterprise->name }}</option>
            @endforeach
            @else
                <option value="{{ $enterprises->id }}" {{ old('enterprise') == $enterprises->id ? 'selected' : '' }}>
                    {{ $enterprises->name }}</option>
            @endif
        </select> -
        <button type="submit">Buscar filiais</button><br><br>
    </form>

    <label for="branch">Filiais:</label>
    <select name="branch_id" id="branch">
        <option value="null">Selecione a empresa!</option>
    </select><br><br>

    <a href="{{ route('users.index') }}">Voltar</a>
@endsection
