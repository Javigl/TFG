<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function rentals(){
        return $this->hasMany('App\Models\Rental');
    }
}
