@extends('layouts.admin')

@section('content')

    <h2>Perfil</h2>

    <span><strong>Nome: </strong></span> <span>{{ $user->name }}</span><br>
    <span><strong>CPF: </strong></span> <span>{{ $cpf }}</span><br>
    <span><strong>Nascimento: </strong></span> <span>{{ \Carbon\Carbon::parse($user->date_birth)->format('d/m/Y') . ' - ' . date('Y') - \Carbon\Carbon::parse($user->date_birth)->format('Y') . ' anos, ' . 12 - \Carbon\Carbon::parse($user->date_birth)->format('m') . ' meses e ' . date('d') . ' dias' }}</span><br>
    <span><strong>Gênero: </strong></span> <span>{{ ucfirst($user->gender) == 'Não_informado' ? 'Não informado' : ucfirst($user->gender) }}</span><br>
    <span><strong>E-mail: </strong></span> <span>{{ $user->email }}</span><br>
    <span><strong>Telefone: </strong></span> <span>{{ $telephone }}</span><br>
    <span><strong>Empresa - Filial: </strong></span> <span>{{ $enterprise->name . ' - ' . $branch->city }}</span><br>
    <span><strong>Acesso: </strong></span> <span>{{ $access->name }}</span><br>
    <span><strong>Foto: </strong></span> <span>Sem foto por ora</span><br><br>

    <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection
