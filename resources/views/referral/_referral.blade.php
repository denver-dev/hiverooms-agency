@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._logo')

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
                                        <form action="">
                                            <dl>
                                                <dd>
                                                    <input type="text" placeholder="Search.." name="search">
                                                    <button type="submit" class="submit"><i class="fa fa-search"></i></button>
                                                </dd>
                                                <dd>
                                                    <button type="submit" class="updt">Update</button>
                                                </dd>
                                            </dl>
                                            <div class="table-responsive">
                                                <div class="table-list">
                                                    <h3 class="ttl2">Direct referrals:</h3>
                                                    <ul>
                                                        <li><button id="add-user">Add User</button></li>
                                                    </ul>
                                                </div>
                                                <div class="table-list">
                                                    <h3 class="ttl2">Uplines:</h3>
                                                    <ul>
                                                        <li><button id="add-user">Add User</button></li>
                                                    </ul>
                                                </div>
                                                <div class="table-list">
                                                    <h3 class="ttl2">Downlines:</h3>
                                                    <ul>
                                                        <li><button id="add-user">Add User</button></li>
                                                    </ul>
                                                </div>
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
</section>