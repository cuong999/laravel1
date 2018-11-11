<?php

namespace Bytesoft\Jobs\Models;

use Bytesoft\ACL\Models\User;
use Bytesoft\Slug\Traits\SlugTrait;
use Eloquent;
use Venturecraft\Revisionable\RevisionableTrait;

/**
 * Bytesoft\Jobs\Models\Jobs
 *
 * @mixin \Eloquent
 */
class Jobs extends Eloquent
{
    use RevisionableTrait;
    use SlugTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'slug',
        'num',
        'place',
        'expiration_at',
        'content',
        'interest',
        'featured',
        'image',
        'user_id',
        'views'
    ];

    protected $screen = JOBS_MODULE_SCREEN_NAME;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

}
