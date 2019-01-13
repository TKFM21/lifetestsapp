<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('gender_id')->unsigned()->after('name')->index();
            $table->integer('role_id')->unsigned()->after('password')->index();
            $table->integer('department_id')->unsigned()->after('password')->index();
            $table->timestamp('last_login_at')->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender_id');
            $table->dropColumn('role_id');
            $table->dropColumn('department_id');
            $table->dropColumn('last_login_at');
        });
    }
}
