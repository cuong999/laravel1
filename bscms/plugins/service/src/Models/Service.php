<?php

namespace Bytesoft\Service\Models;

use Eloquent;

/**
 * Bytesoft\Service\Models\Service
 *
 * @mixin \Eloquent
 */
class Service extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'image',
        'image_hover',
        'featured',
        'order',
        'status',
    ];
}
