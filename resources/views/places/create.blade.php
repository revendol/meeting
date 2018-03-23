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
                        <div style="height: 495px;">
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

                        <p style="margin-bottom: 20px;">Add Place <a href="{{ route('place.index') }}" class="btn btn-primary" style="float: right;">Places</a></p>
                        <div style="clear: both;"></div>
                            <form action="{{ route('place.store') }}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block" value="Save">
                                </div>


                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
