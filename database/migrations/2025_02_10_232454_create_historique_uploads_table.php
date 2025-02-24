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
        Schema::create('historique_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('utilisateurUpload');
            $table->timestamp('dateUpload');
            $table->string('adresseIP');
            $table->string('clefUtilisee');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_uploads');
    }
};
