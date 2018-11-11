<?php

namespace Bytesoft\Review\Models;

use Eloquent;

/**
 * Bytesoft\Review\Models\Review
 *
 * @mixin \Eloquent
 */
class Review extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];
}
