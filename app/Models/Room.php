<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['place_id','name','description'];

    public function place(){
        return $this->belongsTo(Place::class);
    }
}
