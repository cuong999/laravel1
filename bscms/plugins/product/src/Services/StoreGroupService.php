<?php

namespace Bytesoft\z\Services;

use Bytesoft\Product\Models\Product;
use Bytesoft\Product\Services\Abstracts\StoreGroupsServiceAbstract;
use Illuminate\Http\Request;

class StoreGroupService extends StoreGroupsServiceAbstract
{

    /**
     * @param Request $request
     * @param Post $post
     * @author Bytesoft
     * @return mixed|void
     */
    public function execute(Request $request, Product $product)
    {
        $groups = $request->input('product_groups');
        if (!empty($groups)) {
            $product->$groups()->detach();
            foreach ($groups as $group) {
                $product->categories()->attach($group);
            }
        }
    }
}
