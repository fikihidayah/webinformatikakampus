<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 255);
            $table->string('favicon', 255);
            $table->string('nama_web', 100);
            $table->string('latitude');
            $table->string('longitude');
            $table->string('alamat');
            $table->char('telpon', 20);
            $table->string('email', 100);
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('yt')->nullable();
            $table->string('link_fb')->nullable();
            $table->string('link_ig')->nullable();
            $table->string('link_yt')->nullable();
            $table->string('bg_login', 50);
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
        Schema::dropIfExists('settings');
    }
}
