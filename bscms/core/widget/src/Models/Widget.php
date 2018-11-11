<?php

namespace Bytesoft\Widget\Models;

use Eloquent;

/**
 * Bytesoft\Widget\Models\WidgetArea
 *
 * @mixin \Eloquent
 */
class Widget extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'widgets';

    protected $fillable = [
        'widget_id',
        'sidebar_id',
        'theme',
        'position',
        'data',
    ];

    /**
     * @param $value
     * @author Bytesoft
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     * @author Bytesoft
     */
    public function getDataAttribute($value)
    {
        return json_decode($value, true);
    }
}
