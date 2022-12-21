<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZiyaratMochrifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ziyarat_mochrifs', function (Blueprint $table) {
            $table->id();
            $table->string('school');
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('q1')->default(false);
            $table->boolean('q2')->default(false);
            $table->boolean('q3')->default(false);
            $table->boolean('q4')->default(false);
            $table->boolean('q5')->default(false);
            $table->boolean('q6')->default(false);
            $table->boolean('q7')->default(false);
            $table->boolean('q8')->default(false);
            $table->boolean('q9')->default(false);
            $table->boolean('q10')->default(false);
            $table->boolean('q11')->default(false);
            $table->boolean('q12')->default(false);
            $table->boolean('q13')->default(false);
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
        Schema::dropIfExists('ziyarat_mochrifs');
    }
}
