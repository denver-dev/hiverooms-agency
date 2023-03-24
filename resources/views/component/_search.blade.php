

@section('search')
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
@endsection