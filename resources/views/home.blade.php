@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css')}}/home.css">
    <script src="{{asset('js')}}/jquery-3.1.1.min.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default" >
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    <div style="height: 1330px;">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Room & Place
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body" style="margin-left: 15px;">
                                        @include('partials.leftMenue')
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Book Room
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body" style="margin-left: 15px;">
                                        @include('partials.book_room')
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Filter
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{ url('home') }}" method="GET">
{{--                                            {{csrf_field()}}--}}
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Place</label>
                                                <select class="form-control" required name="place" id="exampleFormControlSelect1">
                                                    @foreach($places as $place)
                                                    <option value="{{$place->id}}" @if($place_status == $place->name) selected @endif>{{$place->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Date</label>
                                                <input type="date" name="date" required id="exampleFormControlSelect2" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success btn-block" value="Search">
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Room Status in {{ $place_status }} at {{ $date }}</p>

                    <div class="table-responsive">
                        <form action="" method="post">
                            @if(count($rooms)>0)
                                <table class="myTable table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Time</th>
                                        @foreach($rooms as $room)
                                            <th>{{$room->room->name}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>7:30 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_730am) title="{{$room->t_730am}}" class="booked-room" onclick="description('{{$room->t_730am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>8:00 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_800am) title="{{$room->t_800am}}" class="booked-room" onclick="description('{{$room->t_800am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>8:30 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_830am) title="{{$room->t_830am}}" onclick="description('{{$room->t_830am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" class="booked-room" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>9:00 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_900am) title="{{$room->t_900am}}" class="booked-room" onclick="description('{{$room->t_900am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>9:30 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_930am) title="{{$room->t_930am}}" class="booked-room" onclick="description('{{$room->t_930am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>10:00 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1000am) title="{{$room->t_1000am}}" class="booked-room" onclick="description('{{$room->t_1000am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>10:30 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1030am) title="{{$room->t_1030am}}" class="booked-room" onclick="description('{{$room->t_1030am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>11:00 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1100am) title="{{$room->t_1100am}}" class="booked-room" onclick="description('{{$room->t_1100am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>11:30 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1130am) title="{{$room->t_1130am}}" class="booked-room" onclick="description('{{$room->t_1130am}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>12:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1200pm) title="{{$room->t_1200pm}}" class="booked-room" onclick="description('{{$room->t_1200pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>12:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1230pm) title="{{$room->t_1230pm}}" class="booked-room" onclick="description('{{$room->t_1230pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>1:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_100pm) title="{{$room->t_100pm}}" class="booked-room" onclick="description('{{$room->t_100pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>1:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_130pm) title="{{$room->t_130pm}}" class="booked-room" onclick="description('{{$room->t_130pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>2:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_200pm) title="{{$room->t_200pm}}" class="booked-room" onclick="description('{{$room->t_200pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>2:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_230pm) title="{{$room->t_230pm}}" class="booked-room" onclick="description('{{$room->t_230pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>3:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_300pm) title="{{$room->t_300pm}}" class="booked-room" onclick="description('{{$room->t_300pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>3:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_330pm)  title="{{$room->t_330pm}}" class="booked-room" onclick="description('{{$room->t_330pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>4:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_400pm) title="{{$room->t_400pm}}" class="booked-room" onclick="description('{{$room->t_400pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>4:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_430pm) title="{{$room->t_430pm}}" class="booked-room" onclick="description('{{$room->t_430pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>5:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_500pm) title="{{$room->t_500pm}}" class="booked-room" onclick="description('{{$room->t_500pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>5:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_530pm) title="{{$room->t_530pm}}" class="booked-room" onclick="description('{{$room->t_530pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>6:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_600pm) title="{{$room->t_600pm}}" class="booked-room" onclick="description('{{$room->t_600pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>6:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_630pm) title="{{$room->t_630pm}}" class="booked-room" onclick="description('{{$room->t_630pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>7:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_700pm) title="{{$room->t_700pm}}" class="booked-room" onclick="description('{{$room->t_700pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>7:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_730pm) title="{{$room->t_730pm}}" class="booked-room" onclick="description('{{$room->t_730pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>8:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_800pm) title="{{$room->t_800pm}}" class="booked-room" onclick="description('{{$room->t_800pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>8:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_830pm) title="{{$room->t_830pm}}" class="booked-room" onclick="description('{{$room->t_830pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>9:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_900pm) title="{{$room->t_900pm}}" class="booked-room" onclick="description('{{$room->t_900pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>9:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_930pm) title="{{$room->t_930pm}}" class="booked-room" onclick="description('{{$room->t_930pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>10:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1000pm) title="{{$room->t_1000pm}}" class="booked-room" onclick="description('{{$room->t_1000pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>10:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1030pm) title="{{$room->t_1030pm}}" class="booked-room" onclick="description('{{$room->t_1030pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>11:00 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1100pm) title="{{$room->t_1100pm}}" class="booked-room" onclick="description('{{$room->t_1100pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>11:30 PM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1130pm) title="{{$room->t_1130pm}}" class="booked-room" onclick="description('{{$room->t_1130pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>12:00 AM</td>
                                        @foreach($rooms as $room)
                                            <td @if($room->t_1200pm) title="{{$room->t_1200pm}}" class="booked-room"  onclick="description('{{$room->t_1200pm}}','{{$room->description}}','{{ $room->place->name }}','{{ date('d M, Y',strtotime($room->meeting_date)) }}')" @endif></td>
                                        @endforeach
                                    </tr>
                                    </tbody>

                                </table>
                            @else
                                <p>No meeting allocated in {{ $place_status }} at {{ $date }}</p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
    {{--Launch demo modal--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Date</label>
                    <p id="meeting_date"></p>
                </div>
                <div class="form-group">
                    <label>Place Name</label>
                    <p id="pname"></p>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <p id="desc"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        function description(title,desc,pname,date) {
            $('#exampleModalLabel').html(title);
            $('#meeting_date').html(date);
            $('#pname').html(pname);
            $('#desc').html(desc);
            $('#exampleModal').modal('show');
        }
    </script>
@endsection
