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
                            <th>Jméno</th>
                            <th>Email</th>
                            <th>Role</th>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}} </td>
                                    <td>{{$user->email}} </td>
                                    <td>@if($user->admin)
                                            Admin
                                        @elseif($user->profesor)
                                            Profesor
                                        @elseif($user->asistent)
                                            Asistent
                                        @else
                                            Student
                                        @endif</td>
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
