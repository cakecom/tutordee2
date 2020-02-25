<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable=['group_name'];
    public function subject(){
        return $this->hasMany('App\Models\Subject');
    }
    public function showsubject(){
        return $this->belongsTo('App\Models\Subject');

    }
}
