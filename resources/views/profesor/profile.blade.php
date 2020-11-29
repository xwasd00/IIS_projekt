@extends('layouts.app')

@section('title')
    @include('profesor.title')
@endsection

@section('navigation')
    @include('profesor.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Jméno:</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection