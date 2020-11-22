@extends('layouts.app')

@section('title')
    @include('asistent.title')
@endsection

@section('navigation')
    @include('asistent.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <p> Assistant page</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
