
@section('tab')
<div class="tab--content">
    <div class="tab--flex">
        <ul>
            <li><a href="#"><i class="fa-sharp fa-solid fa-building"></i>Stays</a></li>
            <li><a href="#"><i class="fa-solid fa-plane"></i>Flights</a></li>
            <li><a href="#"><i class="fa-solid fa-car"></i>Rent A Car</a></li>
            <li><a href="#"><i class="fa-solid fa-boxes-packing"></i>Tour Packages</a></li>
            <li><a href="#"><i class="fa-solid fa-anchor"></i>Shipping</a></li>
        </ul>
        <div class="dashboard__logo">
            <a href="#">
                <figure><img src="{{ asset('images/icons/main-logo.png') }}" alt="Bee"></figure>
             </a>
        </div>
    </div>
</div>
@endsection