<?php

namespace Bytesoft\Blog\Services;

use Bytesoft\Blog\Models\Post;
use Bytesoft\Blog\Services\Abstracts\StoreGroupsServiceAbstract;
use Illuminate\Http\Request;

class StoreGroupsService extends StoreGroupsServiceAbstract
{

    /**
     * @param Request $request
     * @param Post $post
     * @author Bytesoft
     * @return mixed|void
     */
    public function execute(Request $request, Post $post)
    {
        $categories = $request->input('categories');
        if (!empty($categories)) {
            $post->categories()->detach();
            foreach ($categories as $category) {
                $post->categories()->attach($category);
            }
        }
    }
}
