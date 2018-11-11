<?php

namespace Bytesoft\ACL\Repositories\Eloquent;

use Bytesoft\ACL\Repositories\Interfaces\UserInterface;
use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;

class UserRepository extends RepositoriesAbstract implements UserInterface
{

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap()
    {
        $data = $this->model->where('username', '!=', null)
            ->select('username', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
        $this->resetModel();
        return $data;
    }

    /**
     * Get unique username from email
     *
     * @param $email
     * @return string
     * @author Bytesoft
     */
    public function getUniqueUsernameFromEmail($email)
    {
        $emailPrefix = substr($email, 0, strpos($email, '@'));
        $username = $emailPrefix;
        $offset = 1;
        while ($this->getFirstBy(['username' => $username])) {
            $username = $emailPrefix . $offset;
            $offset++;
        }
        $this->resetModel();
        return $username;
    }
}
