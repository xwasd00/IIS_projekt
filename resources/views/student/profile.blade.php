@extends('layouts.app')

@section('title')
    @include('student.title')
@endsection



@section('content')
    <div class="container">
        <div class="row jtify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="h3"> Profil</p>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Jméno: </td>
                                <td>@if($edit)
                                        <form class="form-horizontal" method="POST" action="">
                                            {{ csrf_field() }}
                                            <div class="col-lg-6"><input id="name" type="text" class="form-control" name="name"
                                                         value="{{$user->name}}"></div>

                                            <button type="submit" class="btn btn-primary">
                                                Uložit
                                            </button>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </form>
                                    @else
                                        {{$user->name}}
                                        <button class="btn btn-primary" onclick="window.location='{{ route('profile.edit') }}'">Upravit</button>
                                    @endif</td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td><button class="btn btn-primary" onclick="window.location='{{ route('password.reset', ['id' => $user->id]) }}'">Změnit heslo</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection