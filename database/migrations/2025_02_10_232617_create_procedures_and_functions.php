<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared("
            CREATE PROCEDURE ValiderImportation()
            BEGIN
                INSERT INTO electeurs (numeroCarteElecteur, numeroCarteIdentite, nomDeFamille, numeroBureauVote, adresseEmail, numeroTelephone, prenom, dateNaissance, lieuNaissance, sexe)
                SELECT numeroCarteElecteur, numeroCarteIdentite, nomDeFamille, numeroBureauVote, adresseEmail, numeroTelephone, prenom, dateNaissance, lieuNaissance, sexe
                FROM table_temporaire_electeurs;

                TRUNCATE TABLE table_temporaire_electeurs;
            END;
        ");

        DB::unprepared("
            CREATE PROCEDURE ControlerFichierElecteurs(IN empreinte VARCHAR(255))
            BEGIN
                INSERT INTO historique_uploads (utilisateurUpload, dateUpload, adresseIP, clefUtilisee)
                VALUES ('utilisateur', NOW(), '127.0.0.1', empreinte);
            END;
        ");

        DB::unprepared("
            CREATE FUNCTION ControlerElecteurs() RETURNS INT
            BEGIN
                DECLARE validite INT;
                SET validite = 1;
                RETURN validite;
            END;
        ");

        DB::unprepared("
            CREATE FUNCTION CHECKSUM(file BLOB) RETURNS VARCHAR(255)
            BEGIN
                DECLARE checksum VARCHAR(255);
                SET checksum = SHA2(file, 256);
                RETURN checksum;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS ValiderImportation');
        DB::unprepared('DROP PROCEDURE IF EXISTS ControlerFichierElecteurs');
        DB::unprepared('DROP FUNCTION IF EXISTS ControlerElecteurs');
        DB::unprepared('DROP FUNCTION IF EXISTS CHECKSUM');
    }

};
