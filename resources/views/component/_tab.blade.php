
@section('tab')
<ul>
    <li><a href="{{route ('create-booking.create_booking')}}"><i class="fa-sharp fa-solid fa-building"></i>Stays</a></li>
    <li><a href="{{route ('flights.flights')}}"><i class="fa-solid fa-plane"></i>Flights</a></li>
    <li><a href="#"><i class="fa-solid fa-car"></i>Rent A Car</a></li>
    <li><a href="#"><i class="fa-solid fa-boxes-packing"></i>Tour Packages</a></li>
    <li><a href="#"><i class="fa-solid fa-anchor"></i>Shipping</a></li>
</ul>
@endsection