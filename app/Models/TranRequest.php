<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranRequest extends Model
{
    //
    protected $fillable=['user_id','status','amount','image'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
