<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('slug', 255);
            $table->string('description', 255);
            $table->longText('content');
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->tinyInteger('featured')->unsigned()->default(0);
            $table->integer('order');
            $table->string('image', 255)->nullable();
            $table->integer('user_id')->unsigned()->nullable()->references('id')->on('users')->onDelete('set null');
            $table->integer('views')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
