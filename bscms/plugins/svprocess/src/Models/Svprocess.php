<?php

namespace Bytesoft\Svprocess\Models;

use Eloquent;

/**
 * Bytesoft\Svprocess\Models\Svprocess
 *
 * @mixin \Eloquent
 */
class Svprocess extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'svprocesses';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'order',
        'image',
        'featured',
        'content',
        'featured',
        'image_hover',
    ];
}
