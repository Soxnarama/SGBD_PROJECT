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
        Schema::create('table_temporaire_electeurs', function (Blueprint $table) {
            $table->integer('numeroTentative')->primary();
            $table->string('numeroCarteIdentite');
            $table->string('numeroCarteElecteur');
            $table->string('natureProbleme');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_temporaire_electeurs');
    }
};
