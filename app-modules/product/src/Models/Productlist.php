<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Productlist extends Model
{

    protected $table = 'productlists';

    protected $fillable = [
        'name',
        'description',
        'purchase_price',
        'selling_price',
        'status',
        'image',
        'quantity',
    ];


    //this is for local scope fuction

    //  public function scopeActive($query)
    // {
    //     return $query->where('status', 'active');
    // }


     /**
     * Apply a global scope to always filter active products
     */
    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', 'active');
        });
    }
}
