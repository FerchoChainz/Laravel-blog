<?php

namespace  App\Traits;

use App\Models\Heart;

trait HasHeart {

    public function hearts(){

        return $this->morphMany(Heart::class,'heartable'); //able to be used for both questions and answers
    }

    public function isHearted(){

        if($this->relationLoaded('hearts')) {
            return $this->hearts->isNotEmpty();

        }

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
