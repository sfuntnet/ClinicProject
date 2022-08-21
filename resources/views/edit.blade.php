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
                            <form action="{{route('doctor-add.update',$model->appointment->id)}}" method="post">
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Appointment start time</p>
                                        <input name="date" type="date" value="{{$model->appointment->date->format('Y-m-d')?? null}}" class="form-group">
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Appointment finish time</p>
                                        <input name="finishdate" type="date" value="{{$model->appointment->finish_date->format('Y-m-d')??null}}" class="form-group">
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
