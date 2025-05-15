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
        DROP PROCEDURE IF EXISTS sp_getAllInstructeurs;
            CREATE PROCEDURE sp_getAllInstructeurs()
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
                    is_actief = 1
                ORDER BY
                    aantal_sterren DESC;
            END
        ');

        DB::unprepared('
        DROP PROCEDURE IF EXISTS sp_getVoertuigDetails;
            CREATE PROCEDURE sp_getVoertuigDetails(IN vehicleId INT)
            BEGIN
                SELECT
                    tvrtg.type_voertuig,
                    voer.type,
                    voer.kentkenen,
                    voer.bouwjaar,
                    voer.brandstof,
                    tvrtg.rijbewijscategorie
                FROM
                    Voertuigen voer
                INNER JOIN
                    TypeVoertuig tvrtg ON voer.type_voertuig_id = tvrtg.id
                WHERE
                    voer.is_actief = 1
                    AND (vehicleId IS NULL OR voer.id = vehicleId)
                ORDER BY
                    tvrtg.rijbewijscategorie ASC;
            END
        ');

        DB::unprepared('
        DROP PROCEDURE IF EXISTS sp_getAllAvailableVoertuigen;
            CREATE PROCEDURE sp_getAllAvailableVoertuigen()
            BEGIN
                SELECT
                    tvrtg.type_voertuig,
                    voer.type,
                    voer.kentkenen,
                    voer.bouwjaar,
                    voer.brandstof,
                    tvrtg.rijbewijscategorie
                FROM
                    Voertuigen voer
                INNER JOIN
                    TypeVoertuig tvrtg ON voer.type_voertuig_id = tvrtg.id
                WHERE
                    voer.is_actief = 1
                ORDER BY
                    tvrtg.rijbewijscategorie ASC;
            END
        ');
        
        DB::unprepared('
        DROP PROCEDURE IF EXISTS sp_updateVoertuig;
            CREATE PROCEDURE sp_updateVoertuig(
                IN p_voertuig_id INT,
                IN p_instructeur_id INT,
                IN p_type_voertuig_id INT,
                IN p_type VARCHAR(20),
                IN p_bouwjaar DATE,
                IN p_brandstof VARCHAR(20),
                IN p_kenteken VARCHAR(8)
            )
            BEGIN
                -- Update vehicle information
                UPDATE Voertuigen voer
                SET
                    voer.type_voertuig_id = p_type_voertuig_id,
                    voer.type = p_type,
                    voer.bouwjaar = p_bouwjaar,
                    voer.brandstof = p_brandstof,
                    voer.kentkenen = p_kenteken
                WHERE
                    voer.id = p_voertuig_id
                    AND voer.is_actief = 1;
                    
                -- Update or insert the instructor association
                IF EXISTS (SELECT 1 FROM VoertuigInstructeurs WHERE voertuig_id = p_voertuig_id AND is_actief = 1) THEN
                    -- Update existing assignment
                    UPDATE VoertuigInstructeurs
                    SET instructeur_id = p_instructeur_id,
                        datum_toekenning = CURRENT_DATE()
                    WHERE voertuig_id = p_voertuig_id
                    AND is_actief = 1;
                ELSE
                    -- Create new assignment
                    INSERT INTO VoertuigInstructeurs
                        (voertuig_id, instructeur_id, datum_toekenning, is_actief)
                    VALUES
                        (p_voertuig_id, p_instructeur_id, CURRENT_DATE(), 1);
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_getAllInstructeurs');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_getVoertuigDetails');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_getAllAvailableVoertuigen');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_updateVoertuig');
    }
};
