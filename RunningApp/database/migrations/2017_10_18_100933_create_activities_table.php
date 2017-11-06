<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('athlete_id');
            $table->string('name');
            $table->integer('distance');
            $table->integer('moving_time');
            $table->integer('elapsed_time');
            $table->integer('kudos_count');
            $table->integer('max_speed');
            $table->integer('average_speed');
            $table->string('type');

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
        Schema::dropIfExists('activities');
    }
}
