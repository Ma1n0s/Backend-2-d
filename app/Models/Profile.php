<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'OGRN',
        'OKPO',
        'BIC',
        'postalCode',
        'region',
        'city',
        'street',
        'home',
    ];
}
