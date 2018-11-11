<?php

namespace Bytesoft\Blog\Services\Abstracts;

use Bytesoft\Blog\Models\Post;
use Bytesoft\Blog\Repositories\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

abstract class StoreCategoryServiceAbstract
{
    /**
     * @var CategoryInterface
     */
    protected $categoryRepository;

    /**
     * StoreCategoryServiceAbstract constructor.
     * @param CategoryInterface $categoryRepository
     * @author Bytesoft
     */
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return mixed
     * @author Bytesoft
     */
    abstract public function execute(Request $request, Post $post);
}
