<?php

namespace Bytesoft\Contact\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface ContactInterface extends RepositoryInterface
{
    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     */
    public function getUnread($select = ['*']);

    /**
     * @return int
     * @author Bytesoft
     */
    public function countUnread();
}
