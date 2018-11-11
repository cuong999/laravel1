<?php

use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;
use Bytesoft\Slug\Services\SlugService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSlugFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $slugService = new SlugService(app(SlugInterface::class));
        foreach (DB::table('products')->select(['slug', 'id'])->whereNull('deleted_at')->get() as $post) {
            app(SlugInterface::class)->firstOrCreate([
                'key' => $slugService->create($post->slug),
                'reference' => 'product',
                'reference_id' => $post->id,
            ]);
        }

        foreach (DB::table('product_groups')->select(['slug', 'id'])->whereNull('deleted_at')->get() as $category) {
            app(SlugInterface::class)->firstOrCreate([
                'key' => $slugService->create($category->slug),
                'reference' => 'product_group',
                'reference_id' => $category->id,
            ]);
        }


        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('product_groups', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug', 120);
        });

        Schema::table('product_groups', function (Blueprint $table) {
            $table->string('slug', 120);
        });

    }
}
