@extends('layouts.admin')

@section('content')
    <h2>Status</h2>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->description }}</td>
                    <td style="display: flex;"><a href="{{ route('statuses.show', ['status' => $status->id]) }}">Vizualizar</a> - <a href="{{ route('statuses.edit', ['status' => $status->id]) }}">Editar</a> - 
                        <form action="{{ route('statuses.destroy', ['status' => $status->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Confirmar a exclusão deste registro?')">Apagar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p style="color: #f00">Nenhum registro encontrado!</p>
            @endforelse
        </tbody>
    </table><br>

    {{ $statuses->links() }} <br>

    <a href="{{ route('statuses.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
