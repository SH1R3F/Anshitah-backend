<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable(true); //الصورة الشخصية
            $table->string('milaf_howiya')->nullable(true);//ملف الهوية
            $table->string('milaf_wadifi')->nullable(true);//ملف الوظيفي
            $table->string('city')->nullable(true);//المدينة
            $table->string('address')->nullable(true);//العنوان
            $table->string('rakm_howiya')->unique()->nullable(true);//رقم الهوية
            $table->string('mobile')->nullable(true);//رقم الجوال
            $table->string('university')->nullable(true);//الجامعة
            $table->string('takhasos')->nullable(true);//التخصص
            $table->date('date_birth')->nullable(true);//تاريخ الميلاد
            $table->date('date_graduation')->nullable(true);//تاريخ التخرج
            $table->date('date_job')->nullable(true);//تاريخ بدأ العمل
            $table->string('rakm_wadifi')->nullable(true);//الرقم الوظيفي
            $table->string('current_job')->nullable(true);//الوظيفة الحالية
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
