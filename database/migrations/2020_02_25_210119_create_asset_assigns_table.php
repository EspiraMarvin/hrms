<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_assigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('region_id');
            $table->integer('county_id');
            $table->integer('asset_id');
            $table->integer('employee_id');
            $table->string('authority')->nullable();
            $table->date('assigned_date');
            $table->date('released_date');
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
        Schema::dropIfExists('asset_assigns');
    }
}
