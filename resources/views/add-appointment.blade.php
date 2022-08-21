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
                        <form action="{{route('doctor.update')}}" method="post">
                            @method('put')
                            <div class="form-group">
                                <label  for="exampleFormControlSelect1">Choose the doctor</label>
                                    <select name="name" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($model as $models)
                                        <option value="{{$models->id}}">{{$models->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <p>Add treatment</p>
                            <input type="username" name="treatment" class="form-control" id="exampleFormControlInput1"
                                   placeholder="name@example.com">
                            <br/>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Appointment start time</p>
                                    <input name="date" type="date" class="form-group">
                                </div>
                                <div class="col-lg-6">
                                    <p>Appointment finish time</p>
                                    <input name="finishdate" type="date" class="form-group">
                                </div>
                            </div>
                            <input type="submit" value="save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
