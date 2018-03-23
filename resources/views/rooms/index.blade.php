@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables/datatables.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default" >
                    <div class="panel-heading">Menu</div>

                    <div class="panel-body">
                        <div style="height: 700px;">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Place & Room
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

                        <p style="margin-bottom: 20px;">Rooms <a href="{{ route('room.create') }}" class="btn btn-primary" style="float: right;">Add room</a></p>
                            <div style="clear: both;"></div>
                            <table class="myTable table table-bordered" id="roomTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Place</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($rooms as $room)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->place->name }}</td>
                                    <td>{!! $room->description !!}</td>
                                    <td>
                                        <a href="{{ route('room.show',$room->id) }}"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('room.edit',$room->id) }}"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('room.destroy',$room->id) }}" onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{$room->id}}').submit();"><i class="fas fa-trash"></i></a>

                                        <form id="delete-form{{$room->id}}" action="{{ route('room.destroy',$room->id) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('plugins') }}/datatables/datatables.min.js"></script>
    <script type="text/javascript">
        $("#roomTable").dataTable({
            responsive: true
        });
    </script>
@endsection