<?php

namespace App\Models;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function account(){
        return $this->hasMany(Account::class);
    }

    public function profits(){
        return $this->hasMany(Profit::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

    public function  invoceCreditCard(){
        return $this->hasMany(InvoceCreditCard::class);
    }
}
