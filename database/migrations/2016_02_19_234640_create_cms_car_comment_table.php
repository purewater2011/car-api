<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsCarCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_car_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->unsigned()->default(0);
            $table->integer('cid')->unsigned();
            $table->integer('uid')->unsigned();
            $table->string('comment', 100);
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
        Schema::drop('cms_car_comment');
    }
}
