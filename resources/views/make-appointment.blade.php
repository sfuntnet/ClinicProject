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
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">image</th>
                                <th scope="col">name</th>
                                <th scope="col">treatments</th>
                                <th scope="col">appointment date</th>
                                <th scope="col">appointment finish date</th>
                                <th scope="col">make an appointment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $models)
                                <tr>
                                    <td><img src="{{ url($models->image_url) }}"
                                             style="height: 100px; width: 150px;"></td>
                                    <td>{{$models->name}}</td>
                                    <td>@foreach($models->treatment as $treatments)
                                            {{$treatments->name}}
                                        @endforeach</td>
                                    <td>{{$models->appointment->date??null}}</td>
                                    <td>{{$models->appointment->finish_date??null}}</td>
                                    <form action="{{route('make-appointment.show',$models->id)}}" method="get">
                                        <td>
                                            <button class="btn btn-success">make an appointment</button>
                                        </td>
                                    </form>
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
