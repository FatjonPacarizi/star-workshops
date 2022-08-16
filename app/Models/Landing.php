<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;
    protected $table = 'landings';
    protected $fillable = [
       
        'title',
        'heading',
        'paragraf',
        'image',
        'button',
    ];
}