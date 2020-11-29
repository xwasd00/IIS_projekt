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
                        <p>Registrace žáků</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název testu</th>
                            <th>Jméno studenta</th>
                            </thead>
                            <tbody>

                            @foreach($instances as $instance)
                                @if($instance->test->end > date("Y-m-d H:i:s") && !$instance->approved)
                                    <tr>
                                        <td>{{$instance->test->name}} </td>
                                        <td>{{$instance->user->name}} </td>
                                        <td>
                                        <form class="right" action="{{url('asistent/reg')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" id="test_id" name="test_id" value="{{$instance->id}}">
                                            <button class="btn btn-primary" type="submit">Registrovat studenta</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
