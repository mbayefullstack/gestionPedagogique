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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->integer("nb_heure_global")->min(0);
            $table->integer("nb_heure_deroule")->min(0)->default(0);
            $table->foreignId('prof_module_id')->constrained('prof_modules');
            $table->foreignId('annee_scolaire_semestre_id')->constrained('annee_scolaire_semestres');
            $table->foreignId('classe_ouvert_id')->constrained('classe_ouverts');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
