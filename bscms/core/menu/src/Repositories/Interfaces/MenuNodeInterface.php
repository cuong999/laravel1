<?php

namespace Bytesoft\Menu\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface MenuNodeInterface extends RepositoryInterface
{
    /**
     * @param $parent_id
     * @param null array
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     * @author Bytesoft
     */
    public function getByMenuId($menu_id, $parent_id, $select = ['*']);
}
