<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('core_users', function (Blueprint $table) {
            $table->enum('sex', ['1', '2'])->default('1');//1男2女
            $table->integer('qq')->unsigned()->nullable();
            $table->string('telphone', 20)->nullable();
            $table->string('wechat', 20)->nullable();
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
        Schema::table('core_users', function (Blueprint $table) {
            $table->dropColumn(['sex', 'qq', 'telphone', 'wechat', 'deleted_at']);
        });
    }
}
