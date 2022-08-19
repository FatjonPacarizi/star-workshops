<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'logo_name',
        'img_informations',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];
}
