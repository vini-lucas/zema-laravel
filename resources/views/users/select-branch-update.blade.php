@extends('layouts.admin')

@section('content')
    <h2>Editar Usuário</h2>

    <x-alert />

    <label for="enterprise">Empresa:</label>
    <select name="enterprise" id="enterprise">
        <option value="{{ $enterprise_active->id }}"> {{ $enterprise_active->name }} </option>
    </select> - <a href="{{ route('users.select-enterprise-update', ['user' => $user]) }}">Selecionar outra empresa</a><br><br>

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="name" value="{{ $user->name }}">
        <input type="hidden" name="date_birth" value="{{ $user->date_birth }}">
        <input type="hidden" name="gender" value="{{ $user->gender }}">
        <input type="hidden" name="email" value="{{ $user->email }}">
        <input type="hidden" name="telephone" value="{{ $user->telephone }}">

        <label for="branch_id">Filiais:</label>
        <select name="branch_id" id="branch_id">
            <option value="null">Selecione:</option>
            @foreach ($branches as $branch)
               <option value="{{ $branch->id }}">{{ $branch->id . ' - ' . $enterprise_active->name . ' | ' . $branch->city }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Selecionar</button> - <a href="{{ route('users.edit', ['user' => $user]) }}">Voltar</a>
    </form>
@endsection
