<?php

namespace Bytesoft\Page\Models;

use Bytesoft\ACL\Models\User;
use Bytesoft\Slug\Traits\SlugTrait;
use Eloquent;
use Venturecraft\Revisionable\RevisionableTrait;

class Page extends Eloquent
{
    use RevisionableTrait;
    use SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * @var mixed
     */
    protected $revisionEnabled = true;

    /**
     * @var mixed
     */
    protected $revisionCleanup = true;

    /**
     * @var int
     */
    protected $historyLimit = 20;

    /**
     * @var array
     */
    protected $dontKeepRevisionOf = ['content'];

    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'image',
        'template',
        'description',
        'featured',
        'status',
        'user_id',
    ];

    /**
     * @var string
     */
    protected $screen = PAGE_MODULE_SCREEN_NAME;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Bytesoft
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
