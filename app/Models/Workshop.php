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
        'filedlink',
        'time',
        'img_workshop'

    ];
    
    public function workshopsItems(){

        return $this->hasOne(Country::class, 'category_id');
    }
    
    public function user(){
        
        return $this->belongsTo(User::class,'author'); 
    }  
    public function country(){
        return $this->hasOne(Country::class,'id','country_id');
    }  
   
    public function deletefrom(){
        return $this->belongsTo(User::class,'deleted_from_id'); 
    }
}
