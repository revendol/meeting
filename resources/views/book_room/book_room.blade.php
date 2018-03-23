@extends('layouts.app')

@section('styles')
    <script src="{{ asset('js') }}/jquery-3.1.1.min.js"></script>
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
                        <div style="height: 905px;">
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

                        <p style="margin-bottom: 20px;">Book Room <a href="{{ route('place.index') }}" class="btn btn-primary" style="float: right;">Show List</a></p>
                        <div style="clear: both;"></div>
                        <form action="{{ route('book-room-store') }}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" id="name" class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="place">Place</label>
                                <select class="form-control" name="place" id="place">
                                    <option>Please select a place</option>
                                    @foreach($places as $place)
                                        <option value="{{$place->id}}">{{ $place->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="room">Room</label>
                                <select class="form-control" name="room" id="room">
                                    <option value="">Please select a room</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="from-date">From</label>
                                <p class="help-block">Time less than 30 minute will be converted to zero minute (12.06 AM to 12.00 AM) of present hour and grater than 30 as 30 (12:36 AM to 12:30 AM).</p>
                                <input type="datetime-local" id="from-date" class="form-control" name="from_date">
                            </div>
                            <div class="form-group">
                                <label for="from-date">To</label>
                                <p class="help-block">Time les than 30 will be converted to 30 (12:06 AM to 12:30 AM) and grater than 30 as next hour (12:36 AM to 1:00 AM).</p>
                                <input type="datetime-local" id="to-date" class="form-control" name="to_date">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block" value="Book">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        var rooms = '<option>Please select a room.</option>';
        $('#place').change(function () {
            $('#room').empty();
            $.ajax({
                url: "{{ url('') }}/get-room/"+$('#place').val(),
                success: function (response) {
                    var i=0;
                    response = JSON.parse(response);
                    for (var count = 0; count < response.length; count++){
                        rooms += '<option value="'+response[count].id+'">'+response[count].name+'</option>';
                    }
                    $('#room').append(rooms);
                    rooms = '<option>Please select a room.</option>';
                }
            });
        });
    </script>
@endsection
