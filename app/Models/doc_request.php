<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doc_request extends Model
{
    //
    protected $fillable=['user_id','status','image'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
