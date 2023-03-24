@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._search')


<section class="dashboard">
        <div class="dasboard__container">
            {{-- Sidebar Menu --}}
                @yield('sidebar')
           {{-- Main content --}}
           <div class="dashboard__sidebar--content"> 
                {{-- Tab selection --}}
                    @yield('tab')
                {{-- Search hotels --}}
                    @yield('search')
                <div class="dashboard__main--content">
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