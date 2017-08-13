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
            $table->increments('id');
            $table->string('subject');
            $table->string('priority');
            $table->string('service_area');
            $table->string('preferred_contact');
            $table->string('operating_system');
            $table->string('description');
            $table->string('status');
            $table->timestamps();

            $table->integer('user_Id')->unsigned();
            $table->foreign('user_Id')
                ->references('id')->on('user_details')
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
