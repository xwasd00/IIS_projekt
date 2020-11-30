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
                    <div class="text-right">Ukončení: {{$test->end}}</div>

                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        @foreach($questions as $question)
                        <div class="form-group">
                            <p class="h4 col-lg-8">{{$question->name}}</p><div class="col-lg-4 text-right">Max. bodů: {{$question->scoreMax}}</div>
                            <p class="col-lg-9">{{$question->task}}</p>
                            <div class="col-md-12">
                                @if($test->configuration == 1)
                                <input id="questions[{{$question->id}}]" type="text" class="form-control" name="questions[{{$question->id}}]"
                                       value="{{isset($answers[$question->id]) ? $answers[$question->id] : '' }}">
                                @elseif($test->configuration == 2)
                                    <select id="questions[{{$question->id}}]" name="questions[{{$question->id}}]">
                                        <option value="" disabled hidden @if(!$answers[$question->id]) selected @endif>Vyberte možnost</option>
                                        @foreach($question->answers as $answer)
                                        <option value={{$answer->id}} @if($answers[$question->id] == $answer->id) selected @endif>{{$answer->answer}}</option>
                                        @endforeach
                                    </select>

                                @else
                                    @foreach($question->answers as $answer)
                                        <input type="checkbox" id="questions[{{$question->id}}]" name="questions[{{$question->id}}][{{$answer->id}}]" value="{{$answer->id}}"
                                                @if(in_array($answer->id, explode(" ", $answers[$question->id])))
                                                checked
                                        @endif>
                                        <label for="questions[{{$question->id}}][{{$answer->id}}]">{{$answer->answer}}</label><br>
                                    @endforeach

                                @endif

                            </div>
                        </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="save" value="save" class="btn btn-primary">
                                    Uložit
                                </button>

                                <button type="submit" name="save" value="exit" class="btn btn-danger">
                                    Uložit a ukončit test
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
