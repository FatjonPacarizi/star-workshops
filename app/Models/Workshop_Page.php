<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop_Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'paragraf_1',
        'paragraf_2',
        'img',
    ];
}
