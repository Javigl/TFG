<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = "rentals";
    protected $guarded=[];

    public function car(){
        return $this->belongsTo('App\Models\Car');
    }
}
