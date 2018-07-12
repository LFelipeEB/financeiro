<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'account_id', 'user_id', 'value', 'receipt', 'place', 'description', 'date_operation'
    ];

    protected $dates = [
      'date_operation', 'deleted_at'
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
