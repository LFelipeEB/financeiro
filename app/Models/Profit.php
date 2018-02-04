<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
