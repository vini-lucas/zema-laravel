<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrations
     */
    public function up(): void
    {
        Schema::create('enterprises', function (Blueprint $table) {
            
            // O Laravel defina automaticamente que o id é uma chave primária, então não precisa declarar isto
            $table->id();

            $table->string('name', 45);

            // Declara que a coluna deve ser única
            $table->string('cnpj', 45)->unique();

            $table->string('email', 45)->unique();
            $table->string('telephone', 45)->unique();

            // Colunas padrões (created e modified)
            $table->timestamps();
        });
    }

    /**
     * Reverter a migration excluindo a tabela
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
