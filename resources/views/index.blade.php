@extends('layouts.app')
@section('title')
    Testový portál FIT
@endsection


@section('content')
    <div id="welcome-text">Zde bude úvodní text</div>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('student') }}'">Přihlásit se jako student</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('asistent') }}'">Přihlásit se jako asistent</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('profesor') }}'">Přihlásit se jako Profesor</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('admin') }}'">Admin</button>
    @if(session('error'))
        <span class="help-block">
            <strong>{{ session('error') }}</strong>
        </span>
    @endif
@endsection