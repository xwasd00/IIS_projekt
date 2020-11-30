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


                        @foreach($answers as $answer)
                                <p class="h4 col-lg-8">{{$answer->question->name}}</p><div class="col-lg-4 text-right">Max. bodů: {{$answer->question->scoreMax}}</div>
                                <p class="col-lg-9">{{$answer->question->task}}</p>
                                <div class="col-md-12">
                                           {{$answer->answer}} {{$answer->score}}
                                </div>
                            </div>
                        @endforeach

                                <button class="btn btn-primary">
                                    Zpět
                                </button>

                </div>
            </div>
        </div>
    </div>


@endsection
