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
                        <h3 class="h3 ">{{$instance->test->name}}</h3>
                        <div class="text-right">{{$instance->user->name}}</div>

                            @foreach($questions as $question)
                                <div>
                                    <p class="h4">{{$question->name}}<br>
                                    <p>{{$question->task}}</p>
                                    @if($instance->test->configuration != 3)
                                        <p>Správná odpověď: {{$templates[$question->id]->answer}}</p>
                                    @else
                                        <p>Správné odpovědi:
                                            @foreach($templates[$question->id] as $template)
                                                {{$template->answer}}
                                            @endforeach
                                        </p>
                                    @endif
                                    <p>Vaše Odpověď:
                                    @if(!empty($answers))
                                        @if($instance->test->configuration == 1)
                                            {{$answers[$question->id]}}
                                        @elseif($instance->test->configuration == 2)
                                            @foreach($question->answers as $answer)
                                                @if($answers[$question->id] == $answer->id)
                                                    {{$answer->answer}}
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($question->answers as $answer)
                                                @if(in_array($answer->id, explode(" ", $answers[$question->id])))
                                                    {{$answer->answer}}
                                                @endif
                                            @endforeach
                                        @endif
                                        </p>
                                    <p>
                                        <div class="col-lg-3">
                                            Skóre: {{$scores[$question->id]}}(Max:{{$question->scoreMax}})
                                        </div>
                                    @endif
                                    </p><br>
                                </div>
                            @endforeach
                                    <button class="btn btn-primary" onclick="window.location='{{ route('student.eval') }}'">
                                        Zpět
                                    </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
