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
                <th>Instrução:</th>
                <th>Observação da Mesa:</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->id }}</td>
                    <td>{{ $proposal->cpf }}</td>
                    <td>{{ $proposal->name }}</td>
                    <td>{{ $proposal->observation }}</td>
                    <td>{{ $proposal->name }}</td>
                    <td>Sem Ações</td>
                @empty
                    <span style="color: #f00">0 resultados encontrados!</span>
            @endforelse
            </tr>
        </tbody>
    </table><br>

    <button id="btnOpenModalCreateProposal">Cadastrar</button> - <a href="{{ route('dashboard') }}">Dashboard</a>

    <div id="modalCreateProposal" style="background-color: #A9A9A9; display: none; margin: 0px 35%; padding: 10px; width: 400px; justify-content: center; align-items: center; box-shadow: 5px 5px 10px rgba(0,0,0,0.5);">
        <form action="{{ route('inss.store') }}" method="post">
            @csrf
            @method('POST')

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX"
                value="{{ old('cpf') }}"><br><br>

            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" placeholder="Nome Completo"
                value="{{ old('name') }}"><br><br>

            <label for="date_birth">Nascimento:</label>
            <input type="date" name="date_birth" id="date_birth" value="{{ old('date_birth') }}"><br><br>

            <label for="telephone">Telefone:</label>
            <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX"
                value="{{ old('telephone') }}"><br><br>

            <label for="literate">Alfabetizado?</label>
            <select name="literate" id="literate">
                <option value="null" {{ old('literate') == 'null' ? 'selected' : '' }}>Selecione:</option>
                <option value="1" {{ old('literate') == '1' ? 'selected' : '' }}>Sim</option>
                <option value="2" {{ old('literate') == '2' ? 'selected' : '' }}>Não</option>
            </select><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
@endsection
