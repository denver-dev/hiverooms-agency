@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

@section('content')
    <section class="referral">
        <div class="referral__container">
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
                        <h2 class="ttl1">Referral Program</h2>
                        <div class="global-bg">
                            <div class="referral__program">
                                <!-- Trigger/Open The Modal -->
                                <button id="myBtn" class="btn">Add Referral</button>

                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                                    <!-- Modal content -->
                                    <div class="referral__modal-content">
                                        <span class="close">x</span>
                                        <h3 class="ttl">Referral List</h3>
                                        <div class="referral__form">
                                            <div class="main-content--inner">
                                                <div class="content-inner">
                                                    <h2 class="ttl1">Direct Referrals</h2>
                                                    <div class="transactions__record">
                                                        <div class="transactions__record--main global-bg">
                                                            <div class="transactions__search">
                                                                <div class="ttl-w-search">
                                                                    <h2 class="hdng-title">Direct Referrals</h2>
                                                                    <div class="d-flex">
                                                                        <div class="search-inner">
                                                                            <form active="#">
                                                                                <div class="search-field">
                                                                                    <input type="text"
                                                                                        placeholder="Search content here...">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="transactions__responsive">
                                                                <table>
                                                                    <tr>
                                                                        <th>Referral Name</th>
                                                                        <th>Package Name</th>
                                                                        <th>Phone Number</th>
                                                                        <th>Address</th>
                                                                        <th>Email</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    @foreach ($refers as $refer)
                                                                        <tr>
                                                                            <td>{{ $refer->firstName }}
                                                                                {{ $refer->lastName }}</td>
                                                                            <td>{{ $refer->package_name }}</td>
                                                                            <td>{{ $refer->phone }}</td>
                                                                            <td>{{ $refer->address }}</td>
                                                                            <td>{{ $refer->email }}</td>
                                                                            <td><a href="{{ route('referral.addReferral', $refer->userId) }}"
                                                                                    id="myBtn" class="btn">Add
                                                                                    Referral</a></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content--inner">
                    <div class="content-inner">
                        <h2 class="ttl1">Direct Referrals</h2>
                        <div class="transactions__record">
                            <div class="transactions__record--main global-bg">
                                <div class="transactions__search">
                                    <div class="ttl-w-search">
                                        <h2 class="hdng-title">Direct Referrals</h2>
                                        <div class="d-flex">
                                            <div class="search-inner">
                                                <form active="#">
                                                    <div class="search-field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="add-button">
                                                <a href="#" class="btn-1">Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="transactions__responsive">
                                    <table>
                                        <tr>
                                            <th>Package Name</th>
                                            <th>Price</th>
                                            <th>Points</th>
                                            <th>Commision</th>
                                            <th>Referral Name</th>
                                            <th>Upline Level</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($referred as $ref)
                                            <tr>
                                                <td>
                                                    @if ($ref->package_id === 1)
                                                        Package A
                                                    @else
                                                        Package B
                                                    @endif
                                                </td>
                                                <td>{{ $ref->price }}</td>
                                                <td>{{ $ref->points }}</td>
                                                <td>{{ $ref->commission }}</td>
                                                <td>{{ $ref->firstName }} {{ $ref->lastName }}</td>
                                                <td>{{ $ref->level }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="transactions__pagination">
                                    <div class="entries">
                                        <p>Showing 4 to 10 of 13 entries</p>
                                    </div>
                                    <div class="pagination-number">
                                        <a href="#"><i class="fa-solid fa-arrow-left"></i></a>
                                        <a href="#" class="numb">1</a>
                                        <a class="active numb" href="#">2</a>
                                        <a href="#" class="numb">3</a>
                                        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
