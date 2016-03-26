<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_shop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qid')->unsigned()->nullable();
            $table->string('name', 20);
            $table->string('country', 10)->default('中国');
            $table->string('province', 10)->default('上海市');
            $table->string('city', 10)->default('上海市');
            $table->string('street', 10)->default('迪斯尼地铁站');
            $table->float('latitude', 8, 4);
            $table->float('longitude', 8, 4);
            $table->timestamp('open_at');
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
        Schema::drop('cms_shop');
    }
}
