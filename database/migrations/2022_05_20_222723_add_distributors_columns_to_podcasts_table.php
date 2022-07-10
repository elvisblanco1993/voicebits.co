<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('podcasts', function (blueprint $table) {
            $table->string('apple')->nullable();
            $table->string('spotify')->nullable();
            $table->string('google')->nullable();
            $table->string('stitcher')->nullable();
            $table->string('pocketcasts')->nullable();
            $table->string('amazon')->nullable();
            $table->string('pandora')->nullable();
            $table->string('iheartradio')->nullable();
            $table->string('castbox')->nullable();
            $table->string('castro')->nullable();
            $table->string('deezer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('podcasts', function (blueprint $table) {
            $table->dropColumn([
                'apple',
                'spotify',
                'google',
                'stitcher',
                'pocketcasts',
            ]);
        });
    }
};
