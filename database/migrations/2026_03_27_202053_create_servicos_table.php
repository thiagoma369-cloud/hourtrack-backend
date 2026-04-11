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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();

            $table->date('data');
            $table->string('maquina');
            $table->string('contratante');
            $table->string('tipo');

            $table->decimal('valor_hora', 10, 2);#10: total de digitos, 2: casas decimais
            $table->integer('horas');

            $table->timestamps();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
