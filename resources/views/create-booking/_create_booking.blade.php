@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._search')



<section class="creat-booking">
        <div class="creat-booking__container">
            {{-- Sidebar Menu --}}
                @yield('sidebar')
           {{-- Main content --}}
           <div class="main-content"> 
                {{-- Tab selection --}}
                    @yield('tab')
                {{-- Search hotels --}}
                <form action="" class="search-form">
                    <h2 class="ttl1">Search hotels</h2>
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
                        <h2 class="ttl1 txt-center">TOP DESTINATIONS</h2>
                        <div class="destinations">
                            <a href="{{ route('hotels.hotels') }}">
                                <figure><img src="{{ asset('images/bohol.png') }}" alt="Bohol - Jewel of the Philippines"></figure>
                            </a>
                            <a href="{{ route('hotels.hotels') }}">
                                <figure><img src="{{ asset('images/cebu.png') }}" alt="Cebu - Queen City of the South"></figure>
                            </a>
                            <a href="{{ route('hotels.hotels') }}">
                                <figure><img src="{{ asset('images/negros.png') }}" alt="Negros - Sugarbowl of the"></figure>
                            </a>
                            <a href="{{ route('hotels.hotels') }}">
                                <figure><img src="{{ asset('images/siquijor.png') }}" alt="Siquijor - The Healing Island"></figure>
                            </a>
                        </div>
                    </div>
               </div>
           </div>
        </div>
</section>