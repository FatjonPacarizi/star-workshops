<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = array(
        'name',
        'comment',
        'user_id',
        'streaming_id'
    );

    public function replies(){

        return $this->hasMany(Reply::class);
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
