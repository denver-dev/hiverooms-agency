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
                    <h2 class="ttl1">Search flights</h2>
                </form>
                <div class="main-content--inner">
                    <div class="content-inner">
                       TEST
                    </div>
                </div>
           </div>
        </div>
</section>