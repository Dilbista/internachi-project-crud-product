<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class user extends Model
{
    use Notifiable;
    //
    protected $fillable = [
    'name',
    'email',
    'password',
];
}
