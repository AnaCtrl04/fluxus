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
    Schema::create('transferencias', function (Blueprint $table) {
        $table->id();
        $table->foreignId('conta_origem_id')->constrained('contas')->onDelete('cascade');
        $table->foreignId('conta_destino_id')->constrained('contas')->onDelete('cascade');
        $table->decimal('valor', 10, 2);
        $table->date('data');
        $table->string('descricao')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferencias');
    }
};
