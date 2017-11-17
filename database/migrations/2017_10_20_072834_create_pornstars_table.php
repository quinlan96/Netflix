<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePornstarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pornstars', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->enum('gender', ['M', 'F']);
			$table->date('dob')->nullable();
			$table->string('birthplace')->nullable();
			$table->integer('height')->nullable();
			$table->integer('weight')->nullable();
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
        Schema::dropIfExists('pornstars');
    }
}
