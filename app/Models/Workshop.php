<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'limited_participants',
        'description',
        'author',
        'type_id',
        'country_id',
        'city_id',
        'category_id',
        'time',
        'img_workshop'

    ];
    
    public function workshopsItems(){

        //customer_id is a foreign key in customer_items table
    
        return $this->hasOne(Country::class, 'category_id');
    
        // A customer will has many items thats why hasMany relation is used here
         }

}
