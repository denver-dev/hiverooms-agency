@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._heading')

<section class="search-confirmation">
    <div class="search-confirmation__container">
        {{-- Sidebar Menu --}}
            @yield('sidebar')
       {{-- Main content --}}
       <div class="main-content"> 
            {{-- Tab selection --}}
                @yield('tab')
            <div class="main-content--inner">
                <div class="content-inner">
                    {{-- Heading title --}}
                    @yield('title')
                    <div class="search-confirmation__destinations">
                        {{-- Confirmation row --}}
                        <div class="search-confirmation__rm-card">
                            <div class="rm-img">
                                <a href="#" class="btn-link">
                                    <figure>
                                        <img src="{{ asset('images/hotel-room/bohol-hotel.jpg') }}" alt="">
                                        <i class="fa-solid fa-heart"></i>
                                    </figure>
                                </a>
                            </div>
                            <div class="rm-content">
                                <div class="rm-main-row">
                                    <div class="rm-main">
                                        <div class="rm-heading">
                                            <a href="#" class="btn-link">
                                                <h2 class="rm-title">Radisson Blue Cebu</h2>
                                                <div class="rm-star">
                                                    <?php
                                                        for($i=0; $i<5; $i++){
                                                            echo '<i class="fa-solid fa-star"></i>';
                                                        }
                                                    ?>  
                                                </div>
                                                <div class="rm-location">
                                                    <p><i class="fa-solid fa-location-dot "></i><span>Serging Osmena Boulevard, Corner Pope John Paul II Ave, Cebu City, 6000 Cebu<span></p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rm-description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                    </div>
                                    <div class="rm-refund">
                                        <a href="#" class="btn-link">Fully refundable</a>
                                    </div>
                                </div>
                                <div class="rm-bottom">
                                    <div class="rm-reviews">
                                        <p><span>8.2</span>/10 Very Good (57 reviews)</p>
                                    </div>
                                    <div>
                                        <p class="price"><span>₱</span>1,234.10</p>
                                        <a href="" class="btn-link">Check availability</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </div>
</section>