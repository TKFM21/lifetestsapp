<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKensaC1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kensa_c1s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kensa_c1')->unique();
            $table->string('unit')->nullable();
            $table->unsignedSmallInteger('display_no');
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
        Schema::dropIfExists('kensa_c1s');
    }
}
