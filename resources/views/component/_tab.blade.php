
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
            <figure><img src="{{ asset('images/icons/main-logo.png') }}" alt="Bee"></figure>
        </div>
    </div>
    <form action="" class="dashboard__form">
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
                    <dd><button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button></dd>
                </div>
            </dl>
        </div>
    </form>
</div>
@endsection