<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'workshop_token',
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
    public function city(){
        return $this->hasOne(City::class,'id','city_id');
    }  
   public function pendingParticipants(){
        return $this->hasMany(workshops_users::class)
        ->where('application_status','pending');
   }
  

   public function category(){

    return $this->hasOne(Category::class,'id','category_id');
   }

    public function deletefrom(){
        return $this->belongsTo(User::class,'deleted_from_id'); 
    }

    public function streaming(){

        return $this->belongsTo(Streaming::class,'id');
    }
}
