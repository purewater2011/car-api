<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsCarAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_car_album', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid')->unsigned();
            $table->integer('aid')->unsigned();
//            $table->foreign('cid')->references('id')->on('cms_car');
//            $table->foreign('aid')->references('id')->on('core_album');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_car_album');
    }
}
