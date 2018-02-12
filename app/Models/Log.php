<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    protected $fillable = [
        'actual', 'past', 'model', 'model_id', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function makeLog($actual, $past = null){
        $log = Log::create([
            'actual' => $actual->toJson(),
            'past' => serialize($past),
            'model' => get_class($actual),
            'model_id' => $actual->id,
            'user_id' => Auth::id()
        ]);

    }
}
