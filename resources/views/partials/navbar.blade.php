@if(Auth::check() && Auth::user()->role == 'siswa')
    @include('partials.navbar-siswa')
@endif