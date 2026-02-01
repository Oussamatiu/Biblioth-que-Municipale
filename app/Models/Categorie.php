<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
   protected $fillable = ['title'];

   public function book(){
    return $this->hasMany(Book::class);
   }
}
