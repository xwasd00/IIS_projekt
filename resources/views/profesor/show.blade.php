@extends('layouts.app')

@section('title')
    @include('profesor.title')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-hover">
                    <tr>
                        <td>
                            <h3 class="modal-title">{{$test->name}}</h3>
                            <div class="left">Začátek: {{$test->start}}</div>
                            <div class="right">Trvání: {{(strtotime($test->end) - strtotime($test->start))/60}} minut </div>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="window.location='{{ route('profesor.addqst', [$test->id]) }}'">Přidat otázku</button>
                        </td>
                    </tr>
                </table>
                <table class="table table-hover">
                    <thead>
                        <th>Otázka</th>
                        <th>Maximum bodů</th>
                        <th>Znění</th>
                        <th>Správná odpověď</th>
                    </thead>
                    <tbody>
                        @foreach($test->questions as $question)
                        <tr>
                            <td class="left"> {{$question->name}}</td>
                            <td class="right">(Max: {{$question->scoreMax}} bodů)</td>
                            <td> {{$question->task}}</td>
                            <td>
                                @foreach($question->answers as $answer)
                                    {{$loop->iteration}} {{$answer->answer}}<br>
                                @endforeach
                            </td>
                            <td>
                                <button class="btn btn-warning" onclick="window.location='{{ route('profesor.modifyqst', [$question->id])}}'">Upravit otázku</button>
                            </td>
                            <td>
                                <form action="{{ route('question.deleteQ', [$question->id])}}" method="POST">
                                    {{method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection