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
            
        </tbody>
    </table><br>

    <a href="{{ route('inss.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
