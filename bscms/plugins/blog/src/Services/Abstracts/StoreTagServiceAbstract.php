<?php

namespace Bytesoft\Blog\Services\Abstracts;

use Bytesoft\Blog\Models\Post;
use Bytesoft\Blog\Repositories\Interfaces\TagInterface;
use Illuminate\Http\Request;

abstract class StoreTagServiceAbstract
{
    /**
     * @var TagInterface
     */
    protected $tagRepository;

    /**
     * StoreTagService constructor.
     * @param TagInterface $tagRepository
     * @author Bytesoft
     */
    public function __construct(TagInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return mixed
     * @author Bytesoft
     */
    abstract public function execute(Request $request, Post $post);
}
