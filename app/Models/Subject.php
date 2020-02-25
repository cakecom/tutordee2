<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable=['subject_name'];
    public function group(){
        return $this->hasOne('App\Models\Group');
    }

//    function group(){
//        return $this->belongsTo('App\Models\Group');
//    }
}
