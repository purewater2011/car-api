<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_car', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tid')->unsigned();
            $table->integer('oid')->unsigned();
            $table->integer('sid')->unsigned();
            $table->integer('qid')->unsigned()->nullable();
            $table->integer('price')->unsigned();
            $table->float('mileage', 8, 2);
            $table->string('description');
            $table->tinyInteger('transfer_num')->default(0);
            $table->timestamp('check_endat');
            $table->timestamp('licence_at');
            $table->timestamp('buy_at');
            $table->timestamp('base_insurance_endat');
            $table->timestamp('commerial_insurance_endat');
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
        Schema::drop('cms_car');
    }
}
