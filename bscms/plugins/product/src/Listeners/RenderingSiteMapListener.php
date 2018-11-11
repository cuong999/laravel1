<?php

namespace Bytesoft\Product\Listeners;

use Bytesoft\Product\Repositories\Interfaces\ProductInterface;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
use SiteMapManager;

class RenderingSiteMapListener
{
    /**
     * @var ProductInterface
     */
    protected $productRepository;

    /**
     * @var ProductGroupInterface
     */
    protected $groupRepository;


    /**
     * RenderingSiteMapListener constructor.
     * @param ProductInterface $postRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
     */
    public function __construct(
        ProductInterface $productRepository,
        ProductGroupInterface $groupRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->groupRepository = $groupRepository;
    }

    /**
     * Handle the event.
     *
     * @return void
     * @author Bytesoft
     */
    public function handle()
    {
        $products = $this->productRepository->getDataSiteMap();

        foreach ($products as $product) {
            SiteMapManager::add(route('public.single', $product->slug), $product->updated_at, '0.8', 'daily');
        }

        // get all categories from db
        $groups = $this->groupRepository->getDataSiteMap();

        // add every category to the site map
        foreach ($groups as $group) {
            SiteMapManager::add(route('public.single', $group->slug), $group->updated_at, '0.8', 'daily');
        }
    }
}
