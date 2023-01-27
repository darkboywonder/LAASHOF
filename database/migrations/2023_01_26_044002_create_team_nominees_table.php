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
        Schema::create('team_nominees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nominator_id')->nullable();
            $table->string('name');
            $table->string('sport');
            $table->string('year');
            $table->string('head_coach');
            $table->string('assistant_coach');
            $table->string('manager');
            $table->string('level');
            $table->text('accomplishment_summary');
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
        Schema::dropIfExists('team_nominees');
    }
};
