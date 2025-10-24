<div>
    <a href="{{ route('enterprises.index') }}">Empresas</a>
    <h2>Listar Empresas:</h2>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <span>Empresa 1</span><br>
    <span>Empresa 2</span><br>
    <span>Empresa 3</span><br><br>

    <a href="{{ route('enterprises.create') }}">Cadastrar</a> - <a href="{{ route('welcome') }}">Voltar</a>
</div>
