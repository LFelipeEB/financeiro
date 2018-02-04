<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    public function account(){
        $this->belongsTo(Account::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
