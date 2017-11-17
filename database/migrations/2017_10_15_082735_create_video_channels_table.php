<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_channels', function (Blueprint $table) {
            $table->integer('video_id')->unsigned();
			$table->integer('channel_id')->unsigned();
			$table->timestamps();

			$table->foreign('video_id')->references('id')->on('videos');
			$table->foreign('channel_id')->references('id')->on('channels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_channels');
    }
}
