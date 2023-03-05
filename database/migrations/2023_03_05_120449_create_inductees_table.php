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
        Schema::create('inductees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nominator_id')->nullable();
            $table->string('class');
            $table->string('photo')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sport')->nullable();
            $table->string('nickname')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('category');
            $table->boolean('deceased');
            $table->text('accomplishment_summary')->nullable();
            $table->integer('blazer_size')->nullable();
            $table->string('t_shirt_size')->nullable();
            $table->text('bio')->nullable();
            $table->json('league_type')->nullable();
            $table->string('school_name')->nullable();
            $table->json('organization_name')->nullable();
            $table->string('status')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('inductees');
    }
};
