<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
   protected $table = 'pets';
   public $timestamps = false;

   public function Userid(){
     return $this->belongsTo(User::class,'humano_id');
   }

   public function owner(){
     return $this->belongsTo(User::class,'humano_id');
   }

   public function interactions(){
     return $this->hasMany(Interaction::class);
   }

}
