@extends('layouts.app')
@section('title')
@include('asistent.title')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <p>Hodnocení žáků</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název testu</th>
                            <th>Jméno studenta</th>
                            </thead>
                            <tbody>

                            @foreach($instances as $instance)
                                @if($instance->test->end < date("Y-m-d H:i:s") && $instance->approved)
                                    <tr>
                                        <td>{{$instance->test->name}} </td>
                                        <td>{{$instance->user->name}} </td>
                                        <td>
                                            @if($instance->evaluated)
                                                (hodnoceno: {{$instance->score}})  <button class="btn btn-primary" onclick="window.location='{{url('asistent/eval', [$instance->id])}}'">Upravit hodnocení</button>
                                            @else
                                                <button class="btn btn-primary" onclick="window.location='{{url('asistent/eval', [$instance->id])}}'">Hodnotit</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection