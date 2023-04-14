@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')
@include('component._search')


<section class="search-results">
        <div class="search-results__container">
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
                {{-- Search hotels --}}
                <form action="" class="search-form">
                    <h2 class="ttl1">Search flights</h2>
                </form>
                <div class="main-content--inner">
                    <div class="content-inner">
                        <h1>Working...</h1>





                    </div>
                </div>
           </div>
        </div>
</section>

<script>

</script>