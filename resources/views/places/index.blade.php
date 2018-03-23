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

                        <p style="margin-bottom: 20px;">Places <a href="{{ route('place.create') }}" class="btn btn-primary" style="float: right;">Add Place</a></p>
                            <div style="clear: both;"></div>
                            <table class="myTable table table-bordered" id="placeTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($places as $place)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $place->name }}</td>
                                    <td>{!! $place->description !!}</td>
                                    <td>
                                        <a href="{{ route('place.edit',$place->id) }}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('place.destroy',$place->id) }}" onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{$place->id}}').submit();"><i class="fas fa-trash"></i></a>

                                        <form id="delete-form{{$place->id}}" action="{{ route('place.destroy',$place->id) }}" method="POST" style="display: none;">
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
        $("#placeTable").dataTable({
            responsive: true
        });
    </script>
@endsection