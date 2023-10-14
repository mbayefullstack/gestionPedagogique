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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string("libelle", 50)->unique();
            $table->enum("niveau", ["Licence 1", "Licence 2", "Licence 3", "Master 1", "Master 2"]);
            $table->integer("effective");
            $table->foreignId('filliere_id')->constrained('fillieres');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
