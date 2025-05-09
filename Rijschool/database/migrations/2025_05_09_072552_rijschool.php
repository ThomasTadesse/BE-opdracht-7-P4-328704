<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // TypeVoertuigen
        Schema::create('type_voertuigen', function (Blueprint $table) {
            $table->id();
            $table->string('type_voertuig', 50);
            $table->string('rijbewijscategorie', 5);
            $table->boolean('is_actief')->default(true);
            $table->string('opmerking', 255)->nullable();
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent()->useCurrentOnUpdate();
        });

        // Instructeurs
        Schema::create('instructeurs', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam', 50);
            $table->string('tussenvoegsel', 20)->nullable();
            $table->string('achternaam', 50);
            $table->string('mobiel', 20);
            $table->date('datum_in_dienst');
            $table->string('aantal_sterren', 5);
            $table->boolean('is_actief')->default(true);
            $table->string('opmerking', 255)->nullable();
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent()->useCurrentOnUpdate();
        });

        // Voertuigen
        Schema::create('voertuigen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_voertuig_id')->constrained('type_voertuigen');
            $table->string('kentkenen', 8);
            $table->string('type', 20);
            $table->date('bouwjaar');
            $table->string('brandstof', 20);
            $table->boolean('is_actief')->default(true);
            $table->string('opmerking', 255)->nullable();
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent()->useCurrentOnUpdate();
        });

        // VoertuigInstructeur
        Schema::create('voertuig_instructeur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voertuig_id')->constrained('voertuigen');
            $table->foreignId('instructeur_id')->constrained('instructeurs');
            $table->date('datum_toekenning');
            $table->boolean('is_actief')->default(true);
            $table->string('opmerking', 255)->nullable();
            $table->timestamp('datum_aangemaakt')->useCurrent();
            $table->timestamp('datum_gewijzigd')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voertuig_instructeur');
        Schema::dropIfExists('voertuigen');
        Schema::dropIfExists('instructeurs');
        Schema::dropIfExists('type_voertuigen');
    }
};
