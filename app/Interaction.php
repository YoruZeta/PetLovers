<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function pet(){
    return $this->belongsTo(Pet::class);
  }
}
