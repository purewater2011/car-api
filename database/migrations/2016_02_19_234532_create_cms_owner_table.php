<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_owner', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qid')->unsigned()->nullable();
            $table->string('name', 20);
            $table->string('telphone', 20);
            $table->string('wechat', 20)->nullable();
            $table->integer('qq')->unsigned()->nullable();
            $table->string('email', 50)->nullable();
            $table->string('description')->nullable();
            $table->string('remark')->nullable();
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
        Schema::drop('cms_owner');
    }
}
