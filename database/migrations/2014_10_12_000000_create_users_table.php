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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        \App\Models\User::create([
            'name' => 'Thomas Melo',
            'email' => 'thomas.cmelo@sp.senac.br',
            'email_verified_at' => now(),
            'password' => '$2y$10$NWv1rNyKL6c5CbCaYaTAVOJ4O6WC.fPSlcUMzfTF3zOkNkjLwXK8G', //Senac@123
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
