<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Enable mass assignment
    protected $fillable = ["username", "topic", "title", "comment"];

    // Define the relationship with Comment model
    public function comments(){
        return $this->hasMany(Comment::class); // Correctly defines the relationship
    }
}
