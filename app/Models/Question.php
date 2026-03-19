<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    public function answers()
    {
        // This defines a relationship where each question can have many answers
        return $this->hasMany(Answer::class);
    }

    public function category()
    {
        // This defines a relationship where each question belongs to a category
        return $this->belongsTo(Category::class);
    }

    public function user(){
        // This defines a relationship where each question belongs to a user
        return $this->belongsTo(User::class);
    }

    public function comments(){
        // This defines a relationship where each question can have many comments
        return $this->morphMany(Comment::class,'commentable'); //able to be used for both questions and answers
    }
}


