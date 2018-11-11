<?php

namespace Bytesoft\Product\Models;

use Eloquent;

/**
 * Bytesoft\Product\Models\Product
 *
 * @mixin \Eloquent
 */
class ProductGroup extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_groups';


    /**
     * @var string
     */
    protected $primaryKey = 'id';


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
        'slug',
        'parent_id',
        'description',
        'user_id',
        'icon',
        'image',
        'image_hover',
        'featured',
        'order',
        'is_default',
    ];


    /**
     * @var string
     */
    protected $screen = PRODUCT_GROUP_MODULE_SCREEN_NAME;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Bytesoft
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_group');
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function parent()
    {
        return $this->belongsTo(ProductGroup::class, 'parent_id');
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function children()
    {
        return $this->hasMany(ProductGroup::class, 'parent_id');
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (ProductGroup $group) {
            $group->products()->detach();
        });
    }


}
