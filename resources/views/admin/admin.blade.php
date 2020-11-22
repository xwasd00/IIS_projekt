@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Privileges[admin][profesor][asistant]</th>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}} </td>
                                    <td>{{$user->email}} </td>
                                    <td>[{{$user->admin}}]
                                    [{{$user->profesor}}]
                                    [{{$user->asistant}}]</td>
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
