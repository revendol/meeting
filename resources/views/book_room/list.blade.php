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
                        <div style="height: 650px;">
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
                                @if(count($meetings)>0)
                                    <table class="myTable table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Place</th>
                                            <th>Room</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1 ?>
                                            @if($meetings)
                                                @foreach($meetings as $meeting)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $meeting->place->name }}</td>
                                                        <td>{{ $meeting->room->name }}</td>
                                                        <td>{{ date('d M, Y',strtotime($meeting->meeting_date)) }}</td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                //
                                            @endif
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

@endsection

@section('javascript')

@endsection
