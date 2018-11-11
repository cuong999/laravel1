<?php

namespace Bytesoft\ACL\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface RoleInterface extends RepositoryInterface
{
    /**
     * @param $name
     * @param $id
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name, $id);
}
