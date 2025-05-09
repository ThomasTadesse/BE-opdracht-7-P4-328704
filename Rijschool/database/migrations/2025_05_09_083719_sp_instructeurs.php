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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_getAllInstructeurs');
    }
};
