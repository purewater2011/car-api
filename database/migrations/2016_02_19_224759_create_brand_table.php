<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_carbrand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->enum('category', ['微型车', '小型车', '紧凑型车', '中型车', '中大型车', '小型SUV', '紧凑型SUV', '中型SUV', '中大型SUV', '大型SUV', 'MPV', '跑车', '皮卡', '微面', '电动车'])->default('紧凑型车');
            $table->string('cartype', 50);
            $table->string('description', 100)->nullable();
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
        Schema::drop('core_brand');
    }
}
