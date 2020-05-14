<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeIdToApplyLeaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_leaves', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('employee_name');
//            $table->foreign('employee_name')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apply_leaves', function (Blueprint $table) {
//            $table->dropColumn('employee_id');
//            $table->dropColumn('employee_name');

        });
    }
}
