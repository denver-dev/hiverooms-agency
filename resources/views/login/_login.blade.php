@extends('layouts.app')


@section('content')

<section class="login">
    <div class="login__container">
        <h2 class="login__heading"><span>Hive</span>Rooms</h2>
        <h3 class="login__sub-heading">- Travel Agent Login -</h3>
        <div class="login__bee">
            <figure><img src="{{ asset('images/icons/icon-bee.png') }}" alt="Bee"></figure>
        </div>
        <form action="{{ route('login.loginUser') }}" method="POST" id="loginForm">
            @csrf
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span role="alert">{{ $message }}</span>
                @enderror

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                @error('password')
                    <span role="alert">{{ $message }}</span>
                @enderror

                <div class="btn1">
                    <button type="submit" class="btn-log">Login</button>
                    {{-- <button type="submit" class="btn-mem">Become a member</button> --}}
                    <a href="{{route ('register.register')}}">Become a member</a>
                </div>
                <label class="chckbox">
                    <input type="checkbox" checked="checked" name="remember"> Accept data privacy, terms & conditions,
                    etc.
                </label>
            </div>

            <div class="btn2">
                <span class="no-acc"><a href="#">Don't have account?</a></span>
                <span class="forgot"><a href="#">Don't have account?</a></span>
            </div>
        </form>
    </div>
</section>
@endsection
