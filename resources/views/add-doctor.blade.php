@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Doctor</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('doctor-add.store')}}"  enctype="multipart/form-data" id="upload-image" method="post">
                            <div class="form-group">
                                <input type="username" name="user_id" value="{{Auth::user()->id}}" class="form-control d-none"
                                       placeholder="Doctor Name"><br/>
                                <input type="username" name="name" class="form-control"
                                       placeholder="Doctor Name"><br/>
                                <input type="file" name="image" id="image" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <input type="submit" value="Save" class="form-group">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
