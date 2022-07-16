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
        Schema::table('podcasts', function (Blueprint $table) {
            $table->boolean('funding')->default(0)->after('is_locked');
            $table->string('funding_text')->nullable()->after('funding');
            $table->string('funding_url')->nullable()->after('funding_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn([
                'funding',
                'funding_text',
                'funding_url',
            ]);
        });
    }
};
