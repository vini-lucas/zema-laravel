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
                    <td style="display: flex;"><a href="{{ route('users.show', ['user' => $user->id]) }}">Vizualizar</a> - <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a> - 
                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="confirm('Confirmar a exclusão deste registro?')">Apagar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p style="color: #f00">Nenhum registro encontrado!</p>
            @endforelse
        </tbody>
    </table><br>

    {{ $users->links() }} <br>

    <a href="{{ route('users.select-enterprise') }}">Cadastrar</a> - <a href="{{ route('welcome') }}">Voltar</a>
@endsection
