<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id'); // الزائر
            $table->unsignedBigInteger('teacher_id'); // المعلم
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('visitor'); // الزائر
            $table->string('teacher'); // المعلم
            $table->string('takhasos'); //التخصص
            $table->string('madat_tadriss'); //مادة التدريس
            $table->string('course_title'); //عنوان الدرس
            $table->string('seance_title'); //الحصة
            $table->string('al_saf');//الفصل
            $table->string('al_fasle');//الصف
            $table->date('date');
            $table->boolean('status')->default(false);
            $table->string('q1');
            $table->string('q2');
            $table->string('q3');
            $table->string('q4');
            $table->string('q5');
            $table->string('q6');
            $table->string('q7');
            $table->text('q8');
            $table->text('q9');
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
        Schema::dropIfExists('ratings');
    }
}
