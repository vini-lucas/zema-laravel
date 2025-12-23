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
        Schema::create('inss', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('name');
            $table->date('date_birth');
            $table->string('naturalness')->nullable();
            $table->integer('literate');   
            $table->string('telephone');
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->string('bank')->nullable();
            $table->string('agency')->nullable();
            $table->string('account')->nullable();
            $table->string('type_loan')->nullable();
            $table->string('value')->nullable();
            $table->string('term')->nullable();
            $table->string('value_portion')->nullable();
            $table->string('bank_typed')->nullable();
            $table->string('promoter')->nullable();
            $table->string('link')->nullable();
            $table->integer('internship');
            $table->integer('possession');
            $table->string('situation');
            $table->string('instruction');
            $table->string('observation')->nullable();
            $table->string('seller_cpf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inss');
    }
};
