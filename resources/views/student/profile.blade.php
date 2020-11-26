@extends('layouts.app')

@section('title')
    @include('student.title')
@endsection

@section('navigation')
    @include('student.navbar')
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
                            @foreach($users as $row)
                            <tr>
                                <th>{{$row['name']}}</th>
                                <th>{{$row['email']}}</th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection