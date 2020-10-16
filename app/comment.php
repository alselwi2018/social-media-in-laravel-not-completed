<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
   // protected $fillable =['txt','media','title'];
    // public function post(){
    //     return $this->hasMany(post::class);
    // }
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post(){
        return $this->belongsTo('App\post','foreign_key');
    }
}
