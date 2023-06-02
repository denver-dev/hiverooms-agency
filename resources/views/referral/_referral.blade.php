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
                                                        <div>
                                                            <form method="POST"
                                                                action="{{ route('referral.addingReferral') }}">
                                                                @csrf
                                                                <div class="container">
                                                                    <label for="referralCode"><b>Referral Code</b></label>
                                                                    <input type="text" placeholder="Enter Referral code"
                                                                        name="referralCode" id="referralCode" required
                                                                        autofocus>
                                                                    @error('referralCode')
                                                                        <span role="alert">{{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="btn1">
                                                                    <button type="submit" class="btn-log">Add
                                                                        Referral</button>
                                                                </div>
                                                            </form>

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
                                            <th>Amount</th>
                                            <th>% Commission</th>
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
                                                <td>₱ {{ number_format($ref->price) }}</td>
                                                <td>
                                                    @if ($ref->level === 1)
                                                        20%
                                                    @elseif ($ref->level === 2)
                                                        5%
                                                    @elseif ($ref->level === 3)
                                                        3%
                                                    @elseif ($ref->level === 4)
                                                        2%
                                                    @else
                                                        1%
                                                    @endif
                                                </td>
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
