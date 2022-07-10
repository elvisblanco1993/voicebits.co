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
        Schema::create('plays_counters', function (blueprint $table) {
            $table->id();
            $table->foreignId('podcast_id');
            $table->foreignId('episode_id');
            $table->string('token');
            $table->string('region');
            $table->string('country');
            $table->integer('plays')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plays_counters');
    }
};
