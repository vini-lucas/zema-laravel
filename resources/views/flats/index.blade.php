@extends('layouts.admin')

@section('content')
    <h2>Planos</h2>

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
            @forelse ($flats as $flat)
                <tr>
                    <td>{{ $flat->id }}</td>
                    <td>{{ $flat->name }}</td>
                    <td>{{ $flat->description }}</td>
                    <td style="display: flex;"><a href="{{ route('flats.show', ['flat' => $flat->id]) }}">Vizualizar</a> - <a href="{{ route('flats.edit', ['flat' => $flat->id]) }}">Editar</a> - 
                        <form action="{{ route('flats.destroy', ['flat' => $flat->id]) }}" method="POST">
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

    {{ $flats->links() }} <br>

    <a href="{{ route('flats.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
