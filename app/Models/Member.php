<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Emprunt;

class Member extends Model
{
    protected $fillable = ['phone','address','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function emprunts(){
        return $this->hasMany(Emprunt::class);
    }
}
