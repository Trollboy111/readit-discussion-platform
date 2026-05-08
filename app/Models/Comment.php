<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Enable mass assignment
    protected $fillable = ["username", "comment", "post_id"];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
