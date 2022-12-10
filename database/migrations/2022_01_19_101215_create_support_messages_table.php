<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_messages', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->unsignedBigInteger('ticket_id')->index('fk_ticket_id');
            $table->text('body');
            $table->string('attachment', 255)->nullable();
            $table->unsignedBigInteger('user_id')->index('fk_users_id');
            $table->unsignedBigInteger('support_id')->nullable()->index('fk_support_id');
            $table->boolean('sender')->default(1);
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
        Schema::dropIfExists('support_messages');
    }
}
