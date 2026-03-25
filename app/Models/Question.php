<?php

namespace App\Models;

use App\Traits\HasHeart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory, HasHeart;

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

    protected static function booted(){
        static::deleting(function($question){
            // delete all the hearts
            $question->hearts()->delete();

            // delete all the comments and their hearts
            $question->comments()->get()->each(function($comment) {
                $comment->hearts()->delete();

                $comment->delete();
            });

            // delete all the answers and their comments and hearts
            $question->answers()->get()->each(function($answer){
                $answer->hearts()->delete();

                // delete all the comments and their hearts for each answer
                $answer->comments()->get()->each(function($comment) {
                    $comment->hearts()->delete();

                    $comment->delete();
                });
            });
        });
    }


}


