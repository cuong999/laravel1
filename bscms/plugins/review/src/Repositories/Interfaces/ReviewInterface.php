<?php

namespace Bytesoft\Review\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface ReviewInterface extends RepositoryInterface
{
    /**
     * Get review
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function getReview();

    public  function getFeaturedReview();
}
