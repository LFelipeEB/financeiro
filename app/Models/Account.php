<?php

namespace App\Models;

class Account extends Model
{
    public function bank(){
        return $this->belongsTo(Bank::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function creditCards(){
        return $this->hasMany(CreditCard::class);
    }

    public function profits(){
        return $this->hasMany(Profit::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }


}
