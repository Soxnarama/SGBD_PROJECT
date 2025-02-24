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
        Schema::create('fichier_electeurs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nom');
            $table->string('empreinte_sha256');
            $table->date('dateUpload');
            $table->string('utilisateurUpload');
            $table->string('adresseIP');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichier_electeurs');
    }
};
