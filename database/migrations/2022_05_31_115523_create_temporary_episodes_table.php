<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('temporary_episodes', function (Blueprint $table) {
            $table->id();
            $table->string('guid');
            $table->integer('temp_podcast_id');
            $table->integer('podcast_id');
            $table->string('title');
            $table->longText('description');
            $table->dateTime('published_at')->nullable();
            $table->integer('season')->nullable();
            $table->integer('number')->nullable();
            $table->string('type');
            $table->boolean('explicit')->default(0);
            $table->string('cover')->nullable();
            $table->longText('track_url');
            $table->string('track_size');
            $table->string('track_length');
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
        Schema::dropIfExists('temporary_episodes');
    }
};
