<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('majal_awl');
            $table->string('hadf_istratiji');
            $table->string('hadf_tachghili');
            $table->string('mohima');
            $table->string('wasf_mohima');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('al_moda');
            $table->text('adaa_idara');
            $table->text('adaa_madariss');
            $table->text('nokat_qiass');
            $table->text('ijraat');
            $table->text('amakin_tanfid');
            $table->text('asalib_tanfid');
            $table->text('aljihat_mosanida');
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
        Schema::dropIfExists('plans');
    }
}
