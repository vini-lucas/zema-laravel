<div>
    <a href="{{ route('enterprises.index') }}">Empresas</a>
    <h2>Cadastrar Empresa:</h2>

    <form action="{{ route('enterprises.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}"><br>

        <label for="cnpj">CNPJ:</label><br>
        <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}"><br>

        <label for="email">E-mail:</label><br>
        <input type="text" name="email" id="email" value="{{ old('email') }}"><br>

        <label for="telephone">Telefone:</label><br>
        <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}"><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('enterprises.index') }}">Voltar</a>
    </form>
</div>
