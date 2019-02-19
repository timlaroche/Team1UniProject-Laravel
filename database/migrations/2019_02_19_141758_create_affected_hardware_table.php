<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffectedHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affected_hardware', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('issueID');
            $table->unsignedInteger('equipmentSerialNumber');
            $table->foreign('issueID')->references('issueID')
            ->on('tickets')->onDelete('cascade');
            $table->foreign('equipmentSerialNumber')->references('serialNumber')
            ->on('registered_hardware')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affected_hardware');
    }
}
