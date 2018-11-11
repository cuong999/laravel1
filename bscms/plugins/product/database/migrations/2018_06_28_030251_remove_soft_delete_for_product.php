<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSoftDeleteForProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('product_product_group')->whereNotNull('deleted_at')->delete();
        Schema::table('product_product_group', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        DB::table('products')->whereNotNull('deleted_at')->delete();
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        DB::table('product_groups')->whereNotNull('deleted_at')->delete();
        Schema::table('product_groups', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_groups', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });


        Schema::table('product_product_group', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
}
