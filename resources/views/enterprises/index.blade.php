@extends('layouts.admin')

@section('content')
    <h2>Empresas</h2>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Logo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enterprises as $enterprise)
                <tr>
                    <td>{{ $enterprise->id }}</td>
                    <td>{{ $enterprise->name }}</td>
                    <td>{{ $enterprise->logo }}</td>
                    <td style="display: flex;"><a href="{{ route('enterprises.show', ['enterprise' => $enterprise->id]) }}">Vizualizar</a> - <a href="{{ route('enterprises.edit', ['enterprise' => $enterprise->id]) }}">Editar</a> - 
                        <form action="{{ route('enterprises.destroy', ['enterprise' => $enterprise->id]) }}" method="POST">
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

    {{ $enterprises->links() }} <br>

    <a href="{{ route('enterprises.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
