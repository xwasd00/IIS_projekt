@extends('layouts.app')

@section('content')

<div id="menu">
</div>
<div id="page-content">
    <h1 id="welcome-h1">Testový portál FIT</h1>
    <div id="welcome-text">Zde bude úvodní text</div>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('student') }}'">Přihlásit se jako student</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('asistant') }}'">Přihlásit se jako asistent</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('profesor') }}'">Přihlásit se jako Profesor</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='{{ route('admin') }}'">Admin</button>
    @if(session('error'))
        <span class="help-block">
            <strong>{{ session('error') }}</strong>
        </span>
    @endif
</div>
@endsection