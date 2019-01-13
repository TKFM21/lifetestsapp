<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katabans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kataban')->unique();
            $table->unsignedInteger('test_eq_id')->index();
            $table->unsignedSmallInteger('rated_voltage')->nullable();
            $table->unsignedInteger('expect_life_time');
            $table->unsignedInteger('now_life_time');
            $table->unsignedInteger('fan_kbn1_id')->index();
            $table->unsignedInteger('status_id')->index();
            $table->unsignedInteger('bb_id')->index();
            $table->unsignedInteger('edit_user_id')->index();
            $table->unsignedInteger('cd_user_id')->index();
            $table->timestamp('next_meas_at');
            $table->timestamps();
            
            $table->foreign('test_eq_id')->references('id')->on('test_eqs')->onDelete('restrict');
            $table->foreign('fan_kbn1_id')->references('id')->on('fan_kbn1s')->onDelete('restrict');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
            $table->foreign('bb_id')->references('id')->on('bbs')->onDelete('restrict');
            $table->foreign('edit_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('cd_user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katabans');
    }
}
