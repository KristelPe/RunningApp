<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->string('startPosition');
            $table->string('endPosition');
            $table->integer('startPositionLatitude');
            $table->integer('startPositionLongitude');
            $table->integer('endPositionLatitude');
            $table->integer('endPositionLongitude');
            $table->string('groupName')->nullable();
            $table->date('eventCountdown')->nullable();
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
        Schema::dropIfExists('sessions');
    }
}
