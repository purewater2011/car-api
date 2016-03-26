<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cms_shop_album');
        Schema::create('cms_shop_album', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sid')->unsigned();
            $table->integer('aid')->unsigned();
            $table->foreign('sid')->references('id')->on('cms_shop')->onDelete('cascade');
            $table->foreign('aid')->references('id')->on('core_album')->onDelete('cascade');
            $table->timestamps();
        });

        /*Schema::table('cms_car_album', function(Blueprint $table) {
            $table->dropForeign('cms_car_album_aid_foreign');
            $table->dropForeign('cms_car_album_aid_foreign');

//            $table->foreign('cid')->references('id')->on('cms_car')->onDelete('cascade');
//            $table->foreign('aid')->references('id')->on('core_album')->onDelete('cascade');
        });

        Schema::table('core_picture', function (Blueprint $table) {
            $table->dropForeign('aid');
        });

        Schema::table('core_cartype', function (Blueprint $table) {
            $table->dropForeign('bid');
        });

        Schema::table('core_carparamter', function (Blueprint $table) {
            $table->dropForeign('tid');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_shop_album');
    }
}
