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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('apartamento_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->date('data_venda');

            $table->decimal('valor_venda', 12, 2);

            $table->text('observacoes')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
