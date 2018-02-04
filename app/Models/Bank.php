<?php

namespace App\Models;

class Bank extends Model
{
    public function accounts(){
        return $this->hasMany(Account::class);
    }
}
