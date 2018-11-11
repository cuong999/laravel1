<?php

namespace Bytesoft\Block\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Block\Repositories\Interfaces\BlockInterface;

class BlockRepository extends RepositoriesAbstract implements BlockInterface
{
    /**
     * @var string
     */
    protected $screen = BLOCK_MODULE_SCREEN_NAME;

    /**
     * @param string $name
     * @param int $id
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name, $id)
    {
        $slug = str_slug($name);
        $index = 1;
        $baseSlug = $slug;
        while ($this->model->where('alias', $slug)->where('id', '!=', $id)->count() > 0) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        $this->resetModel();

        return $slug;
    }
}
