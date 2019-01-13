<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meas_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sample_id')->index();
            $table->unsignedInteger('kataban_kensa_item_id')->index();
            $table->double('meas_record', 8, 3);
            $table->unsignedInteger('inspector_id')->index();
            $table->unsignedInteger('judge_id')->index();
            $table->timestamps();
            
            $table->foreign('sample_id')->references('id')->on('samples')->onDelete('restrict');
            $table->foreign('kataban_kensa_item_id')->references('id')->on('kataban_kensa_items')->onDelete('restrict');
            $table->foreign('inspector_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('judge_id')->references('id')->on('judges')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meas_records');
    }
}
