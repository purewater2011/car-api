<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_shop_view', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sid')->unsigned();
            $table->smallInteger('pv')->unsigned();
            $table->smallInteger('uv')->unsigned();
            $table->timestamp('startat');
            $table->timestamp('endat');
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
        Schema::drop('crm_shop_view');
    }
}
