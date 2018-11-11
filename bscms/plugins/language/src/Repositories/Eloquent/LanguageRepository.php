<?php

namespace Bytesoft\Language\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Language\Repositories\Interfaces\LanguageInterface;

class LanguageRepository extends RepositoriesAbstract implements LanguageInterface
{
    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     * @since 2.1
     */
    public function getActiveLanguage($select = ['*'])
    {
        $data = $this->model->orderBy('lang_order', 'asc')->select($select)->get();
        $this->resetModel();
        return $data;
    }

    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     * @since 2.2
     */
    public function getDefaultLanguage($select = ['*'])
    {
        $data = $this->model->where('lang_is_default', 1)->select($select)->first();
        $this->resetModel();
        return $data;
    }
}
