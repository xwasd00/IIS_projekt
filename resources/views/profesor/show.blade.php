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
    <div class="modal-title">{{$test->name}}</div>
                <div class="left">Začátek: {{$test->start}}</div>
                <div class="right">Trvání: {{(strtotime($test->end) - strtotime($test->start))/60}} minut </div>


                @foreach($test->questions as $question)
                    <h3 class="left"> {{$question->name}}</h3>
                    <p class="right">(Max: {{$question->scoreMax}} bodů)</p>
                    <p> {{$question->task}}</p>
                    <p>
                        @foreach($question->answers as $answer)
                            {{$loop->iteration}} {{$answer->answer}}<br>
                        @endforeach
                    </p>
                @endforeach
            </div>
        </div>
    </div>

@endsection