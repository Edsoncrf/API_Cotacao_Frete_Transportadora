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
        Schema::create('cotacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_servico');
            $table->integer('prazo_entrega');
            $table->integer('peso_final');
            $table->integer('peso_inicial');
            $table->decimal('valor', 15, 2);
            $table->string('cep_inicio', 50);
            $table->string('cep_final', 50);
            // $table->timestamps();

            $table->foreign('id_servico')->references('id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotacao');
    }
};
