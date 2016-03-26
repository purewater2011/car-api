<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_car_view', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid')->unsigned();
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
        Schema::drop('crm_car_view');
    }
}
