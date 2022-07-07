<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('bg_color');
            $table->string('description', 300)->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('category')) {
            Schema::create('news_category', function (Blueprint $table) {
                $table->id();
                $table->foreignId('news_id')->constrained('news', 'id');
                $table->foreignId('category_id')->constrained('category', 'id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_news');
    }
}
