<?php

use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
use Bytesoft\Base\Supports\SortItemsWithChildrenHelper;
use Bytesoft\Product\Repositories\Interfaces\ProductInterface;

if (!function_exists('get_product_group')) {

    /**
     * Get product group with limit
     *
     * @param int $limit
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn      *
     */

    function get_product_group(array $args = [])
    {
        $indent = array_get($args, 'indent', '——');

        $repo = app(ProductGroupInterface::class);
        $groups = $repo->getProductGroups(array_get($args, 'select', ['*']), [
            'product_groups.is_default' => 'DESC',
            'product_groups.order' => 'ASC',
        ]);
        $groups = sort_item_with_children($groups);
        foreach ($groups as $group) {
            $indentText = '';
            $depth = (int)$group->depth;
            for ($i = 0; $i < $depth; $i++) {
                $indentText .= $indent;
            }
            $group->indent_text = $indentText;
        }
        return $groups;
    }
}

if (!function_exists('get_product_groups_with_children')) {
    /**
     * @return array
     * @throws Exception
     */
    function get_product_groups_with_children()
    {
        $groups = app(ProductGroupInterface::class)->getAllProductGroups(['status' => 1], [], ['id', 'name', 'parent_id']);
        $sortHelper = app(SortItemsWithChildrenHelper::class);
        $sortHelper
            ->setChildrenProperty('product_groups')
            ->setItems($groups);
        return $sortHelper->sort();
    }
}


if (!function_exists('get_related_product')) {
    /**
     * @param $id
     * @param int $limit
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    function get_related_product($id, $limit = 3)
    {
        return app(ProductInterface::class)->getRelated($id, $limit);
    }
}

if (!function_exists('get_all_product_group')) {
    function get_all_product_group()
    {
        return app(ProductGroupInterface::class)->getAllProductGroups();
    }
}
