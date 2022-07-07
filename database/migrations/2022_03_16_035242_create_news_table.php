<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image', 500);
            $table->string('image_thumb', 500);
            $table->string('image_thumb_square', 500);
            $table->string('description', 150);
            $table->string('slug', 600);
            $table->longText('body');
            $table->timestamp('publised_at')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_published')->default(false);
            $table->bigInteger('views')->default(0);
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
        Schema::dropIfExists('news');
    }
}
