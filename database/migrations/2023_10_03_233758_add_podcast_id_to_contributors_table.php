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
        Schema::table('contributors', function (Blueprint $table) {
            $table->foreignId('podcast_id');
            $table->boolean('is_default')->default(false);
        });

        // Let's drop the contributor_podcast table as is no needed
        Schema::dropIfExists('contributor_podcast');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contributors', function (Blueprint $table) {
            $table->dropColumn([
                'podcast_id',
                'is_default',
            ]);
        });
    }
};
