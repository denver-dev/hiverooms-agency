@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

<section class="booking-success">
    <div class="booking-success__container">
        {{-- Sidebar Menu --}}
            @yield('sidebar')
       {{-- Main content --}}
       <div class="main-content"> 
            {{-- Tab selection --}}
                <div class="tab--content">
                    <div class="tab--flex">
                       @yield('logo')
                    </div>
                </div>
            <div class="main-content--inner">
                <div class="content-inner">
                    {{-- Heading title --}}
                    <h2 class="success--heading">Booking Success!</h2>
                    <div class="booking-success__confirmed">
                        <div class="row-1">
                            <i class="fa fa-circle-check"></i>
                            <dl>
                                <dt>Awesome!</dt>
                                <dd>Your booking has been confirmed.<br>
                                    Check your email for details.</dd>
                            </dl>
                            <div class="btn-success">
                                <a href="{{route ('dashboard.dashboard')}}" class="btn-opa">OK</a>
                            </div>
                        </div>
                        <div class="row-2">
                            <dl>
                                <dt>You also earned points in this booking</dt>
                                <dd>It will take 24 hours to update please be patient.</dd>
                            </dl>
                        </div>
                        <div class="note">
                            <p>Please note that commission will be release every week and display on your dashboard</p>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </div>
</section>