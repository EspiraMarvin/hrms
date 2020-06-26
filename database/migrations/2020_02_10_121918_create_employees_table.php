<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('department_id')->nullable();
            $table->string('photo');
            $table->string('code');
            $table->string('pf_number');
            $table->string('name');
            $table->string('status');
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('emergency_number')->nullable();
            $table->mediumText('qualification')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('kin_name')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('duty_station')->nullable();
            $table->date('posted_date')->nullable();
            $table->string('employment_type');
            $table->string('salary')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->date('date_of_resignation')->nullable();
            $table->string('notice_period')->nullable();
            $table->date('last_working_day')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
