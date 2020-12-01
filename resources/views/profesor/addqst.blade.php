@extends('layouts.app')

@section('title')
    @include('profesor.title')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div> {{--Vytvaření testů--}}
                            <form class="form-horizontal" method="POST" action="{{ route('profesor.addToDB', [$test->id])}}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <h4>Otázky</h4>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Název</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Text otázky</label>
                                    <div class="col-md-6">
                                        <input id="task" type="text" class="form-control" name="task" value="{{ old('task')}}">
                                        @if ($errors->has('task'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('task') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('scoreMax') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Maximální počet bodů</label>
                                    <div class="col-md-6">
                                        <input id="scoreMax" type="number" class="form-control" name="scoreMax" value="{{ old('scoreMax')}}" min="1" max="100">
                                        @if ($errors->has('scoreMax'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('scoreMax') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <h4>Obrázek</h4>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="file" name="image" placeholder="Choose image" id="image">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <h4>Odpovědi</h4>

                                @if($counter == 3)
                                 <h5>Správná</h5>
                                <div class="form-group{{ $errors->has('answerR') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Odpověď</label>
                                    <div class="col-md-6">
                                        <input id="answer" type="text" class="form-control" name="answerR" value="{{ old('scoreMax')}}">
                                        @if ($errors->has('answerR'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('answerR') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <h5>Špatné</h5>
                                @endif
                                @for($i = 0; $i < $counter; $i++)
                                <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Odpověď č.{{$i+1}}</label>
                                    <div class="col-md-6">
                                        <input id="answer" type="text" class="form-control" name="answer[]" value="{{ old('scoreMax')}}">
                                        @if ($errors->has('answer'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('answer') }}</strong>
                                        </span>
                                         @endif
                                        @if($validity == 1)
                                            <select id="ansTrue" name="ansTrue[]">
                                                <option value=0>Špatná</option>
                                                <option value=1>Správná</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                @endfor

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Přidat
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>{{--Vkládání otázek k testům--}}
                            <button class="btn btn-warning" onclick="window.location='{{ route('profesor.show', [$test])}}'">
                                Zpět
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
