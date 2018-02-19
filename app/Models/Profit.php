<?php

namespace App\Models;

class Profit extends Model
{
    protected $fillable = [
        'category_id', 'account_id', 'user_id', 'value', 'receipt', 'source', 'description', 'date'
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
