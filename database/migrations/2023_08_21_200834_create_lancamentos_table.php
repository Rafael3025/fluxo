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
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->increments('id_lancamento');
            $table->integer('id_user');
            $table->integer('id_tipo')->default(1);
            $table->integer('id_centro_custo')->default(1);
            $table->decimal('valor',10,2)->default(0);
            $table->date('vencimento')->nullable()->default(now());
            $table->string('descricao',150)->nullable();
            $table->string('anexo',100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamentos');
    }
};
