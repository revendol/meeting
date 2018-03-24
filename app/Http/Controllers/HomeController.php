<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Place;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = '';
        $place_status= '';
        $date = date('d M, Y');
        if(isset($_GET['place'])&&isset($_GET['date'])&&is_numeric($_GET['place'])&&$this->validateDate($_GET['date'],'Y-m-d')){
            $rooms = Meeting::where('place_id','=',$_GET['place'])->where('meeting_date','=',$_GET['date'])->get();
            $date = $_GET['date'];
            $place_status = Place::where('id',$_GET['place'])->first()->name;
        } else{
            $rooms = Meeting::where('place_id','=',1)->where('meeting_date','=',date('Y-m-d'))->get();
            $place_status = isset($rooms[0]->place->name)?$rooms[0]->place->name:'Dhaka';
        }
        $places = Place::all();
        return view('home',compact('rooms','date','places','place_status'));
    }
    function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}
