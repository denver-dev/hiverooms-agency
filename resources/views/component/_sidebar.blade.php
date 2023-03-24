@section('sidebar')
<div class="dashboard__sidebar bg-yel">
    <div class="dashboard__user">
        <i class="fa-solid fa-user"></i>
        <h2 class="prof-name">Hello, [Agent Name]!</h2>
    </div>
    {{-- Menus Sidebar --}}
    <nav class="dashboard__nav">
        <ul>
            <h2 class="cat"><i class="fa-solid fa-lightbulb"></i> SUMMARY</h2>
            <li>
                <a class="nav-link active" href="{{ route('dashboard.dashboard') }}">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Dashboard
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('profile.profile') }}">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Profile
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route ('transactions.transactions')}}">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Transactions
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('booking-history.booking') }}">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Booking History
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('commission.commission') }}">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Commission
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('points.points') }}">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Points
                </a>
            </li>
        </ul>
        <ul>
            <h2 class="cat"><i class="fa-solid fa-plane"></i> <a href="{{ route('create-booking.create_booking') }}">CREATE A BOOKING</a></h2>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Stays
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Flights
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Tour Packages
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Rent a car
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Shipping
                </a>
            </li>
        </ul>
        <ul>
            <h2 class="cat"><i class="fa-solid fa-user-tie"></i> HELP</h2>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> How to earn points
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> How to use points
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Support
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Contact us
                </a>
            </li>
        </ul>
    </nav>
</div>
@endsection