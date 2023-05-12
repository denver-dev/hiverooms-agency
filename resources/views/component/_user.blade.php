@section('user')

<div class="sidebar-left__user">
    <i class="fa-solid fa-user"></i>
    <h2 class="prof-name">Hello, {{ $user->name }}!</h2>
</div>

@endsection