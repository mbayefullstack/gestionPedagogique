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
        Schema::create('prof_modules', function (Blueprint $table) {
            $table->id();
            $table->string("specialite", 30);
            $table->foreignId('professeur_id')->constrained('professeurs');
            $table->foreignId('module_id')->constrained('modules');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_modules');
    }
};
