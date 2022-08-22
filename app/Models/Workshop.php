<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'limited_participants',
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
