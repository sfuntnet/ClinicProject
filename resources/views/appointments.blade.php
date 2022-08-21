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
                                <th scope="col">client name</th>
                                <th scope="col">client surname</th>
                                <th scope="col">Doctor name</th>
                                <th scope="col">date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $models)
                                <tr>
                                    <td>{{$models->client_name}}</td>
                                    <td>{{$models->client_surname}}</td>
                                    <td>@foreach($models->doctor as $doctors)
                                            {{$doctors->name}}
                                        @endforeach</td>
                                    <td>{{$models->date}}</td>
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
