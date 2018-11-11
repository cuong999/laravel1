<?php

namespace Bytesoft\Blog\Services;

use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Blog\Models\Post;
use Bytesoft\Blog\Services\Abstracts\StoreTagServiceAbstract;
use Illuminate\Http\Request;
use Auth;

class StoreTagService extends StoreTagServiceAbstract
{

    /**
     * @param Request $request
     * @param Post $post
     * @author Bytesoft
     * @return mixed|void
     */
    public function execute(Request $request, Post $post)
    {
        $tags = $post->tags->pluck('name')->all();
        if (implode(',', $tags) !== $request->input('tag')) {
            $post->tags()->detach();
            $tagInputs = explode(',', $request->input('tag'));
            foreach ($tagInputs as $tagName) {
                if (!trim($tagName)) {
                    continue;
                }
                $tag = $this->tagRepository->getFirstBy(['name' => $tagName]);
                if ($tag === null && !empty($tagName)) {
                    $tag = $this->tagRepository->createOrUpdate([
                        'name' => $tagName,
                        'user_id' => Auth::user()->getKey(),
                    ]);

                    $request->merge(['slug' => $tagName]);

                    event(new CreatedContentEvent(TAG_MODULE_SCREEN_NAME, $request, $tag));
                }
                if (!empty($tag)) {
                    $post->tags()->attach($tag->id);
                }
            }
        }
    }
}
