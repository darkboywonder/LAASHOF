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
        Schema::create('nominees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nominator_id')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('profile');
            $table->string('birthday');
            $table->string('gender');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('category');
            $table->json('achievements')->nullable();
            $table->string('attending');
            $table->string('representative_attending')->nullable()->default('no');
            $table->string('deceased')->nullable()->default('no');
            $table->text('absence_reason')->nullable();
            $table->text('accomplishment_summary')->nullable();
            $table->text('additional_factors')->nullable();
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
        Schema::dropIfExists('nominees');
    }
};
