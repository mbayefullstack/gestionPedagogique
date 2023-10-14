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
        Schema::create('emmergements', function (Blueprint $table) {
            $table->id();
            $table->boolean('isEmmerger');
            $table->boolean('isValider');
            $table->foreignId('session_de_cours_id')->constrained('session_de_cours');
            $table->foreignId('etudiant_id')->constrained('etudiants');
            $table->foreignId('attache_id')->constrained('attaches')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emmergements');
    }
};
