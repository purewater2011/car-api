<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_carparamter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tid')->unsigned();
            $table->text('info');
//            $table->foreign('tid')->references('id')->on('core_cartype');
            $table->softDeletes();
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
//        Schema::table('core_paramter', function(Blueprint $table){
//            $table->dropForeign('tid');
//        });
        Schema::drop('core_paramter');
    }
}
