<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('session_de_cours', function (Blueprint $table) {
            $table->id();
            $table->date("date_cours");
            $table->time("heure_debut");
            $table->time("heure_fin");
            $table->boolean('isDemandeAnnuler');
            $table->boolean('isAnnuler');
            $table->boolean('isValider');
            $table->foreignId('cours_id')->constrained('cours');
            $table->foreignId('r_p_id')->constrained('r_p_s');
            $table->foreignId('attache_id')->constrained('attaches')->nullable();
            $table->foreignId('salle_id')->constrained('salles');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_de_cours');
    }
};
