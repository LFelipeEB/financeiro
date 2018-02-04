<?php

namespace App\Models;

use App\Models\User;

class Application extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
