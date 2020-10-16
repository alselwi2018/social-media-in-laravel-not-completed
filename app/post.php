<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany('App\comment')->orderBy('created_at','desc');
    }
}
