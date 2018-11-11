<?php

namespace Bytesoft\ACL\Repositories\Eloquent;

use Bytesoft\ACL\Repositories\Interfaces\RoleInterface;
use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;

class RoleRepository extends RepositoriesAbstract implements RoleInterface
{
    /**
     * @param $name
     * @param $id
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name, $id)
    {
        $slug = str_slug($name);
        $index = 1;
        $baseSlug = $slug;
        while ($this->model->where('slug', '=', $slug)->where('id', '!=', $id)->count() > 0) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        $this->resetModel();

        return $slug;
    }
}
