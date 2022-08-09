<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'country_id',
        'city_id',
        'category_id',
        'time'
    ];
    public static function create(array $array)
    {
    }
}
