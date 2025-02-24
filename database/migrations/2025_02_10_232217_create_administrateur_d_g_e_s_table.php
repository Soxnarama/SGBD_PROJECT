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
        Schema::create('administrateurs_dge', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresseEmail');
            $table->string('motDePasse');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrateur_dge');
    }
};
