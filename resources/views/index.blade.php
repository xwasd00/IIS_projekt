@extends('layouts.app')
@section('title')
    Testový portál FIT
@endsection


@section('content')
    <button class="btn btn-primary" onclick="window.location='{{ route('student') }}'">Přihlásit se jako student</button>
    <button class="btn btn-primary" onclick="window.location='{{ route('asistent') }}'">Přihlásit se jako asistent</button>
    <button class="btn btn-primary" onclick="window.location='{{ route('profesor') }}'">Přihlásit se jako Profesor</button>
    <button class="btn btn-primary" onclick="window.location='{{ route('admin') }}'">Admin</button>
    @if(session('error'))
        <span class="help-block">
            <strong>{{ session('error') }}</strong>
        </span>
    @endif
@endsection