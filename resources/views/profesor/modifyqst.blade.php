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
                        <div>
                            <h2>{{$qst->name}}</h2>
                            <h3>Informace</h3>
                        </div>
                        <div> {{--Úprava testů--}}
                            <form class="form-horizontal" method="POST" action="">
                                <table class="table table-hover">
                                    {{ csrf_field() }}
                                    <thead>
                                        <th></th>
                                        <th>Aktuální</th>
                                        <th>Nové</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Název otázky</td>
                                            <td>{{$qst->name}}</td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Znění otázky</td>
                                            <td>{{$qst->task}}</td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="task" value="{{ old('name')}}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Moximální počet bodů</td>
                                            <td>{{$qst->scoreMax}}</td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <input id="name" type="number" class="form-control" name="scoreMax" value="{{ old('name')}}" min="1" max="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div>{{--Vkládání otázek k testům--}}
                        <h3>Odpovědi</h3>
                        <table class="table table-hover">
                            <thead>
                                <th>Číslo odpovědi</th>
                                <th>Odpověď</th>
                                <th>
                                    <button class="btn btn-primary" onclick="window.location='{{ route('profesor.addans', [$qst])}}'">Přidat odpověď</button>
                                </th>
                            </thead>
                            <tbody>
                                @foreach($qst->answers as $answer)
                                    <tr>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$answer->answer}}</td>
                                            <td>
                                                <form action="{{ route('question.deleteA', [$answer->id])}}" method="POST">
                                                    {{method_field('DELETE')}}
                                                    {{ csrf_field() }}
                                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                                </form>
                                            </td>
                                        </tr>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <button class="btn btn-warning" onclick="window.location='{{ route('profesor.show', [$qst->test_id])}}'">Zpět</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
