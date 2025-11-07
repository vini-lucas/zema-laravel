@extends('layouts.admin')

@section('content')
    <h2>Selecionar Empresa</h2>

    <x-alert />

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="enterprise">Empresa:</label>
        <select name="enterprise" id="enterprise">
            <option value="null" selected>Selecione:</option>
            {{-- @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->id }}" {{ (old('branch_id') == $enterprise->id) ? 'selected' : '' }} >{{ $enterprise->name }}</option>
            @endforeach --}}
        </select>
        <button type="submit">Pesquisar filiais</button><br><br>
        
        <label for="branch_id">Filial:</label>
        <select name="branch_id" id="branch_id">
            <option value="null" selected>Selecione:</option>
            {{-- @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->id }}" {{ (old('branch_id') == $enterprise->id) ? 'selected' : '' }} >{{ $enterprise->name }}</option>
            @endforeach --}}
        </select><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('users.index') }}">Voltar</a>
    </form>
@endsection