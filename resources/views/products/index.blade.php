@extends('layouts.admin')

@section('content')

<!-- Trilha de navegação -->
    <div class="w-full inline-flex gap-1 justify-end pr-2 mt-2 -ml-2">
        <h6 class="text-[#808080]"><a href="{{ route('dashboard') }}">Dashboard</a></h6>
        <span class="text-[#808080]">/</span>
        <h6 class="text-[#363636]">Produtos</h6>
    </div>

    {{-- <h2>Produtos</h2>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Loja</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->enterprise->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td style="display: flex;"><a href="{{ route('products.show', ['product' => $product->id]) }}">Vizualizar</a> - <a href="{{ route('products.edit', ['product' => $product->id]) }}">Editar</a> - 
                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
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

    {{ $products->links() }} <br>

    <a href="{{ route('products.create') }}">Cadastrar</a> - <a href="{{ route('dashboard') }}">Dashboard</a> --}}

    <section
        class="flex flex-col min-h-140 2xl:min-h-195 sm:min-h-114 border border-solid border-[#808080] rounded-md mx-3 my-3 sm:ml-67 transform duration-300 ease-in-out text-center"
        id="content">
            <h2 class="font-semibold mt-5">PÁGINA EM MANUTENÇÃO, RETORNE NOVAMENTE POSTERIORMENTE!</h2>
    </section>
    
@endsection
