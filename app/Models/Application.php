<?php

namespace App\Models;

use App\Models\User;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'value', 'expected', 'type', 'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
