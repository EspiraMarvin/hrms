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

//            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('photo');
            $table->string('code');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('status');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->string('phone_number');
            $table->string('emergency_number');
            $table->string('qualification');
            $table->string('kra_pin');
            $table->string('father_name');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->string('role');
            $table->string('department');
            $table->string('supervisor');
            $table->string('duty_station');
            $table->date('posted_date');
            $table->string('employment_type');
            $table->string('salary');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('pf_account_number');
            $table->string('pf_status');
            $table->date('date_of_resignation');
//            $table->date('date_of_resignation')->nullable();
            $table->string('notice_period');
            $table->date('last_working_day');
            $table->string('full_final');
//            $table->bigInteger('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
