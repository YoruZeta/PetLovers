<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function match(){
    return $this->belongsTo(User::class,'match_user_id');
  }
}
