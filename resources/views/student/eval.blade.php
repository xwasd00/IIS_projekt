@extends('layouts.app')

@section('title')
    @include('student.title')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>Hodnocení testů</p>
                        <table class="table table-hover">
                            <thead>
                            <th>Název</th>
                            <th>Hodnocení</th>
                            </thead>
                            <tbody>

                            @foreach($tests as $test)
                                @if($test->test->end < date("Y-m-d H:i:s", time()))
                                    <tr>
                                        <td>{{$test->test->name}} </td>
                                        <td>
                                        @if($test->evaluated)
                                            {{$test->score}}
                                                <button class="btn btn-primary" onclick="window.location='{{url('student/showresult', ['id' => $test->id])}}'">
                                                    Detail
                                                </button>
                                        @else
                                                <span>Nezadáno</span>
                                        @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection