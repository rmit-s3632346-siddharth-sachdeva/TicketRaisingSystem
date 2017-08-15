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
            $table->string('ticket_id');
            $table->primary('ticket_id');
            $table->string('subject');
            $table->string('priority');
            $table->string('service_area');
            $table->string('preferred_contact');
            $table->string('operating_system');
            $table->string('description');
            $table->string('status');
            $table->timestamps();

            $table->string('user_Id');
            $table->foreign('user_Id')
                ->references('email_id')->on('user_details')
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
