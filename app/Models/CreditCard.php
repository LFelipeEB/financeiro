<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = [
        'account_id', 'user_id', 'good_true', 'printed_name', 'nickname', 'brand', 'number',
        'limit', 'maturity', 'closure'
    ];
    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function  invoceCreditCard(){
        return $this->hasMany(InvoceCreditCard::class);
    }
}
