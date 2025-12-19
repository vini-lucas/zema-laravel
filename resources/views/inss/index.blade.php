@extends('layouts.admin')

@section('content')
    <h2>INSS</h2>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>Número:</th>
                <th>CPF:</th>
                <th>Cliente:</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->id }}</td>
                    <td>{{ $proposal->cpf }}</td>
                    <td>{{ $proposal->name }}</td>
                    <td>Sem Ações</td>
                @empty
                    <span style="color: #f00">0 resultados encontrados!</span>
            @endforelse
            </tr>
        </tbody>
    </table><br>

    <a href="{{ route('inss.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
