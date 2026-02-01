<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','author','categorie_id','isbn','quantity','published_at'];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
