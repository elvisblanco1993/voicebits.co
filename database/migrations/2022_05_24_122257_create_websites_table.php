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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('podcast_id');
            $table->string('template')->default('classic');
            $table->string('language')->default('en');
            $table->string('header_background')->default('#0F172A');
            $table->string('header_text_color')->default('#F8FAFC');
            $table->string('header_link_color')->default('#CBD5E1');
            $table->string('body_background')->default('#E2E8F0');
            $table->string('body_text_color')->default('#0F172A');
            $table->string('body_link_color')->default('#0F172A');
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
        Schema::dropIfExists('websites');
    }
};
