<div id="menu">
    <div id="menu_logo">FITest</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='{{ route('asist_menu') }}'">Menu</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='{{ route('profile') }}'">Profil</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='{{ route('test_reg') }}'">Registrace testů</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='{{ route('my_tests') }}'">Moje testy</div>

    <div id="logout">
        <a href="{{ route('index') }}">Odhlásit se</a>
    </div>
</div>
<div id="page-content">

</div>