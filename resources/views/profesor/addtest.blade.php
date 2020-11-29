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
                <div class="card">
                    <div class="card-body">
                        <p> Profesor page fo adding Tests</p>
                        <div> {{--Vytvaření testů--}}
                            <form class="form-horizontal" method="POST" action="{{ route('profesor.add')}}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Název testu</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('configuration') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Konfigurace</label>
                                    <div class="col-md-6">
                                        <input id="configuration" type="text" class="form-control" name="configuration" value="{{ old('configuration')}}">
                                        @if ($errors->has('configuration'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('configuration') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Začátek testu</label>
                                    <div class="col-md-6">
                                        <input id="start" type="datetime-local" class="form-control" name="start" value="{{ old('start')}}">
                                        @if ($errors->has('start'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('start') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Konec testu</label>
                                    <div class="col-md-6">
                                        <input id="end" type="datetime-local" class="form-control" name="end" value="{{ old('end')}}">
                                        @if ($errors->has('end'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('end') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>{{--Vkládání otázek k testům--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
