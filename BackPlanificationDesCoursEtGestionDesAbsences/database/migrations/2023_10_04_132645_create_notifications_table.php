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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->dateTime("date_heure")->default(now());
            $table->enum("type",["AVERTISSEMENT","CONVOCATION"]);
            $table->string("object")->nullable();
            $table->text("contenu");
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
        Schema::dropIfExists('notifications');
    }
};
