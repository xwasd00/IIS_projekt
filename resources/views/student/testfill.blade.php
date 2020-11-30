@extends('layouts.app')

@section('title')
    @include('student.title')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="h3">{{$test->name}}</h3>
                    <div class="text-right">Ukončení: {{$test->end}}<span id="timer"></span></div>

                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        @foreach($questions as $question)
                        <div class="form-group">
                            <p class="h4 col-lg-8">{{$question->name}}</p><div class="col-lg-4 text-right">Max. bodů: {{$question->scoreMax}}</div>
                            <p class="col-lg-9">{{$question->task}}</p>
                            <div class="col-md-12">
                                <input id="questions[{{$question->id}}]" type="text" class="form-control" name="questions[{{$question->id}}]"
                                       value="{{isset($answers[$question->id]) ? $answers[$question->id] : '' }}">

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
                </div>
            </div>
        </div>
    </div>


@endsection
