@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

<section class="search-confirmation">
    <div class="search-confirmation__container">
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
                    {{-- Heading title --}}
                    <h2 class="hotel__heading">
                        Congratulations you have chosen the best rate!
                    </h2>
                    <div class="search-confirmation__destinations">
                        <div class="destinations--content">
                            {{-- Confirmation row --}}
                            <div class="search-confirmation__rm-card">
                                <div class="rm-img">
                                    <a href="#" class="btn-link">
                                        <figure>
                                            <img src="{{ $hotels['data']['images'][0] }}" alt="">
                                            <i class="fa-solid fa-heart"></i>
                                        </figure>
                                    </a>
                                </div>
                                <div class="rm-content">
                                    <div class="rm-main-row">
                                        <div class="rm-main">
                                            <div class="rm-heading">
                                                <a href="#" class="btn-link">
                                                    <h2 class="rm-title">{{ $hotels['data']['name'] }}</h2>
                                                    <div class="rm-star">
                                                        <?php
                                                        $star_rating = $hotels['data']['star_rating'];
                                                        for ($i = 0; $i < $star_rating; $i++) {
                                                            echo '<i class="fa-solid fa-star"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="rm-location">
                                                        <p><i class="fa-solid fa-location-dot "></i><span>{{ $hotels['data']['address'] }}<span>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rm-description">
                                                <p>
                                                    {{ $hotels['data']['description_struct'][0]['paragraphs'][0] }}
                                                    {{--  {{ $hotels['data']['description_struct'][1]['paragraphs'][0] }}  --}}
                                                    {{--  {{ $hotels['data']['description_struct'][1]['paragraphs'][1] }}  --}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-confirmation__ch-room-type">
                                <form action="">
                                    <div class="selection">
                                        <label for="cars"><i class="fa-solid fa-bed">&nbsp;</i>
                                            <strong>Choose your room</strong>
                                        </label>
                                        {{--  <select id="room_type" name="" form="">
                                            <option value="">Select room type</option>
                                            @if ($hotel_data['data']['hotels'] != [])
                                                @foreach ($hotel_data['data']['hotels'][0]['rates'] as $room_types)
                                                    <option value="{{ $room_types['book_hash'] }}">
                                                        {{ $room_types['room_name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>  --}}
                                    </div>
                                </form>
                            </div>
                            <div class="search-confirmation__room-type">
                                <div class="room-type-inner">
                                    @foreach ($hotel_data['data']['hotels'][0]['rates'] as $room_group)
                                        <div class="swiper-slide layout-grid">
                                            <div class="layout-grid-item" id="room_type_{{ $loop->index }}" style="cursor: pointer;" data-value="{{ $room_group['book_hash'] }}">
                                                <div class="gallery">
                                                    <a href="#">
                                                        <figure>
                                                            {{--  @if (!empty($room_group['images']) && isset($room_group['images'][0]))
                                                                <img src="{{ $room_group['images'][0] }}"
                                                                    alt="">
                                                            @else  --}}
                                                                <img src="{{ asset('images/hotel-room/bohol-hotel.jpg') }}"
                                                                    alt="">
                                                            {{--  @endif  --}}
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="rm-inner-content">
                                                    <div class="rm-type">
                                                        <h3>{{ $room_group['room_name'] }}</h3>
                                                    </div>
                                                    <div class="rm-amenities">
                                                        <dl>
                                                            <dd><i class="fa-regular fa-user"></i><span>2 adults</span>
                                                            </dd>
                                                            <dd><i class="fa fa-bed"></i><span>1 king bed or 2 single
                                                                    beds</span></dd>
                                                            <dd><i class="fa fa-light fa-utensils"></i><span>includes
                                                                    breakfast for 2 guest</span></dd>
                                                            <dd><i
                                                                    class="fa fa-ban-smoking"></i><span>Non-smoking</span>
                                                            </dd>
                                                            <dd><i class="fa fa-house-chimney-window"></i><span>Fixed
                                                                    window</span></dd>
                                                        </dl>
                                                        <dl>
                                                            <dd>
                                                                <i class="fa fa-circle-check"></i>
                                                                <span>
                                                                    Free cancellation before 00:00, April 03, 2023 GMT+8
                                                                    (hotel's local time)
                                                                </span>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="search-confirmation__rm-selected-date">
                                <dl>
                                    <dd><i class="fa fa-calendar-days" style="vertical-align: text-top;"></i> Date Tue,
                                        April 05 - Wed, Mar 1 <span>1 night</span></dd>
                                </dl>
                            </div>
                            <div class="search-confirmation__booking">
                                <dl>
                                    <dd><i class="fa fa-bookmark"></i> Book Now & Save: Save PHP 595.17 on this room
                                    </dd>
                                    <dd><i class="fa-solid fa-bell"></i> In high demand! Complete your booking soon.
                                    </dd>
                                </dl>
                            </div>
                            <div class="search-confirmation__form">
                                <h2 class="ttl">Guest Info</h2>
                                <p class="desc">Guest names must watch the valid ID which will be used at check-in.
                                </p>
                                <form action="#">
                                    <dl>
                                        <input type="text" id="fname" name="fname" placeholder="First Name">
                                        <input type="text" id="lname" name="lname" placeholder="Last Name">
                                        <input type="email" id="email" name="email" placeholder="Email">
                                        <input id="form-field-phone" type="tel" class="form-control" name="phone"
                                            required>
                                    </dl>
                                </form>
                                <div class="btn">
                                    @if ($hotel_data['data']['hotels'] != [])
                                        <a href="#" id="next_step_btn" class="btn-opa">Next Step: Final
                                            Confirmation <span class="arrow"><i
                                                    class="fa fa-chevron-right"></i></span></a>
                                    @else
                                        <a href="#" id="next_step_btn" class="btn-opa"
                                            style="pointer-events: none;">Next Step: Final Confirmation <span
                                                class="arrow"><i class="fa fa-chevron-right"></i></span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="destinations--prices">
                            <div class="row row-1">
                                <h2 class="ttl">Prices Details</h2>
                                <dl>
                                    <dt>1 room x 1 night</dt>
                                    <dd>PHP
                                        {{ number_format($hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['show_amount'] - ($hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['tax_data']['taxes'][0]['amount'] + $hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['tax_data']['taxes'][1]['amount'] + $hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['show_amount'] * 0.05), 2) }}
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Service Fee</dt>
                                    <dd>PHP
                                        {{ number_format($hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['tax_data']['taxes'][0]['amount'], 2) }}
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>Vat Tax</dt>
                                    <dd>PHP
                                        {{ number_format($hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['tax_data']['taxes'][1]['amount'], 2) }}
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>5% Commission</dt>
                                    <dd>PHP
                                        {{ number_format($hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['show_amount'] * 0.05, 2) }}
                                    </dd>
                                </dl>
                                <hr class="hr-line">
                                <div class="total">
                                    <p>Prepay Online</p>
                                    <p>PHP
                                        {{ number_format($hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['show_amount'] + $hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['show_amount'] * 0.05, 2) }}<span><i
                                                class="fa-regular fa-heart">&nbsp;</i>We Price
                                            Match</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // JavaScript code
        var nextStepBtn = document.getElementById('next_step_btn');
        document.querySelectorAll('[id^="room_type"]').forEach(function(element) {
            element.addEventListener('click', function() {
                var value = element.getAttribute('data-value');
                console.log(value);

                nextStepBtn.addEventListener('click', function() {
                    var selectedOption = value;

                    var hotelId = '{{ $hotel_id }}';
                    var checkIn = '{{ $check_in }}';
                    var checkOut = '{{ $check_out }}';
                    var total_amount = '{{ number_format($hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['show_amount'] + $hotel_data['data']['hotels'][0]['rates'][0]['payment_options']['payment_types'][0]['show_amount'] * 0.05, 2) }}';

                    var url =
                        "{{ route('final-confirmation.final_confirmation', [
                            'hotel_id' => ':hotel_id',
                            'book_hash' => ':book_hash',
                            'check_in' => ':check_in',
                            'check_out' => ':check_out',
                            'total_amount' => ':total_amount',
                        ]) }}";

                    url = url.replace(':hotel_id', hotelId)
                        .replace(':book_hash', selectedOption)
                        .replace(':check_in', checkIn)
                        .replace(':check_out', checkOut)
                        .replace(':total_amount', total_amount);

                    window.location.href = url;
                });
            })
        })
    </script>
</section>
