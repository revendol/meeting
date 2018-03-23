<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all();
        return view('rooms.create',compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'place' => 'required'
        ]);
        Room::create(['place_id'=>$request->place,'name'=>$request->name,'description'=>$request->description]);

        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::where('id',$id)->firstOrFail();
//        $meeting = Meeting::where('room_id','=',$id)->where('meeting_date','=',date('Y-m-d'))->first();
//        $columns = [
//            't_730am',
//            't_800am',
//            't_830am',
//            't_900am',
//            't_930am',
//            't_1000am',
//            't_1030am',
//            't_1100am',
//            't_1130am',
//            't_1200pm',
//            't_1230pm',
//            't_100pm',
//            't_130pm',
//            't_200pm',
//            't_230pm',
//            't_300pm',
//            't_330pm',
//            't_400pm',
//            't_430pm',
//            't_500pm',
//            't_530pm',
//            't_600pm',
//            't_630pm',
//            't_700pm',
//            't_730pm',
//            't_800pm',
//            't_830pm',
//            't_900pm',
//            't_930pm',
//            't_1000pm',
//            't_1030pm',
//            't_1100pm',
//            't_1130pm',
//            't_1200am',
//        ];
//        $output = [];
//        $flag = true;
//        foreach ($columns as $key => $column){
//            $time = explode('_',$column)[1];
//
//            if($meeting->$column!='0' && $flag){
//                $flag = false;
//                $output[] = [
//                    'start' => $key,
//                    'time' => strlen($column)==7?substr($time,0,1).':'.substr($time,1):substr($time,0,2).':'.substr($time,2),
//                    'title' => $meeting->$column
//                ];
//            } elseif($meeting->$column=='0'&&!$flag) {
//                $time = explode('_',$column)[1];
//                $flag = true;
//                $output[] = [
//                    'end' => $key-1,
//                    'time' => strlen($columns[$key-1])==7?substr($time,0,1).':'.substr($time,1):substr($time,0,2).':'.substr($time,2),
//                ];
//            }
//        }
//        dd($output);
        return view('rooms.show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::where('id',$id)->firstOrFail();
        $places = Place::all();
        return view('rooms.edit',compact('room','places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'place' => 'required'
        ]);
        $room = Room::where('id',$id)->firstOrFail();
        $room->place_id = $request->place;
        $room->name = $request->name;
        $room->description = $request->description;
        $room->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::where('id',$id)->delete();
        return back();
    }
}
