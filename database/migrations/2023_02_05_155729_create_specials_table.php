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
        Schema::create('specials', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('chember_id')->unsigned();
            $table->foreign('chember_id')->references('id')->on('chembers')->onDelete('cascade');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('patients_allowed')->nullable();
            $table->string('slotOnOff');
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
        Schema::dropIfExists('specials');
    }
};
