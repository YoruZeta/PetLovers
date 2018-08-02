<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Match extends Model
{
  protected $appends = ['the_other'];

  public function user(){
    return $this->belongsTo(User::class);
  }
  public function match(){
    return $this->belongsTo(User::class,'match_user_id');
  }

  public function getTheOtherAttribute(){
    if($this->user_id == Auth::user()->id){
      return $this->match;
    }else{
      return $this->user;
    }
  }
}
