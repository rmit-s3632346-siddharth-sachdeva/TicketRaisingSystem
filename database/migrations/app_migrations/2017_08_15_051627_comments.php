<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->string('commentId');
            $table->primary('commentId');
            $table->string('description');
            $table->string('emailId');
            $table->foreign('emailId')->references('emailId')->on('user_details')->onDelete('cascade');
            $table->string('ticketId');
            $table->foreign('ticketId')->references('ticketId')->on('tickets')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
