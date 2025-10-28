<div>
    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    {{-- Se houver conflito de chave única duplicada, gera esta mensagem: --}}
    @if (str_contains(session('error'), 'SQLSTATE[23000]: Integrity constraint violation: 1062'))
        <p style="color: red">Um ou mais registros informados estão sendo utilizados por outro usuário!</p>
        
    @elseif (str_contains(session('error'), 'SQLSTATE[23000]: Integrity constraint violation: 1048'))
        <p style="color: red">Um ou mais campos obrigatórios não preenchidos!</p>

        {{-- Se houver qualquer erro que não seja o(s) de cima, gera esta mensagem --}}
    @elseif (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
</div>
