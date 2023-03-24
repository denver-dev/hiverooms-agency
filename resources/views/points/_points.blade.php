@extends('layouts.app')
@include('component._sidebar')
@include('component._tab')
@include('component._heading')

<section class="points">
    <div class="dasboard__container">
        {{-- Sidebar Menu --}}
            @yield('sidebar')
       {{-- Main content --}}
       <div class="dashboard__sidebar--content"> 
            {{-- Tab selection --}}
                @yield('tab')
            <div class="dashboard__main--content">
                <div class="content-inner">
                    <h2 class="ttl1">Points</h2>
                    <div class="points__record">
                        <div class="points__record--main global-bg">
                            <div class="points__earn-points">
                                <dl>
                                    <dd>YOUR POINTS</dd>
                                    <dd><span>1,000</span> points</dd>
                                    <dd>2,500 earned since 2015</dd>
                                </dl>
                            </div>
                            <div class="points__discounts">
                                <h2 class="hdng">Turn points into Reward Discounts.</h2>
                                <div class="card-inner">
                                    <div class="card">
                                        <div class="card-upper">
                                            <h4>ENTIRE ORDER</h4>
                                            <h3>5%off</h3>
                                        </div>
                                        <div class="card-btm">
                                            <dl>
                                                <dd><a href="#" class="btn-link">Redeem</a></dd>
                                                <dd>With 200 points</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-upper">
                                            <h4>ENTIRE ORDER</h4>
                                            <h3>10%off</h3>
                                        </div>
                                        <div class="card-btm">
                                            <dl>
                                                <dd><a href="#" class="btn-link">Redeem</a></dd>
                                                <dd>With 200 points</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-upper">
                                            <h4>ENTIRE ORDER</h4>
                                            <h3>15%off</h3>
                                        </div>
                                        <div class="card-btm">
                                            <dl>
                                                <dd><a href="#" class="btn-link">Redeem</a></dd>
                                                <dd>With 200 points</dd>
                                            </dl>
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
</section>