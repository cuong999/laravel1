<?php

use Illuminate\Database\Migrations\Migration;

class UpdateMenuNodesTypeForProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('menu_nodes')->where('type', 'product_group')->update(['type' => 'product_groups']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('menu_nodes')->where('type', 'product_group')->update(['type' => 'product_groups']);
    }
}
