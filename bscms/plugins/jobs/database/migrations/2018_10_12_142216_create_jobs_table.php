<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->longText('description');
            $table->integer('num');
            $table->string('place');
            $table->date('expiration_at');
            $table->longText('content');
            $table->longText('interest');
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->tinyInteger('featured')->unsigned()->default(0);
            $table->string('image', 255)->nullable();
            $table->string('doc_id');
            $table->integer('user_id')->unsigned()->nullable()->references('id')->on('users')->onDelete('set null');
            $table->integer('views')->unsigned()->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
