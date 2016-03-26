<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_picture', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aid')->unsigned();
            $table->string('name', 50);
            $table->string('description', 50)->nullable();
            $table->string('url', 100);
            $table->softDeletes();
            $table->timestamps();
//            $table->foreign('aid')->references('id')->on('core_album');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('core_picture', function(Blueprint $table){
            $table->dropForeign('aid');
        });
        Schema::drop('core_picture');
    }
}
