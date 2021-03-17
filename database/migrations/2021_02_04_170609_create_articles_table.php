<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('articles', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->unsignedInteger('owner_id');
                $table->string('slug')->unique();
                $table->string('title');
                $table->text('body');
                $table->boolean('completed')->default(false);
                $table->timestamps();
                $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
