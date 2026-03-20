<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /** @use HasFactory<\Database\Factories\AnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments(){
        // This defines a relationship where each question can have many comments
        return $this->morphMany(Comment::class,'commentable'); //able to be used for both questions and answers
    }


    public function hearts(){

        return $this->morphMany(Heart::class,'heartable'); //able to be used for both questions and answers
    }

    public function isHearted(){
        return $this->hearts()->where('user_id',20)->exists();
    }

    public function heart(){
        $this->hearts()->create([
            'user_id' => 20
        ]);
    }

    public function unhearted(){
        $this->hearts()->where('user_id',20)->delete();
    }

}
