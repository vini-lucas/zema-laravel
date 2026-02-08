@extends('layouts.admin')

@section('content')

<!-- Trilha de navegação -->
    <div class="w-full inline-flex gap-1 justify-end pr-2">
        <h6 class="text-[#808080]"><a href="{{ route('dashboard') }}">Dashboard</a></h6>
        <span class="text-[#808080]">/</span>
        <h6 class="text-[#363636]">Empresas</h6>
    </div>

    {{-- <h2>Empresas</h2>

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
                            <button type="submit" onclick="return confirm('Confirmar a exclusão deste registro?')">Apagar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p style="color: #f00">Nenhum registro encontrado!</p>
            @endforelse
        </tbody>
    </table><br>

    {{ $enterprises->links() }} <br>

    <a href="{{ route('enterprises.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a> --}}

    <section
        class="flex flex-col min-h-140 2xl:min-h-195 sm:min-h-118 border border-solid border-[#808080] rounded-md mx-3 my-3 sm:ml-67 transform duration-300 ease-in-out text-center"
        id="content">
            <h2 class="font-semibold mt-5">PÁGINA EM MANUTENÇÃO, RETORNO NOVAMENTE POSTERIORMENTE!</h2>
    </section>
    
@endsection
