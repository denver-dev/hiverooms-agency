@extends('layouts.app')



@section('content')
<section class="register">
    <div class="register__container">
        <div class="register__bee">
            <figure><img src="{{ asset('images/icons/icon-bee.png') }}" alt="Bee"></figure>
        </div>
        <h2 class="register__heading"><span>Hive</span>Rooms</h2>
        <h3 class="register__sub-heading">Become a member</h3>
        <form action="" method="POST" id="registerForm">
            @csrf
            <div class="container">
                <div class="responsive-between">
                    <div class="register__responsive-input">
                        <dl>
                            <dd>
                                <label for="fname"><b>First Name</b></label>
                                <input type="text" placeholder="Enter First Name" name="fname" id="fname" value="" required autofocus>
                                @error('fname')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="lname"><b>Last Name</b></label>
                                <input type="text" placeholder="Enter Last Name" name="lname" id="lname" value="" required autofocus>
                                @error('lname')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="email"><b>Email Address</b></label>
                                <input type="email" placeholder="Enter Email" name="email" id="email" value="" required autofocus>
                                @error('email')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                                @error('password')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="confirm-psw"><b>Confirm Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                                @error('password')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="psw"><b>Date of birth</b></label>
                                <input type="date" placeholder="Date of Birth" name="dob" id="form-field-phone" pattern="" required>
                                {{-- <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> --}}
                                @error('phone')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="psw"><b>Phone Number</b></label>
                                <input type="number" placeholder="Enter Phone Number" name="phone" id="form-field-phone" pattern="" required>
                                {{-- <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> --}}
                                @error('phone')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="addr"><b>Address</b></label>
                                <input type="text" placeholder="Address" name="address" id="address" value="" required autofocus>
                                @error('address')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                        <dl>
                            <dd>
                                <label for="addr"><b>Select packages</b></label>
                                <select id="" name="" form="">
                                    <option value="">Package 1</option>
                                    <option value="">Package 2</option>
                                    <option value="">Package 3</option>
                                    <option value="">Package 4</option>
                                </select>
                                @error('package')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </dd>
                        </dl>
                    </div> 
                </div>
                <div class="register__btn-acct">
                    <label class="chckbox">
                        <input type="checkbox" checked="checked" name="remember"> Accept data privacy, terms & conditions,
                        etc.
                    </label>
                    <div class="btn1">
                        <button type="submit" class="btn-log">Create Account</button>
                    </div>
                </div>
            </div>




        </form>
    </div>
</section>
@endsection

