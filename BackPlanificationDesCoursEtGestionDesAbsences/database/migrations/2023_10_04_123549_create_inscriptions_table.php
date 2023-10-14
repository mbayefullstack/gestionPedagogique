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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("montant")->min(0);
            $table->foreignId('annee_scolaire_id')->constrained('annee_scolaires');
            $table->foreignId('classe_ouvert_id')->constrained('classe_ouverts');
            $table->foreignId('etudiant_id')->constrained('etudiants');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
