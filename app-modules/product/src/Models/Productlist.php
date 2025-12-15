<?php

namespace Modules\Product\Models;

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
}
