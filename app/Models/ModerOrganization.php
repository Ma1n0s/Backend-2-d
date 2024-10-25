<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModerOrganization extends Model
{
    protected $fillable = [
        'inn_comp',
        'OGRN',
        'OKPO',
        'BIC',
        'street',
        'home',
        'region',
        'site',
        'comment',
        'file',
    ];
}
