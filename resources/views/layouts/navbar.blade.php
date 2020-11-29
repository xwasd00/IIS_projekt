@guest
@else
    @if(auth()->user()->admin)

        @include('admin.navbar')

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Profesor menu<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @include('profesor.navbar')
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Asistent menu<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @include('asistent.navbar')
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Student menu<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @include('student.navbar')
            </ul>
        </li>

        <li class="navbar-btn"><a href="{{route('student.profile')}}">Profil</a></li>


    @elseif(auth()->user()->profesor)

        @include('profesor.navbar')

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Asitent menu<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @include('asistent.navbar')
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Student menu<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @include('student.navbar')
            </ul>
        </li>

        <li class="navbar-btn"><a href="{{route('student.profile')}}">Profil</a></li>


    @elseif(auth()->user()->asistent)

        @include('asistent.navbar')

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Student menu<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @include('student.navbar')
            </ul>
        </li>

        <li class="navbar-btn"><a href="{{route('student.profile')}}">Profil</a></li>


    @else

        @include('student.navbar')


    @endif
@endguest