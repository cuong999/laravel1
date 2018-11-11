<?php

namespace Bytesoft\Contact\Repositories\Eloquent;

use Bytesoft\Contact\Repositories\Interfaces\ContactInterface;
use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;

class ContactRepository extends RepositoriesAbstract implements ContactInterface
{
    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     */
    public function getUnread($select = ['*'])
    {
        $data = $this->model->where('is_read', 0)->select($select)->get();
        $this->resetModel();
        return $data;
    }

    /**
     * @return int
     * @author Bytesoft
     */
    public function countUnread()
    {
        $data = $this->model->where('is_read', 0)->count();
        $this->resetModel();
        return $data;
    }
}
