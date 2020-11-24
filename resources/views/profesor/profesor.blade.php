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
                        <p> Profesor page</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název</th>
                            <th>začátek</th>
                            <th>časový limit</th>
                            </thead>
                            <tbody>

                            @foreach($tests as $test)
                                <tr>
                                    <td>{{$test->name}} </td>
                                    <td>{{$test->start}} </td>
                                    <td>{{(strtotime($test->end) - strtotime($test->start))/60}} minut </td>
                                    <td>
                                        <button class="btn btn-primary" onclick="window.location='{{ url('profesor/show', [$test->id]) }}'"> Detail </button>
                                    </td>
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
