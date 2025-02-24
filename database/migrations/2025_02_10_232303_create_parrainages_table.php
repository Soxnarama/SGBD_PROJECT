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
        Schema::create('parrainages', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->enum('statut', ['validé', 'en_attente', 'rejeté']);
            $table->date('dateParrainage');
            $table->string('numeroCarteElecteur');
            $table->string('numeroCarteElecteurCandidat');
            $table->timestamps();

            $table->foreign('numeroCarteElecteur')->references('numeroCarteElecteur')->on('electeurs')->onDelete('cascade');
            $table->foreign('numeroCarteElecteurCandidat')->references('numeroCarteElecteur')->on('candidats')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parrainages');
    }
};
