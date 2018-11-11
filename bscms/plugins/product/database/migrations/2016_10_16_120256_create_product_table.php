<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('description', 255);
            $table->string('image', 255);
            $table->longText('content');
            $table->string('slug', 255);
            $table->date('complete_at');
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->tinyInteger('featured')->unsigned()->default(0);
            $table->integer('user_id')->unsigned()->nullable()->references('id')->on('users')->onDelete('set null');
            $table->integer('views')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('product_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('slug', 120);
            $table->integer('parent_id')->unsigned()->default(0)->index();
            $table->text('description');
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->integer('user_id')->unsigned()->index()->references('id')->on('users');
            $table->string('icon', 60)->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('is_default')->unsigned()->default(0);

            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('product_product_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_group_id')->unsigned()->index()->references('id')->on('product_groups')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->index()->references('id')->on('products')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_groups');
        Schema::dropIfExists('product_product_group');
    }
}
