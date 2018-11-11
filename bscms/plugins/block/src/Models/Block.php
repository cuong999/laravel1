<?php

namespace Bytesoft\Block\Models;

use Eloquent;

/**
 * Bytesoft\Block\Models\Block
 *
 * @mixin \Eloquent
 */
class Block extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blocks';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'status',
    ];
}
