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
        Schema::table('nominees', function (Blueprint $table) {
            $table->unsignedBigInteger('nominatable_id')->nullable();
            $table->string('nominatable_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nominees', function (Blueprint $table) {
            $table->dropColumn('nominatable_id');
            $table->dropColumn('nominatable_type');
        });
    }
};
