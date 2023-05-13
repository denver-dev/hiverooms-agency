@section('user')

<div class="sidebar-left__user">
    <i class="fa-solid fa-user"></i>
    <h2 class="prof-name">Hello, {{ $user->firstName }} {{ $user->lastName }}!</h2>
</div>

@endsection