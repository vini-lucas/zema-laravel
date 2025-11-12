@extends('layouts.admin')

@section('content')
    <div>
        <h2>Histórico de alterações</h2>

        <x-alert />
    </div>

    <table>
        <tr>
            <th>Usuário que realizou a alteração:</th>
<th>Valores antes da alteração:</th>
            <th>Valores após a alteração:</th>
            <th>Data da alteração:</th>
        </tr>
        <tr>
            <td>Lucas</td>
            <td>Nome: teste</td>
            <td>Nome: teste1</td>
            <td>06/02/2006</td>
        </tr>
    </table><br><br>

    <a href="{{ route('enterprises.index') }}">Voltar</a>
@endsection
