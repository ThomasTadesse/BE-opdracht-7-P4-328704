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
    public function up(): void
    {
        DB::unprepared('
        DROP PROCEDURE IF EXISTS sp_createInstructeur;
            CREATE PROCEDURE sp_createInstructeur(
                IN p_voornaam VARCHAR(50),
                IN p_tussenvoegsel VARCHAR(10),
                IN p_achternaam VARCHAR(50),
                IN p_mobiel VARCHAR(12),
                IN p_datum_in_dienst DATE,
                IN p_aantal_sterren INT
            )
            BEGIN
                INSERT INTO Instructeurs (
                    voornaam, 
                    tussenvoegsel, 
                    achternaam, 
                    mobiel, 
                    datum_in_dienst, 
                    aantal_sterren,
                    is_actief
                ) VALUES (
                    p_voornaam,
                    p_tussenvoegsel,
                    p_achternaam,
                    p_mobiel,
                    p_datum_in_dienst,
                    p_aantal_sterren,
                    1
                );
                
                SELECT LAST_INSERT_ID() AS instructeur_id;
            END
        ');

        DB::unprepared('
        DROP PROCEDURE IF EXISTS sp_updateInstructeur;
            CREATE PROCEDURE sp_updateInstructeur(
                IN p_instructeur_id INT,
                IN p_voornaam VARCHAR(50),
                IN p_tussenvoegsel VARCHAR(10),
                IN p_achternaam VARCHAR(50),
                IN p_mobiel VARCHAR(12),
                IN p_datum_in_dienst DATE,
                IN p_aantal_sterren INT
            )
            BEGIN
                UPDATE Instructeurs
                SET 
                    voornaam = p_voornaam,
                    tussenvoegsel = p_tussenvoegsel,
                    achternaam = p_achternaam,
                    mobiel = p_mobiel,
                    datum_in_dienst = p_datum_in_dienst,
                    aantal_sterren = p_aantal_sterren
                WHERE 
                    id = p_instructeur_id 
                    AND is_actief = 1;
            END
        ');

        DB::unprepared('
        DROP PROCEDURE IF EXISTS sp_getInstructeurById;
            CREATE PROCEDURE sp_getInstructeurById(
                IN p_instructeur_id INT
            )
            BEGIN
                SELECT
                    id,
                    voornaam,
                    tussenvoegsel,
                    achternaam,
                    mobiel,
                    datum_in_dienst,
                    aantal_sterren
                FROM
                    Instructeurs
                WHERE
                    id = p_instructeur_id
                    AND is_actief = 1;
            END
        ');
        
        DB::unprepared('
        DROP PROCEDURE IF EXISTS sp_deleteInstructeur;
            CREATE PROCEDURE sp_deleteInstructeur(
                IN p_instructeur_id INT
            )
            BEGIN
                UPDATE Instructeurs
                SET is_actief = 0
                WHERE id = p_instructeur_id;
                
                -- Also deactivate vehicle assignments for this instructor
                UPDATE VoertuigInstructeurs
                SET is_actief = 0
                WHERE instructeur_id = p_instructeur_id
                AND is_actief = 1;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_createInstructeur');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_updateInstructeur');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_getInstructeurById');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_deleteInstructeur');
    }
};
