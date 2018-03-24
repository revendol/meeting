@extends('layouts.app')

@section('styles')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default" >
                    <div class="panel-heading">Menu</div>

                    <div class="panel-body">
                        <div style="height: 575px;">
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

                        <p style="margin-bottom: 20px;">Show Room <a href="{{ route('room.index') }}" class="btn btn-primary" style="float: right;">Rooms</a></p>
                        <div style="clear: both;"></div>

                            <table class="table ">
                                <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $room->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Room Description</th>
                                    <td>{!! $room->description !!}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Room Place</th>
                                    <td >{{ $room->place->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Place Description</th>
                                    <td >{!! $room->place->description !!}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p>Meeting allocated on {{ date('d M, Y') }}</p>
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($start as $key => $s)
                                <tr>
                                    <th scope="row">{{ $s['index'] }} - {{ $end[$key]['index'] }}</th>
                                    <td>{{ $s['title'] }}</td>
                                </tr>
                                @endforeach
                                @if(!count($start))
                                    <tr>
                                        <td colspan="3">No meeting to show yet</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
