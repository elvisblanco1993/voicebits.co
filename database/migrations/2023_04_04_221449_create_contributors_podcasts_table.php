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
        Schema::create('contributor_podcast', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contributor_id')->constrained();
            $table->foreignId('podcast_id')->constrained();
            $table->boolean('is_default')->default(false);
            $table->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributors_podcasts');
    }
};
