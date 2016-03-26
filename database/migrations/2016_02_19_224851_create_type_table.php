<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_cartype', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid')->unsigned();
            $table->string('name', 50);
            $table->string('description', 100)->nullable();
//            $table->foreign('bid')->references('id')->on('core_carbrand');
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
        Schema::table('core_type', function(Blueprint $table){
            $table->dropForeign('bid');
        });
        Schema::drop('core_type');
    }
}
