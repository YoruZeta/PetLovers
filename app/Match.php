<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  protected $table = 'matches';
  public $timestamps = true;

  public function giveUser(){
    return $this->belongsTo(User::class,'give_user_id');
  }

  public function ownerUser(){
    return $this->belongsTo(User::class,'owner_user_id');
  }

  public function likedPet(){
    return $this->belongsTo(Pet::class,'liked_pet_id');
  }
}
