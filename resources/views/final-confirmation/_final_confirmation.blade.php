@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

<section class="final-confirmation">
    <div class="final-confirmation__container">
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
                    {{-- Heading title --}}
                    <h2 class="hotel__heading">Final Confirmation</h2>
                    <div class="final-confirmation__table">
                        <div class="final-confirmation__table-1">
                            <h2 class="ttl"><i class="fa fa-money-bill"></i> Billing Details</h2>
                            <table>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Country</th>
                                    <th>State</th>
                                </tr>
                                <tr>
                                    <td>Abra</td>
                                    <td>Test</td>
                                    <td>Talisay Muhon Cebu City</td>
                                    <td>Cebu City</td>
                                    <td>6000</td>
                                    <td>Philippines</td>
                                    <td>Cebu</td>
                                </tr>
                            </table>
                        </div>
                        <div class="final-confirmation__table-2">
                            <h2 class="ttl"><i class="fa-solid fa-hands-holding"></i> Reservation Details</h2>
                            <table>
                                <tr>
                                    <th>Room Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Night</th>
                                    <th>Rooms</th>
                                    <th>Occupancy</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <td>Junior Suite</td>
                                    <td>13/04/2023</td>
                                    <td>13/05/2023</td>
                                    <td>7</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>PHP 784</td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="sub-total">Subtotal:</td>
                                    <td class="total">PHP 784</td>
                                </tr>
                            </table>
                        </div>
                        <div class="final-confirmation__table-3">
                            <h2 class="ttl"><i class="fa-regular fa-credit-card"></i> Payment Details</h2>
                            <form action="">
                                <dl>
                                    <label for="" class="details">Payment Type:</label>
                                    <select name="payment" id="payment" form="">
                                        <option value="prepayment Required">Prepayment Required</option>
                                        <option value="paypal">Paypal</option>
                                        <option value="gcash">Gcash</option>
                                        <option value="maya">Maya</option>
                                    </select>
                                </dl>
                                <dl>
                                    <label for="" class="details">Payment Method:</label>
                                    <input type="radio" id="full-price" name="method" value="">
                                    <label for="full-price">Full Price</label>
                                    <input type="radio" id="pre-payment" name="method" value="">
                                    <label for="pre-payment">Pre-Payment (10%)</label>
                                </dl>

                            </form>
                        </div>
                        <div class="btn">
                            <a href="{{route ('booking-success.booking_success')}}" class="btn-opa">Submit Booking <span class="arrow"><i class="fa fa-chevron-right"></i></span></a>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </div>
</section>