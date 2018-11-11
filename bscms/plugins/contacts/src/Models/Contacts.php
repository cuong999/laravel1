<?php

namespace Bytesoft\Contacts\Models;

use Eloquent;

/**
 * Bytesoft\Contacts\Models\Contacts
 *
 * @mixin \Eloquent
 */
class Contacts extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];
}
