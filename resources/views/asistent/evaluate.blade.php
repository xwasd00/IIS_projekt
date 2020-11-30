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

                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}

                            @foreach($questions as $question)
                                <div class="form-group">
                                    <p class="h4">{{$question->name}}<br>
                                    <p>{{$question->task}}</p>
                                    @if(!empty($answers))
                                    <p>{{$answers[$question->id]}}</p>
                                    <div class="col-lg-3">
                                        <input id="scores[{{$question->id}}]" type="number" class="form-control" name="scores[{{$question->id}}]" min="0" max="{{$question->scoreMax}}"
                                               value="{{$scores[$question->id]}}">(Max:{{$question->scoreMax}})
                                    </div>
                                    @endif
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
    </div>
@endsection
