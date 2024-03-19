<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;


class Comment extends Model
{
    use HasFactory;
    public function Post(){
        return $this->belongsTo(Post::class);

    }
    public function User(){
        return $this->belongTo ( User::class);
    }
}
