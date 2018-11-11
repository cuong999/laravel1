<?php

use Bytesoft\Review\Repositories\Interfaces\ReviewInterface;

function get_all_review()
{
    return app(ReviewInterface::class)->getReview();
}

function get_featured_review()
{
    return app(ReviewInterface::class)->getFeaturedReview();
}