<?php

namespace Bytesoft\Menu\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface MenuInterface extends RepositoryInterface
{

    /**
     * @param $slug
     * @param $active
     * @param $selects
     * @return mixed
     * @author Bytesoft
     */
    public function findBySlug($slug, $active, $selects = []);

    /**
     * @param $name
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name);
}
