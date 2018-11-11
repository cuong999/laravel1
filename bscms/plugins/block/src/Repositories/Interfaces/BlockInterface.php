<?php

namespace Bytesoft\Block\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface BlockInterface extends RepositoryInterface
{
    /**
     * @param string $name
     * @param int $id
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name, $id);
}
