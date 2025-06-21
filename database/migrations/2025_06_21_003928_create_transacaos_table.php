<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transacaos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('conta_id')->constrained('contas')->onDelete('cascade');
        $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        $table->string('descricao');
        $table->decimal('valor', 10, 2);
        $table->date('data');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacaos');
    }
};
