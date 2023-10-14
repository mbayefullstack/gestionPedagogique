<?php

use App\Models\AnneeScolaire;
use App\Models\Semestre;
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
        Schema::create('semestre_annee_scolaires', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AnneeScolaire::class)->constrained();
            $table->foreignIdFor(Semestre::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semestre_annee_scolaires');
    }
};
