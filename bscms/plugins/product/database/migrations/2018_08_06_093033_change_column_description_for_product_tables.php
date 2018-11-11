<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnDescriptionForProductTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_groups', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('description', 400)->nullable()->change();
            $table->text('content')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('description')->change();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('description', 400)->change();
            $table->text('content')->change();
        });
    }
}
