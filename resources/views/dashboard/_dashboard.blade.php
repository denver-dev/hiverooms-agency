@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')

<section class="dashboard">
        <div class="dasboard__container">
            {{-- Sidebar Menu --}}
                @yield('sidebar')
           {{-- Main content --}}
           <div class="dashboard__sidebar--content"> 
                {{-- Tab selection --}}
                    @yield('tab')
                <div class="dashboard__main--content">
                    <div class="content-inner">
                        <h2 class="ttl1">TOP DESTINATIONS</h2>
                        <div class="destinations">
                            <a href="{{ route('component._hotels') }}">
                                <figure><img src="{{ asset('images/bohol.png') }}" alt="Bohol - Jewel of the Philippines"></figure>
                            </a>
                            <a href="#">
                                <figure><img src="{{ asset('images/cebu.png') }}" alt="Cebu - Queen City of the South"></figure>
                            </a>
                            <a href="#">
                                <figure><img src="{{ asset('images/negros.png') }}" alt="Negros - Sugarbowl of the"></figure>
                            </a>
                            <a href="#">
                                <figure><img src="{{ asset('images/siquijor.png') }}" alt="Siquijor - The Healing Island"></figure>
                            </a>
                        </div>
                    </div>
               </div>
           </div>
        </div>
</section>