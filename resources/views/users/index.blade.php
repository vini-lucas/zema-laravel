@extends('layouts.admin')

@section('content')
    <h2>Usuários</h2>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->date_birth }}</td>
                    <td><a href="{{ route('users.show', ['user' => $user->id]) }}">Vizualizar</a> - <a href="">Apagar</a> - <a href="">Editar</a></td>
                </tr>
            @empty
                <p style="color: #f00">Nenhum registro encontrado!</p>
            @endforelse
            {{-- <tr>
                <td>1</td>
                <td>Lucas</td>
                <td>06/02/2006</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Elias</td>
                <td>13/08/2020</td>
            </tr> --}}
        </tbody>
    </table><br>

    <a href="{{ route('users.create') }}">Cadastrar</a> - <a href="{{ route('welcome') }}">Voltar</a>
@endsection