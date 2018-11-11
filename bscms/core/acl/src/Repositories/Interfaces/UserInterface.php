<?php

namespace Bytesoft\ACL\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface UserInterface extends RepositoryInterface
{

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap();

    /**
     * Get unique username from email
     *
     * @param $email
     * @return string
     * @author Bytesoft
     */
    public function getUniqueUsernameFromEmail($email);
}
