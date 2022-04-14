<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = "travels";
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function is_passenger(){
        return $this->belongsToMany('App\Models\User');
    }
}
