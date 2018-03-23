<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'title',
        'room_id',
        'description',
        'place_id',
        'meeting_date',
        'approved',
        't_730am',
        't_800am',
        't_830am',
        't_900am',
        't_930am',
        't_1000am',
        't_1030am',
        't_1100am',
        't_1130am',
        't_1200pm',
        't_1230pm',
        't_100pm',
        't_130pm',
        't_200pm',
        't_230pm',
        't_300pm',
        't_330pm',
        't_400pm',
        't_430pm',
        't_500pm',
        't_530pm',
        't_600pm',
        't_630pm',
        't_700pm',
        't_730pm',
        't_800pm',
        't_830pm',
        't_900pm',
        't_930pm',
        't_1000pm',
        't_1030pm',
        't_1100pm',
        't_1130pm',
        't_1200am',
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function place(){
        return $this->belongsTo(Place::class);
    }
}
