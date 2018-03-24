<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;

class BookRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bookRoom(){
        $places = Place::all();
        return view('book_room.book_room',compact('places'));
    }
    public function store(Request $request){
//        dd($request->input());
        $this->validate($request,[
            'title' => 'required',
            'place' => 'required',
            'room' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        $from_date = explode('T',$request->from_date)[0];
        $from_time = explode('T',$request->from_date)[1];
        $from_hour = explode(':',$from_time)[0]-0;
        $from_minute = explode(':',$from_time)[1];
        if($from_minute>=30){
            $from_minute = 30;
        } else{
            $from_minute = '00';
        }
        $to_date = explode('T',$request->to_date)[0];
        $to_time = explode('T',$request->to_date)[1];
        $to_hour = explode(':',$to_time)[0]-0;
        $to_minute = explode(':',$to_time)[1];
        if($to_minute>30){
            $to_minute = '00';
        } else{
            $to_minute = 30;
        }
        $coulmns = [];
        $flag = 0;
        if($to_hour == 0){
            $to_hour = 24;
        }
        for($h=$from_hour;$h<=$to_hour;$h++){
            $interval = $from_minute;
            for ($m=0;$m<2;$m++){
                if($h==12){
                    $coulmns[] = 't_12'.$interval.'pm';
                } else{
                    $coulmns[] = $h>12?'t_'.($h-12).$interval.'pm':'t_'.$h.$interval.'am';
                }
                if($flag == 0 && $from_minute == 30){
                    $flag++;
                    break;
                }
                if($interval == '00'){
                    $interval = 30;
                } else {
                    $interval = '00';
                }
            }
        }
        $meeting = Meeting::where('place_id','=',$request->place)->where('room_id','=',$request->room)->where('meeting_date','=',$from_date)->first();
        if(!$meeting){
            $meeting = new Meeting();
        }
        $meeting->title = $request->title;
        $meeting->place_id = $request->place;
        $meeting->room_id = $request->room;
        $meeting->description = $request->description;
        $meeting->meeting_date = $from_date;
        $meeting->approved = true;
        foreach ($coulmns as $coulmn){
            $meeting->$coulmn = $request->title;
        }
        $meeting->save();
        return back();

    }
    public function getRoom($id){
        $rooms = Room::where('place_id','=',$id)->get();
        $ret = [];
        foreach ($rooms as $room){
            $ret[] = [
                'id' => $room->id,
                'name' => $room->name
            ];
        }
        $ret = json_encode($ret);
        return $ret;
    }
    public function listOperations(){
        $places = Place::all();
        $place_status='Dhaka';
        $meetings = Meeting::where('place_id',1)->get();
        $date = date('Y-m-d');
        return view('book_room.list',compact('places','place_status','meetings','date'));

    }
}
