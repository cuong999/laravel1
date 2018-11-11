<?php

namespace Bytesoft\Review\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Review\Repositories\Interfaces\ReviewInterface;
use phpDocumentor\Reflection\Types\Null_;

class ReviewRepository extends RepositoriesAbstract implements ReviewInterface
{
    /**
     * @var string
     */
    protected $screen = REVIEW_MODULE_SCREEN_NAME;

    /**
     * @return mixed|void
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    function getReview()
    {
        $data = $this->model
            ->where([
                'reviews.status' => 1
            ])
            ->orderBy('reviews.created_at', 'desc');


        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    function getFeaturedReview($limit = 1)
    {
        $data = $this->model
            ->where([
                'reviews.status' => 1,
                'reviews.featured' => 1,
            ])
            ->limit($limit)
            ->orderBy('reviews.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }
}
