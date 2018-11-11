<?php

namespace Bytesoft\Widget\Models;

use Eloquent;

/**
 * Bytesoft\Widget\Models\WidgetArea
 *
 * @mixin \Eloquent
 */
class WidgetArea extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'widget_areas';

    protected $fillable = ['belong_to', 'type', 'data'];

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
