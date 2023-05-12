@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

<section class="profile">
    <div class="profile__container">
        {{-- Sidebar Menu --}}
        @yield('sidebar')
        {{-- Main content --}}
        <div class="main-content">
            {{-- Tab selection --}}
            <div class="tab--content">
                <div class="tab--flex">
                    @yield('tab')
                    @yield('logo')
                </div>
            </div>
            <div class="main-content--inner">
                <div class="content-inner">
                    <h2 class="ttl1">Profile</h2>
                    <div class="profile__form global-bg">
                        <h2 class="hdng-title">Profile Information</h2>
                        <div class="form-responsive">
                            <form action="">
                                <dl>
                                    <dt><label for="fname">First name</label></dt>
                                    <dd>:</dd>
                                    <dd><label for="">{{ $user->firstName }}</label></dd>
                                </dl>
                                <dl>
                                    <dt><label for="lname">Last name</label></dt>
                                    <dd>:</dd>
                                    <dd><label for="">{{ $user->lastName }}</label></dd>
                                </dl>
                                <dl>
                                    <dt><label for="email">Email address</label></dt>
                                    <dd>:</dd>
                                    <dd><label for="">{{ $user->email }}</label></dd>
                                </dl>
                                <dl>
                                    <dt><label for="number">Phone number</label></dt>
                                    <dd>:</dd>
                                    <dd><label for="">{{ $user->phone }}</label></dd>
                                </dl>
                                <dl>
                                    <dt><label for="number">Date of birth</label></dt>
                                    <dd>:</dd>
                                    <dd><label for="">{{ $user->birthdate }}</label></dd>
                                </dl>
                                <dl>
                                    <dt><label for="address">Address</label></dt>
                                    <dd>:</dd>
                                    <dd><label for="">{{ $user->address }}</label></dd>
                                </dl>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
