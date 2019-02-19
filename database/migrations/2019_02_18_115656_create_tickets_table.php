<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('issueID');
            $table->unsignedInteger('employeeID');
            $table->unsignedInteger('specialistID');
            $table->string('issueDefinition');
            $table->integer('priority');
            $table->dateTime('openTimestamp');
            $table->dateTime('closeTimestamp');
            $table->foreign('employeeID')
            ->references('id')->on('employees')
            ->onDelete('cascade');
            $table->foreign('specialistID')
            ->references('id')->on('employees')
            ->onDelete('cascade');
        });
        Schema::table('tickets', function($table)
        {
            $table->unsignedInteger('specialistID')->nullable()->change();
            $table->dateTime('closeTimestamp')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
