@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')

@section('content')
    <section class="dashboard">
        <div class="dasboard__container">
            {{-- Sidebar Menu --}}
            @yield('sidebar')
            {{-- Main content --}}
            <div class="main-content">
                <div class="dashboard__main--content">
                    <div class="dashboard__logo">
                        <a href="#">
                            <figure class="hive-logo">
                                <img src="{{ asset('images/icons/main-logo.png') }}" alt="Bee">
                            </figure>
                        </a>
                        <figure class="dashboard-bee">
                            <img src="{{ asset('images/icons/icon-bee-dashboard.png') }}" alt="Bee">
                        </figure>
                    </div>
                    <div class="dashboard__greetings">
                        <h2 class="hdng">Welcome Agent! <span>Today is May 02, 2023</span></h2>
                        <p class="sub-hdng">
                            How's your day?
                            <span>
                                Beeyah is here to help.
                            </span>
                        </p>
                    </div>
                    <div class="dashboard__summary">
                        <div class="summary-inner">
                            <div class="commissions">
                                <h2 class="hdng">Here's the summary of your earnings.</h2>
                                <div class="earnings">
                                    <p class="price"><span>PHP {{ $user->commission }}</span> Commission</p>
                                    <p class="price"><span>PHP {{ number_format($user->commission * 0.075, 2) }}</span> Markup Commission</p>
                                    <p class="price"><span>{{ $user->points }}</span> Points</p>
                                    <i>1 point is equivalent to 1 peso (PHP)</i>
                                </div>
                            </div>
                            <div class="btns">
                                <p><a href="#" class="btn-link">Cashout</a></p>
                                <p><a href="{{ route('create-booking.create_booking') }}" class="btn-link">Create a
                                        Booking</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
