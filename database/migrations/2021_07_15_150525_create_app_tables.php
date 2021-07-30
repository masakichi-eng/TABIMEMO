<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('sort_no');
            $table->timestamps();
        });

        Schema::create('secondary_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('primary_category_id');
            $table->string('name');
            $table->integer('sort_no');
            $table->timestamps();
            $table->foreign('primary_category_id')->references('id')->on('primary_categories');
        });

        Schema::create('item_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('sort_no');
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('secondary_category_id');
            $table->unsignedBigInteger('item_condition_id');

            $table->string('name');
            $table->string('image_file_name');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->string('state');
            $table->timestamp('bought_at')->nullable();

            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('secondary_category_id')->references('id')->on('secondary_categories');
            $table->foreign('item_condition_id')->references('id')->on('item_conditions');
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
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
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_conditions');
        Schema::dropIfExists('secondary_categories');
        Schema::dropIfExists('primary_categories');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('article_tag');
    }
}
