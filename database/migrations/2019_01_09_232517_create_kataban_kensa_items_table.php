<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatabanKensaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kataban_kensa_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kataban_id')->index();
            $table->unsignedInteger('kensa_c1_id')->index();
            $table->double('nominal_value', 8, 3);
            $table->double('upper_value', 8, 3);
            $table->double('lower_value', 8, 3);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['kataban_id', 'kensa_c1_id']);
            $table->foreign('kataban_id')->references('id')->on('katabans')->onDelete('cascade');
            $table->foreign('kensa_c1_id')->references('id')->on('kensa_c1s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kataban_kensa_items');
    }
}
