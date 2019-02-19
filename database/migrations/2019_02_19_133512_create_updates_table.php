<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('issueID');
            $table->unsignedInteger('updateID');
            $table->unsignedInteger('callerID');
            $table->string('notes');
            $table->enum('callReason', ['Open Ticket', 'Information Update',
            'Feedback Request', 'Close Ticket', 'Other']);
            $table->dateTime('openTimestamp');
            $table->foreign('issueID')->references('issueID')
            ->on('tickets')->onDelete('cascade');
            $table->foreign('callerID')->references('id')
            ->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updates');
    }
}
