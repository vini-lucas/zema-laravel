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
                                @foreach ($results as $c => $d)
                                    @if ($before == $c)
                                        <?php
                                        $before = $d;
                                        ?>
                                    @endif
                                    @if ($key == 'date_birth')
                                        <?php
                                        $before = \Carbon\Carbon::parse($before)->format('d/m/Y');
                                        ?>
                                    @endif
                                    @if ($key == 'telephone')
                                        <?php
                                        $telephone_array = str_split($before);
                                        $before = '(' . $telephone_array[0] . $telephone_array[1] . ')' . ' ' . $telephone_array[2] . ' ' . $telephone_array[3] . $telephone_array[4] . $telephone_array[5] . $telephone_array[6] . '-' . $telephone_array[7] . $telephone_array[8] . $telephone_array[9] . $telephone_array[10];
                                        break;
                                        ?>
                                    @endif
                                @endforeach
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
                            @foreach ($alter->values_after as $chave => $after)
                                @foreach ($results as $c => $d)
                                    @if ($after == $c)
                                        <?php
                                        $after = $d;
                                        ?>
                                    @endif
                                    @if ($chave == 'date_birth')
                                        <?php
                                        $after = \Carbon\Carbon::parse($after)->format('d/m/Y');
                                        ?>
                                    @endif
                                    @if ($chave == 'telephone')
                                        <?php
                                        $telephone_array = str_split($after);
                                        $after = '(' . $telephone_array[0] . $telephone_array[1] . ')' . ' ' . $telephone_array[2] . ' ' . $telephone_array[3] . $telephone_array[4] . $telephone_array[5] . $telephone_array[6] . '-' . $telephone_array[7] . $telephone_array[8] . $telephone_array[9] . $telephone_array[10];
                                        break;
                                        ?>
                                    @endif
                                @endforeach
                                @if ($chave == $a)
                                    <li><strong>{{ $b }}:</strong> {{ $after }}</li>
                                @endif
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
