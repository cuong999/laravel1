<?php

namespace Bytesoft\Product\Listeners;

use Bytesoft\Product\Repositories\Interfaces\ProductInterface;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
use JsonFeedManager;

class RenderingJsonFeedListener
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
     * @param ProductGroupInterface $categoryRepository
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
        $products = $this->productRepository->getAllProducts(true);

        foreach ($products as $product) {
            JsonFeedManager::addItem('posts', [
                'id' => $product->id,
                'title' => $product->name,
                'url' => route('public.single', $product->slug),
                'image' => $product->image,
                'content_html' => $product->content,
                'date_published' => $product->created_at->tz('UTC')->toRfc3339String(),
                'date_modified' => $product->updated_at->tz('UTC')->toRfc3339String(),
                'author' => [
                    'name' => $product->author ? $product->author->name : null,
                ],
            ]);
        }

        $groups = $this->$groupRepository->getAllProductGroups(['status' => 1]);

        foreach ($groups as $group) {
            JsonFeedManager::addItem('categories', [
                'id' => $group->id,
                'title' => $group->name,
                'url' => route('public.single', $group->slug),
                'image' => null,
                'content_html' => $group->description,
                'date_published' => $group->created_at->tz('UTC')->toRfc3339String(),
                'date_modified' => $group->updated_at->tz('UTC')->toRfc3339String(),
            ]);
        }
    }
}
