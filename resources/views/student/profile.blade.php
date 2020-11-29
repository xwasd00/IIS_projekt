@extends('layouts.app')

@section('title')
    @include('student.title')
@endsection



@section('content')
    <div class="container">
        <div class="row jtify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p> Profil</p>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection