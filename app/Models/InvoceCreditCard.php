<?php

namespace App\Models;

class InvoceCreditCard extends Model
{
    protected $fillable = [
        'credit_card_id', 'category_id' , 'date_buy', 'plots', 'place', 'value'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function creditCard(){
        return $this->belongsTo(CreditCard::class);
    }

}
