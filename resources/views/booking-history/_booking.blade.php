@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

<section class="booking_history">
    <div class="booking__container">
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
                    <h2 class="ttl1">Booking</h2>
                    <div class="booking_history__record">
                        <div class="booking_history__record--main global-bg">
                            <div class="booking_history__search">
                                <div class="ttl-w-search">
                                    <h2 class="hdng-title">Booking History</h2>
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
                            <table>
                                <tr>
                                    <th>Booking Ref ID #</th>
                                    <th>Date</th>
                                    <th>Event</th>
                                    <th>Tickets</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Cancel</th>
                                </tr>
                                <tr>
                                    <td>#1234</td>
                                    <td>03-24-2023</td>
                                    <td>Summer Madness</td>
                                    <td>Available 123</td>
                                    <td>100</td>
                                    <td class="status">Pending</td>
                                    <td><a href="#">Cancel Booking</a></td>
                                </tr>
                                <tr>
                                    <td>#1235</td>
                                    <td>03-24-2023</td>
                                    <td>Summer Madness</td>
                                    <td>Available 123</td>
                                    <td>100</td>
                                    <td class="status">Pending</td>
                                    <td><a href="#">Cancel Booking</a></td>
                                </tr>
                                <tr>
                                    <td>#1236</td>
                                    <td>03-24-2023</td>
                                    <td>Summer Madness</td>
                                    <td>Available 123</td>
                                    <td>100</td>
                                    <td class="status">Pending</td>
                                    <td><a href="#">Cancel Booking</a></td>
                                </tr>
                                <tr>
                                    <td>#1237</td>
                                    <td>03-24-2023</td>
                                    <td>Summer Madness</td>
                                    <td>Available 123</td>
                                    <td>100</td>
                                    <td class="status">Pending</td>
                                    <td><a href="#">Cancel Booking</a></td>
                                </tr>
                          </table>
                          <div class="booking_history__pagination">
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