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
        foreach (DB::table('services')->select(['slug', 'id'])->whereNull('deleted_at')->get() as $post) {
            app(SlugInterface::class)->firstOrCreate([
                'key' => $slugService->create($post->slug),
                'reference' => 'service',
                'reference_id' => $post->id,
            ]);
        }

        Schema::table('services', function (Blueprint $table) {
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
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug', 120);
        });
    }
}
