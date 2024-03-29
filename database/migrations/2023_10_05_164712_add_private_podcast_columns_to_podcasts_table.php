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
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('allowed_domains')->nullable();
            $table->string('copyright')->nullable();
            $table->text('welcome_email')->nullable();
            $table->string('reply_to')->nullable();
            $table->string('passkey')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn([
                'allowed_domains',
                'copyright',
                'welcome_email',
                'reply_to',
                'password',
            ]);
        });
    }
};
