<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoPornstarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_pornstars', function (Blueprint $table) {
			$table->integer('video_id')->unsigned();
			$table->integer('pornstar_id')->unsigned();
			$table->timestamps();

			$table->foreign('video_id')->references('id')->on('videos');
			$table->foreign('pornstar_id')->references('id')->on('pornstars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_pornstars');
    }
}
