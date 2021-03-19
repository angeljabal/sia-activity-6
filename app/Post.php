<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'post', 'tags'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function ratings(){
        return $this->hasMany('App\Rating');
    }
}
