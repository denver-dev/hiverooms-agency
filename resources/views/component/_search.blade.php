

@section('search')
<form action="{{ route('hotels.hotels') }}" method="GET" class="search-form">
    <h2 class="ttl1">Search hotels</h2>
    <div class="c-field">
        <dl>
            <div class="date">
                <dt><input type="text" id="destination-search" placeholder="Going to" class="" name="going_to">
                    <label for=""><i class="fa-solid fa-location-dot"></i></label>
                </dt>
            </div>
        </dl>
        <dl>
            <div class="date">
                <dt><input type="datetime-local" placeholder="Check in" class="form-control" name="check_in" value="{{ $today }}">
                    <label for=""><i class="fa-regular fa-calendar-minus"></i></label>
                </dt>
            </div>
            <div class="date">
                <dt><input type="datetime-local" placeholder="Check out" class="form-control" name="check_out" value="{{ $nextDay }}">
                    <label for=""><i class="fa-regular fa-calendar-minus"></i></label>
                </dt>
            </div>
        </dl>
        <dl>
            {{-- <div class="date">
                <dt><input type="text" class="is-hidden">
                    <button><i class="fa-solid fa-user"></i> Travellers</button>
                </dt>
            </div> --}}
            <div class="date">
                <dt>

                    <button type="button" class="btn1" onclick="toggleMenu()">
                        <input id="destination-search" placeholder="1 room for 2 guests" class="" disabled>
                    </button>
                    <label for=""><i class="fa-solid fa-user"></i></label>
                </dt>
                <dl class="travel-wrapper" id="subPopup">
                    <dt>1 room</dt>
                    <div class="responsive-travel">
                        <dd class="adults">
                            <div class="ttl">
                                <h2>Adults</h2>
                            </div>
                            <div class="select-numb">
                                <button id="minus">−</button>
                                <input type="number" value="1" id="input"/>
                                <button id="plus">+</button>
                            </div>
                        </dd>
                        <dd class="children">
                            <div class="ttl">
                                <h2>Children</h2>
                            </div>
                            <div class="btn">
                                <button>Add a child</button>
                            </div>
                        </dd>
                    </div>
                    <div class="responsive-buttons">
                        <div class="ttl">
                            <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add a room</a>
                        </div>
                        <div class="done">
                            <button>Done</button>
                        </div>
                    </div>
                </dl>
            </div>
        </dl>

        <dl>
            <div>
                <dd>
                    {{--  <a href="{{route ('search-results.search_results')}}"><i class="fa-solid fa-magnifying-glass"></i></a>  --}}
                    <button type="submit" class="btn2"><i class="fa-solid fa-magnifying-glass"></i></button>
                </dd>
            </div>
        </dl>
    </div>
</form>


<script>
    const minusButton = document.getElementById('minus');
    const plusButton = document.getElementById('plus');
    const inputField = document.getElementById('input');

    minusButton.addEventListener('click', event => {
    event.preventDefault();
    const currentValue = Number(inputField.value) || 0;
    inputField.value = currentValue - 1;
    });

    plusButton.addEventListener('click', event => {
    event.preventDefault();
    const currentValue = Number(inputField.value) || 0;
    inputField.value = currentValue + 1;
    });
</script>

<script>
    {{--  Travellers button  --}}
    let popup = document.getElementById("subPopup");
    function toggleMenu(){
            popup.classList.toggle("open-menu");
    }
</script>
@endsection
