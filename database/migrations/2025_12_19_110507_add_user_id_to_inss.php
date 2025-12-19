<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('inss', function (Blueprint $table) {
            $table->foreignId('user_id') // Nome da coluna com a chave estrangeira
                ->after('observation') // Coluna onde a chave estrangeira ficará logo após
                ->constrained('users') // Nome da coluna pai (onde a chave estrangeira retira informação)
                ->onUpdate('cascade') // Cascata: se apagar/editar a tabela pai as filhas também apagam/alteram.
                ->onDelete('restrict'); // Restrito: não edita/apaga a tabela pai se algum registro utilizar sua chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inss', function (Blueprint $table) {
            //
        });
    }
};
