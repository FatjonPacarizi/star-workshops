<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'time',
        'image',
    ];

    public function user(){
        
        return $this->belongsTo(User::class,'author'); 
    }  
}
