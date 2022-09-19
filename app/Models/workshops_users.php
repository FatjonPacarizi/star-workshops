<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workshops_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id',
        'user_id',
        'application_status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
