<?php

namespace Bytesoft\Support\Criteria\Contracts;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface CriteriaContract
{
    /**
     * @param \Eloquent $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository);
}
