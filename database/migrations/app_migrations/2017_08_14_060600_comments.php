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
            $table->string('user_id');
            $table->foreign('user_id')->references('email_id')->on('user_details')->onDelete('cascade');
            $table->string('ticket_id');
            $table->foreign('ticket_id')->references('ticket_id')->on('tickets')->onDelete('cascade');
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
