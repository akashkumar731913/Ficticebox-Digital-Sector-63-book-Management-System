<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingComment extends Model
{
    use HasFactory;

    function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    
    function book(){
        return $this->hasOne('App\Models\Book','id','book_id');

    }
    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'comment',
    ];
}
