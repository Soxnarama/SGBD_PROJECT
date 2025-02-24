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
        Schema::create('electeurs', function (Blueprint $table) {
            $table->string('numeroCarteElecteur')->primary();
            $table->string('numeroCarteIdentite');
            $table->string('nomDeFamille');
            $table->integer('numeroBureauVote');
            $table->string('adresseEmail');
            $table->string('numeroTelephone');
            $table->string('prenom');
            $table->date('dateNaissance');
            $table->string('lieuNaissance');
            $table->enum('sexe', ['Masculin', 'Féminin']);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electeurs');
    }
};
