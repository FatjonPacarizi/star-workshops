<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class streamings_workshops extends Model
{
    use HasFactory;

    public function streaming(){

        return $this->belongsTo(Streaming::class,'streaming_id');
    }
}
