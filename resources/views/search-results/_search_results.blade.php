@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._search')


<section class="search-results">
        <div class="search-results__container">
            {{-- Sidebar Menu --}}
                @yield('sidebar')
           {{-- Main content --}}
           <div class="main-content"> 
                {{-- Tab selection --}}
                    @yield('tab')
                {{-- Search hotels --}}
                <form action="" class="search-form">
                    <h2 class="ttl1">Search results</h2>
                    <div class="c-field">
                        <dl>
                            <div class="date">
                                <dt><input type="text" id="destination-search" placeholder="Going to" class="" >
                                    <label for=""><i class="fa-solid fa-location-dot"></i></label>
                                </dt>
                            </div>
                        </dl>
                        <dl>
                            <div class="date">
                                <dt><input type="datetime-local" placeholder="Check in" class="form-control" >
                                    <label for=""><i class="fa-regular fa-calendar-minus"></i></label>
                                </dt>
                            </div>
                            <div class="date">
                                <dt><input type="datetime-local" placeholder="Check out" class="form-control" >
                                    <label for=""><i class="fa-regular fa-calendar-minus"></i></label>
                                </dt>
                            </div>
                        </dl>
                        <dl>
                            <div class="date">
                                <dt><input type="text" class="is-hidden">
                                    <button><i class="fa-solid fa-user"></i> Travellers</button>
                                </dt>
                            </div>
                        </dl>
                        <dl>
                            <div>
                                <dd>
                                    <a href="{{route ('search-results.search_results')}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    {{-- <button type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button> --}}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </form>
                <div class="main-content--inner">
                    <div class="content-inner">
                        <div class="search-results__rm-card">
                            <div class="search-results__heading">
                                <h2 class="ttl">Radisson Blue Cebu</h2>
                                <div class="stars">
                                    <?php
                                        for($i=0; $i<5; $i++){
                                            echo '<i class="fa-solid fa-star"></i>';
                                        }
                                    ?>  
                                </div>
                                <div class="location">
                                    <p><i class="fa-solid fa-location-dot "></i><span>Serging Osmena Boulevard, Corner Pope John Paul II Ave, Cebu City, 6000 Cebu<span></p>
                                </div>
                                <div class="phone">
                                    <p><a href="#"><i class="fa-solid fa-phone"></i><span>(032) 505 1700</span></a> </p>
                                </div>
                            </div>
                            <div class="search-results__rm-card--inner">
                                <div class="rm-card--content">
                                    <h2 class="hdng"><i class="fa-solid fa-user"></i>6 people are viewing this hotel</h2>
                                    <dl>
                                        <dt><span>Booking</span>.com</dt>
                                        <dd>P5,623</dd>
                                        <dd><a href="{{route ('search-confirmation.search_confirmation')}}" class="btn-link">View deal</a></dd>
                                        <dd><i class="fa-solid fa-check"></i>Free cancelation until 03/25/23</dd>
                                    </dl>
                                    <dl>
                                        <dt>Agoda</dt>
                                        <dd>P6,623</dd>
                                        <dd><a href="{{route ('search-confirmation.search_confirmation')}}" class="btn-link">View deal</a></dd>
                                        <dd><i class="fa-solid fa-check"></i>Free cancelation until 03/25/23</dd>
                                    </dl>
                                    <dl>
                                        <dt>Trip.com</dt>
                                        <dd>P7,623</dd>
                                        <dd><a href="{{route ('search-confirmation.search_confirmation')}}" class="btn-link">View deal</a></dd>
                                        <dd><i class="fa-solid fa-check"></i>Free cancelation until 03/25/23</dd>
                                    </dl>
                                </div>
                                <div class="rm-img">
                                    <img src="{{ asset('images/hotel-room/bohol-hotel.jpg') }}" alt="">
                                </div>

                            </div>

                        </div>


                    </div>
                </div>
           </div>
        </div>
</section>