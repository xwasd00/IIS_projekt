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
                        <p> Stránka pro vkládání otázek</p>
                        <div> {{--Vytvaření testů--}}
                            <form class="form-horizontal" method="POST" action="{{ route('profesor.addToDB', [$test->id])}}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Název</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Text otázky</label>
                                    <div class="col-md-6">
                                        <input id="task" type="text" class="form-control" name="task" value="{{ old('task')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Maximální počet bodů</label>
                                    <div class="col-md-6">
                                        <input id="scoreMax" type="number" class="form-control" name="scoreMax" value="{{ old('scoreMax')}}" min="1" max="100">
                                    </div>
                                </div>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
