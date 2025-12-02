@extends('layouts.admin')

@section('content')

    <h2>Perfil</h2>

    <span><strong>Nome: </strong></span> <span>{{ $user->name }}</span><br>
    <span><strong>CPF: </strong></span> <span>{{ $user->cpf }}</span><br>
    <span><strong>Nascimento: </strong></span> <span>{{ $user->date_birth }}</span><br>
    <span><strong>Gênero: </strong></span> <span>{{ $user->gender }}</span><br>
    <span><strong>E-mail: </strong></span> <span>{{ $user->email }}</span><br>
    <span><strong>Telefone: </strong></span> <span>{{ $user->telephone }}</span><br>
    <span><strong>Empresa - Filial: </strong></span> <span>{{ $enterprise->name . ' - ' . $branch->city }}</span><br>
    <span><strong>Acesso: </strong></span> <span>{{ $access->name }}</span><br>
    <span><strong>Foto: </strong></span> <span>Sem foto por ora</span><br><br>

    <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
