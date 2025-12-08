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
            <th></th>
        </tr>
        @forelse ($alters as $alter)
            <tr>
                <td>{{ $alter->user }} </td>
                <td>
                    <ul>
                        @foreach ($values as $a => $b)
                            @foreach ($alter->values_before as $key => $before)
                                @if ($key == $a)
                                    <li><strong>{{ $b }}:</strong> {{ $before }}</li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($values as $a => $b)
                            @foreach ($results as $c => $d)
                                @foreach ($alter->values_after as $chave => $after)
                                    @if ($chave == $a)
                                        @if ($after == $c)
                                            <li><strong>{{ $b }}:</strong> {{ $d }}</li>
                                        @else
                                            <li><strong>{{ $b }}:</strong> {{ $after }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </ul>
                </td>
                <td>{{ \Carbon\Carbon::parse($alter->created_at)->format('d/m/Y') }} às
                    {{ \Carbon\Carbon::parse($alter->created_at)->format('H:i:s') }}
                </td>
            </tr>
        @empty
            <p style="color: #f00">Sem alterações realizadas!</p>
        @endforelse
    </table><br><br>

    <a href="{{ route($table . '.index') }}">Voltar</a>
@endsection
