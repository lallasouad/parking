<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    
    protected $fillable = ['title', 'body', 'user_id','user_name'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
   
}
