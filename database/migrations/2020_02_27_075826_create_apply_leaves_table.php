<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('leave_type_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('time_from');
            $table->string('time_to');
            $table->integer('number_of_days');
            $table->mediumText('reason');
            $table->tinyInteger('status')->default(0)->comment('0 = Pending, 1 = Approved, 2 = Disapproved');
            $table->string('remarks')->default('No Remarks');
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
        Schema::dropIfExists('apply_leaves');
    }
}
