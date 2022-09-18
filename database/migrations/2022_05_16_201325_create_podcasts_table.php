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
        Schema::create('podcasts', function (blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('url')->nullable();
            $table->string('author');
            $table->string('category');
            $table->string('language')->default('en');
            $table->string('type')->default('episodic');
            $table->string('cover')->nullable();
            $table->boolean('explicit')->default(0);
            $table->string('timezone');
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
        Schema::dropIfExists('podcasts');
    }
};
