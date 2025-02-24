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
        Schema::create('periode_parrainages', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->enum('statut', ['ouvert', 'fermé']);
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_parrainages');
    }
};
