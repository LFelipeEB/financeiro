<?php

namespace App\Models;

class Log extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function makeLog($actual, $past = null){

    }
}
