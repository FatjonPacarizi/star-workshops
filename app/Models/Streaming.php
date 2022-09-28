<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streaming extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'workshop_id'
    ];

    public function workshop(){

        return $this->hasMany(Workshop::class,'id','workshop_id');
    }
}
