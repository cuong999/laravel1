<?php

namespace Bytesoft\Slider\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Bytesoft\Slider\Models\Slider
 *
 * @mixin \Eloquent
 */
class Slider extends Eloquent
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'background',
        'title',
        'description',
        'status',
    ];
}
