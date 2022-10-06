<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;
    protected $table = 'landings';
    protected $fillable = [
       
        'section_id',
        'heading',
        'paragraf_1',
        'paragraf_2',
        'button',
        'img_1',
        'img_2',
        'img_3',
    ];
}