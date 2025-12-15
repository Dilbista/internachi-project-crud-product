<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    protected $fillable = [
    'name',
    'email',
    'password',
];
}
