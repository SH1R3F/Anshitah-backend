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
            $table->boolean('q1');
            $table->boolean('q2');
            $table->boolean('q3');
            $table->boolean('q4');
            $table->boolean('q5');
            $table->boolean('q6');
            $table->boolean('q7');
            $table->boolean('q8');
            $table->boolean('q9');
            $table->boolean('q10');
            $table->boolean('q11');
            $table->boolean('q12');
            $table->boolean('q13');
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
