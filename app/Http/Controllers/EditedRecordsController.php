<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EditedRecord;
use Illuminate\Http\Request;

class EditedRecordsController extends Controller
{
    public function index($table, $register)
    {
        $values = [
            'name' => 'Nome',
            'cnpj' => 'CNPJ',
            'email' => 'E-mail',
            'telephone' => 'Telefone',
            'city' => 'Cidade',
            'enterprise_id' => 'Empresa',
            'website' => 'Site',
            'status_id' => 'Status',
            'logo' => 'Logo',
            'description' => 'Descrição',
            'months_guarantee' => 'Garantia (meses)',
            'factory_price' => 'Preço (fábrica)',
            'flat_id' => 'Plano',
            'cpf' => 'CPF',
            'date_birth' => 'Nascimento',
            'gender' => 'Gênero',
            'branch_id' => 'Filial',
            'level_access_id' => 'Papél'
        ];
        $results = [
            'masculino' => 'Masculino',
            'feminino' => 'Feminino',
            'não_informado' => 'Não informado'
        ];
        $alters = EditedRecord::where('table', $table)->where('id_register', $register)->get();
        return view('edited_records.index', ['alters' => $alters, 'table' => $table, 'values' => $values, 'results' => $results]);
    }
}
