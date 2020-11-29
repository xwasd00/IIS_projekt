@extends('layouts.app')

@section('title')
    @include('student.title')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p> Aktivní testy</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název</th>
                            <th>začátek</th>
                            <th>časový limit</th>
                            </thead>
                            <tbody>

                            @foreach($tests as $test)
                                @if($test->test->end > date("Y-m-d H:i:s"))
                                <tr>
                                        <td>{{$test->test->name}} </td>
                                        <td>{{$test->test->start}} </td>
                                        <td>{{(strtotime($test->test->end) - strtotime($test->test->start))/60}} minut </td>
                                        @if($test->test->start <= date("Y-m-d H:i:s"))
                                            <td><button class="btn btn-primary" href="">Začít</button></td>
                                        @endif
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
