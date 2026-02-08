@extends('layouts.admin')

@section('content')

<!-- Trilha de navegação -->
    <div class="w-full inline-flex gap-1 justify-end pr-2">
        <h6 class="text-[#808080]"><a href="{{ route('dashboard') }}">Dashboard</a></h6>
        <span class="text-[#808080]">/</span>
        <h6 class="text-[#363636]">Filiais</h6>
    </div>

    {{-- <h2>Filiais</h2>

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
                            <button type="submit" onclick="return confirm('Confirmar a exclusão deste registro?')">Apagar</button>
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
    <a href="{{ route('dashboard') }}">Dashboard</a> --}}

    <section
        class="flex flex-col min-h-140 2xl:min-h-195 sm:min-h-118 border border-solid border-[#808080] rounded-md mx-3 my-3 sm:ml-67 transform duration-300 ease-in-out text-center"
        id="content">
            <h2 class="font-semibold mt-5">PÁGINA EM MANUTENÇÃO, RETORNO NOVAMENTE POSTERIORMENTE!</h2>
    </section>
    
@endsection
