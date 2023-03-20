@include('header')


<section class="dashboard">
        <div class="dasboard__container">
           <div class="dashboard__sidebar bg-yel">
                <div class="dashboard__user">
                    <i class="fa-solid fa-user"></i>
                    <h2 class="prof-name">Hello, [Agent Name]!</h2>
                </div>
                <nav class="dashboard__nav">
                    <ul>
                        <h2 class="cat"><i class="fa-solid fa-lightbulb"></i> SUMMARY</h2>
                        <li>
                            <a class="nav-link active" href="#">
                                <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Transactions
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Booking History
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Commission
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i> Points
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <h2 class="cat"><i class="fa-solid fa-plane"></i> CREATE A BOOKING</h2>
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
           <div class="dashboard__sidebar--content"> 
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
                <div class="dashboard__main--content">
                    <div class="content-inner">
                        <h2 class="ttl1">TOP DESTINATIONS</h2>

                        <div class="destinations">
                            <a href="#">
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



@include('footer')