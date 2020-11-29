@extends('layouts.app')

@section('title')
    @include('student.title')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="h3 ">{{$test->name}}</h3>
                    <div class="text-right">Zbývající čas: <span id="timer"></span></div>

                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        @foreach($questions as $question)
                        <div class="form-group">
                            <label for="questions[{{$question->id}}]" class="col-md-2">{{$question->name}}</label><br>
                            <p>{{$question->task}}</p>
                            <div class="col-md-8">
                                <input id="questions[{{$question->id}}]" type="text" class="form-control" name="questions[{{$question->id}}]"
                                       value="@if(isset($question->id, $answers)){{$answers[$question->id]}}@endif">

                            </div>
                        </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Uložit
                                </button>
                            </div>
                        </div>
                    </form>



                    @foreach($test->questions as $question)
                        <h4>{{$question->name}}</h4><br>
                        {{$question->task}}<br>
                        @if(sizeof($question->answers) < 2)
                            otevrena odpoved
                        @else
                            uzavrena odpoved
                        @endif
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
