<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function raters(){
        return $this->belongsTo('App\Models\User');
    }

    public function is_evaluated(){
        return $this->belongsTo('App\Models\User');
    }
}
