<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTestimoniSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_testimoni_setting', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('isi_testi', 100);
            $table->string('kerja', 100);
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_testimoni_setting');
    }
}
