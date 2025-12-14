@extends('layouts.admin')

@section('content')
    <h2>Filiais</h2>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>Nº</th>
                <th>Empresa</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($branchs as $branch)
                <tr>
                    <td>{{ $branch->id }}</td>
                    <td>{{ $branch->enterprise->name }}</td>
                    <td>{{ $branch->city }}</td>
                    <td style="display: flex;"><a href="{{ route('branchs.show', ['branch' => $branch->id]) }}">Vizualizar</a>
                        - <a href="{{ route('branchs.edit', ['branch' => $branch->id]) }}">Editar</a> -
                        <form action="{{ route('branchs.destroy', ['branch' => $branch->id]) }}" method="POST">
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

    {{ $branchs->links() }} <br>

    @can('branchs.create')
        <a href="{{ route('branchs.create') }}">Cadastrar</a> -
    @endcan
    <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
