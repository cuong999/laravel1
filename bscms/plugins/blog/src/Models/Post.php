<?php

namespace Bytesoft\Blog\Models;

use Bytesoft\ACL\Models\User;
use Bytesoft\Slug\Traits\SlugTrait;
use Eloquent;
use Venturecraft\Revisionable\RevisionableTrait;

class Post extends Eloquent
{
    use RevisionableTrait;
    use SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

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
    protected $dontKeepRevisionOf = [
        'content',
        'views',
    ];

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
        'description',
        'content',
        'image',
        'featured',
        'format_type',
        'status',
        'user_id',
    ];

    /**
     * @var string
     */
    protected $screen = POST_MODULE_SCREEN_NAME;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Bytesoft
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Bytesoft
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Bytesoft
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category')->withTimestamps();
    }

    /**
     * @author Bytesoft
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) {
            $post->categories()->detach();
            $post->tags()->detach();
        });
    }
}
