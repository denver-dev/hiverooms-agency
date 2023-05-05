@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

<section class="commission">
    <div class="dasboard__container">
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
                    <h2 class="ttl1">Commission</h2>
                    <div class="commission__record">
                        <div class="commission__record--main global-bg">
                            <div class="commission__search">
                                <div class="ttl-w-search">
                                    <h2 class="hdng-title">Sales Commission History</h2>
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
                            <div class="commission__table-responsive">
                                <table class="table-1">
                                    <tr>
                                        <th>Commission Percentage</th>
                                        <th>Total Sales</th>
                                        <th>Total Commission Paid</th>
                                    </tr>
                                    <tr>
                                        <td>10%</td>
                                        <td class="bold">Php 600,000.00</td>
                                        <td class="bold">Php 1,000,000.00</td>
                                    </tr>
                                </table>
                                <table class="table-2">
                                    <tr>
                                        <th>Sales Person</th>
                                        <th>Total Sales Amount</th>
                                        <th>Commission</th>
                                    </tr>
                                    <tr>
                                        <td>Person 1</td>
                                        <td>Php 66,000.00</td>
                                        <td>Php 32,000,000.00</td>
                                    </tr>
                                    <tr>
                                        <td>Person 2</td>
                                        <td>Php 66,000.00</td>
                                        <td>Php 32,000,000.00</td>
                                    </tr>
                                    <tr>
                                        <td>Person 3</td>
                                        <td>Php 66,000.00</td>
                                        <td>Php 32,000,000.00</td>
                                    </tr>
                                </table>
                            </div>
                          <div class="commission__pagination">
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