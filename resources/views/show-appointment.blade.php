@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Make Appointment</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('appointment-make',$model->id)}}" method="post">
                            <input type='username' class="form-group" name="name" placeholder="name">
                            <input type='surname' class="form-group" name="surname" placeholder="surname">
                            <input type='date' class="form-group" name="date">
                            <input type='submit' value="make">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
