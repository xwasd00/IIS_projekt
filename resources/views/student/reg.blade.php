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
                        <p> Registrace testů</p>

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
                                        @if($test->registred)
                                            <button class="btn right" disabled>Registrován</button>
                                        @else
                                            <form class="right" action="{{url('student/reg')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" id="test_id" name="test_id" value="{{$test->id}}">
                                                <button class="btn btn-primary" type="submit">Registrovat</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
