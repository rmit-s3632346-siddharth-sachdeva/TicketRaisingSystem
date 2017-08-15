<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('ticketId');
            $table->primary('ticketId');
            $table->string('subject');
            $table->string('priority');
            $table->string('serviceArea');
            $table->string('preferredContact');
            $table->string('operatingSystem');
            $table->string('description');
            $table->string('status');
            $table->timestamps();

            $table->string('emailId');
            $table->foreign('emailId')
                ->references('emailId')->on('user_details')
                ->onDelete('cascade');


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
