@extends('layouts.app')

@section('title')
    @include('admin.title')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary" onclick="window.location='{{ route('register') }}'">Přidat</button>
                        <table class="table table-hover">
                            <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Privileges [admin][profesor][asistant]</th>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}} </td>
                                    <td>{{$user->email}} </td>
                                    <td>[{{$user->admin}}]
                                    [{{$user->profesor}}]
                                    [{{$user->asistent}}]</td>
                                    <td>
                                        @if(!$user->admin)
                                        <form action="{{url('user/delete', [$user->id])}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
