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
                        <p> Add answer</p>
                        <form class="form-horizontal" method="POST" action="{{ route('profesor.addAnsDB', [$qst->id])}}">
                        {{ csrf_field() }}
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Odpověď</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="answer" value="{{ old('name')}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        </form>
                    <button class="btn btn-warning" onclick="window.location='{{ route('profesor.modifyqst', [$qst->id])}}'">Zpět</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
