<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 日志表
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username'); // 用户名
            $table->string('ip'); // IP
            $table->text('log_msg'); // 日志信息
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
        Schema::dropIfExists('logs');
    }
};
