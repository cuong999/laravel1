<?php

namespace Bytesoft\Product\Models;

use Bytesoft\ACL\Models\User;
use Bytesoft\Slug\Traits\SlugTrait;
use Venturecraft\Revisionable\RevisionableTrait;
use Eloquent;

/**
 * Bytesoft\Product\Models\Product
 *
 * @mixin \Eloquent
 */
class Product extends Eloquent
{

    use RevisionableTrait;
    use SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'image',
        'content',
        'slug',
        'complete_at',
        'featured',
        'user_id',
        'views',
        'docs',
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';


    /**
     * @var string
     */
    protected $screen = PRODUCT_MODULE_SCREEN_NAME;


    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function groups()
    {
        return $this->belongsToMany(ProductGroup::class, 'product_product_group')->withTimestamps();
    }

    /**
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Product $product) {
            $product->categories()->detach();
        });
    }


}
