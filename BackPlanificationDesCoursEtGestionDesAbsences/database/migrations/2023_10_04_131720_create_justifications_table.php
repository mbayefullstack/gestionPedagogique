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
        Schema::create('justifications', function (Blueprint $table) {
            $table->id();
            $table->date("date_created")->default(now());
            $table->text("motif");
            $table->text("piece1")->nullable();
            $table->text("piece2")->nullable();
            $table->text("piece3")->nullable();
            $table->boolean("isAccepted");
            $table->foreignId('emmergement_id')->constrained('emmergements')->unique();
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
        Schema::dropIfExists('justifications');
    }
};
