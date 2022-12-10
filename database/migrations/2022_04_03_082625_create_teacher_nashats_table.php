<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherNashatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // توزيع المعلمين على النشاط
        Schema::create('teacher_nashats', function (Blueprint $table) {
            $table->id();
            $table->string('raid');
            $table->string('modir');
            $table->json('nadi_3ilmi');
            $table->json('nadi_taqafi');
            $table->json('nadi_tafkir');
            $table->json('nadi_tatawo3');
            $table->json('nadi_mihani');
            $table->json('nadi_sport');
            $table->json('nadi_kachfi');
            $table->json('nadi_ijtima3i');
            $table->json('nadi_tadrib');
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
        Schema::dropIfExists('teacher_nashats');
    }
}
