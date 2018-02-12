<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'category_id', 'account_id', 'user_id', 'value', 'receipt', 'place', 'description', 'date'
    ];

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
