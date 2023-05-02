@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

<section class="transactions">
    <div class="transactions__container">
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
                    <h2 class="ttl1">Transactions</h2>
                    <div class="transactions__record">
                        <div class="transactions__record--main global-bg">
                            <div class="transactions__search">
                                <div class="ttl-w-search">
                                    <h2 class="hdng-title">Transaction History</h2>
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
                                        <th>Transaction ID #</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <td>01234567890</td>
                                        <td>03-24-2023</td>
                                        <td>Charlie</td>
                                        <td>hiverooms@gmail.com</td>
                                        <td>$100</td>
                                        <td class="status">Completed</td>
                                    </tr>
                                    <tr>
                                        <td>01234567890</td>
                                        <td>03-24-2023</td>
                                        <td>Charlie</td>
                                        <td>hiverooms@gmail.com</td>
                                        <td>$100</td>
                                        <td class="status">Completed</td>
                                    </tr>
                                    <tr>
                                        <td>01234567890</td>
                                        <td>03-24-2023</td>
                                        <td>Charlie</td>
                                        <td>hiverooms@gmail.com</td>
                                        <td>$100</td>
                                        <td class="status">Completed</td>
                                    </tr>
                                    <tr>
                                        <td>01234567890</td>
                                        <td>03-24-2023</td>
                                        <td>Charlie</td>
                                        <td>hiverooms@gmail.com</td>
                                        <td>$100</td>
                                        <td class="status">Completed</td>
                                    </tr>
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