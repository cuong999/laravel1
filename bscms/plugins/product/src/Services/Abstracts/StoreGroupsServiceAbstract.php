<?php

namespace Bytesoft\Product\Services\Abstracts;

use Bytesoft\Product\Models\Product;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
use Illuminate\Http\Request;

abstract class StoreGroupsServiceAbstract
{
    /**
     * @var CategoryInterface
     */
    protected $groupRepository;

    /**
     * StoreCategoryServiceAbstract constructor.
     * @param CategoryInterface $categoryRepository
     * @author Bytesoft
     */
    public function __construct(ProductGroupInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return $groupRepository
     * @author Bytesoft
     */
    abstract public function execute(Request $request, Product $product);
}
