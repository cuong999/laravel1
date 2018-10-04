<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userif', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('gioi tinh');
            $table->string('email');
            $table->string('password');
            // $table->timestamps('created_at');
            // $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userif');
    }
}
