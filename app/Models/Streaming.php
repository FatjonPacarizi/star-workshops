<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streaming extends Model
{
    use HasFactory;

    public function workshop(){

        return $this->hasMany(Workshop::class,'id','workshop_id');
    }
}
