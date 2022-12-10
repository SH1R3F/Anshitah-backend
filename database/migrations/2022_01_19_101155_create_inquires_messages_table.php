<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiresMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquires_messages', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->unsignedBigInteger('ticket_id');
            $table->text('body');
            $table->string('attachment', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('support_id')->nullable();
            $table->boolean('sender')->default(1);
            $table->timestamps();
            
            $table->foreign('support_id', 'fk_support_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ticket_id', 'fk_ticket_id')->references('id')->on('support_tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id', 'fk_users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquires_messages');
    }
}
