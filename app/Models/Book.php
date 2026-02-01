<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Emprunt;
class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','author','categorie_id','isbn','quantity','published_at'];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function emprunts(){
        return $this->hasMany(Emprunt::class);
    }
}
