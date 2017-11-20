<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasBadgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasBadge', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('badge_id');
            $table->integer('level');
            $table->integer('relevant_data');
            $table->string('unlock');
            //level 0 = badge not earned
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
        Schema::dropIfExists('hasBadge');
    }
}
