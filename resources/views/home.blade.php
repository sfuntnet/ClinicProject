@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

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
                                    <th scope="col">edit appointment</th>
                                    <th scope="col">cancel the appointment</th>
                                    <th scope="col">activate the appointment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($model as $models)
                                    @foreach($models->doctor as $doctors)
                                        @if($doctors->pivot->user_id === Auth::user()->id)
                                            <tr>
                                                <td><img src="{{ url($doctors->image_url) }}"
                                                         style="height: 100px; width: 150px;"></td>
                                                <td>{{$doctors->name}}</td>
                                                <td>@foreach($doctors->treatment as $treatments)
                                                        {{$treatments->name}}<br/>
                                                    @endforeach</td>
                                                <td>{{$doctors->appointment->date??null}}</td>
                                                <td>{{$doctors->appointment->finish_date ??null}}</td>
                                                <form action="{{route('doctor-add.edit',$doctors->id)}}" method="get">
                                                    <td>
                                                        <button type="submit" class="btn btn-warning">edit appointment
                                                        </button>
                                                    </td>
                                                </form>
                                                <form action="{{route('doctor-add.destroy',$doctors->id)}}" method="POST">
                                                    @method('delete')
                                                    <td>
                                                        <button class="btn btn-danger">cencel appointment</button>
                                                    </td>
                                                </form>
                                                <form  action="{{route('doctor.appointmentActive',$doctors->id)}}" method="post">
                                                    @method('delete')
                                                    <td>
                                                        <button class="btn btn-success">Active appointment</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

