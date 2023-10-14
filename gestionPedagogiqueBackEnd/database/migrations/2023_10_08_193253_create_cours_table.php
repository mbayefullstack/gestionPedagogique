<?php

use App\Models\Classe;
use App\Models\ProfModule;
use App\Models\SemestreAnneeScolaire;
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
            $table->foreignIdFor(SemestreAnneeScolaire::class)->constrained();
            $table->foreignIdFor(ProfModule::class)->constrained();
            $table->foreignIdFor(Classe::class)->constrained();
            $table->integer('qtm_horaires');
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
