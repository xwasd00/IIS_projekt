@extends('layouts.app')

@section('title')
    @include('asistent.title')
@endsection

@section('navigation')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <p>Registrace testů</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název testu</th>
                            <th>Jméno studenta</th>
                            </thead>
                            <tbody>

                            @foreach($instances as $instance)
                                @if($instance->test->end > date("Y-m-d H:i:s"))
                                    <tr>
                                        <td>{{$instance->test->name}} </td>
                                        <td>{{$instance->user->name}} </td>
                                        <td><button class="btn btn-primary" href="">Zaregistrovat studenta</button></td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
