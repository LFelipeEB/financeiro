<?php

namespace App\Models;

use App\Account;
use App\Application;
use App\CreditCard;
use App\Expense;
use App\Profit;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use Notifiable;
	use HasRoles;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

    public function profits(){
        return $this->hasMany(Profit::class);
    }

    public function accounts(){
        return $this->hasMany(Account::class);
    }

    public function creditCard(){
        return $this->hasMany(CreditCard::class);
    }
}
