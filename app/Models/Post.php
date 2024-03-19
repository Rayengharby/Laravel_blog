<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);

    }
    public function Comments(){
        return $this->hasMany(Comment::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
