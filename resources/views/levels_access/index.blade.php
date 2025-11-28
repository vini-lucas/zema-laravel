@extends('layouts.admin')

@section('content')
    <h2>Níveis de acesso</h2>

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
            @forelse ($levels_access as $level_access)
                <tr>
                    <td>{{ $level_access->id }}</td>
                    <td>{{ $level_access->name }}</td>
                    <td>{{ $level_access->description }}</td>
                    <td style="display: flex;"><a href="{{ route('levels_access.show', ['level_access' => $level_access->id]) }}">Vizualizar</a> - <a href="{{ route('levels_access.edit', ['level_access' => $level_access->id]) }}">Editar</a> - 
                        <form action="{{ route('levels_access.destroy', ['levels_access' => $level_access->id]) }}" method="POST">
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

    {{ $levels_access->links() }} <br>

    <a href="{{ route('levels_access.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
