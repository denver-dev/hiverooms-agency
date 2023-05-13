@extends('layouts.app')



@section('content')
    <section class="register">
        <div class="register__container">
            <div class="register__bee">
                <figure><img src="{{ asset('images/icons/icon-bee.png') }}" alt="Bee"></figure>
            </div>
            <h2 class="register__heading"><span>Hive</span>Rooms</h2>
            <h3 class="register__sub-heading">Become a member</h3>
            <form action="{{ route('register.membership') }}" method="POST" id="registerForm">
                @csrf
                <div class="container">
                    <div class="responsive-between">
                        <div class="register__responsive-input">
                            <dl>
                                <dd>
                                    <label for="firstName"><b>First Name</b></label>
                                    <input type="text" placeholder="Enter First Name" name="firstName" id="firstName"
                                        value="" required autofocus>
                                    @error('firstName')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="lastName"><b>Last Name</b></label>
                                    <input type="text" placeholder="Enter Last Name" name="lastName" id="lastName"
                                        value="" required autofocus>
                                    @error('lastName')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="email"><b>Email Address</b></label>
                                    <input type="email" placeholder="Enter Email" name="email" id="email"
                                        value="" required autofocus>
                                    @error('email')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="ppasswordsw"><b>Password</b></label>
                                    <input type="password" placeholder="Enter Password" name="password" id="password"
                                        required>
                                    @error('password')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="password-confirm"><b>Confirm Password</b></label>
                                    <input type="password" placeholder="Enter Password" name="password_confirmation"
                                        id="password-confirm" required>
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="birthdate"><b>Date of birth</b></label>
                                    <input type="date" placeholder="Date of Birth" name="birthdate" id="birthdate"
                                        pattern="" required>
                                    {{-- <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> --}}
                                    @error('phone')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="phone"><b>Phone Number</b></label>
                                    <input type="number" placeholder="Enter Phone Number" name="phone" id="phone"
                                        pattern="" required>
                                    {{-- <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> --}}
                                    @error('phone')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="address"><b>Address</b></label>
                                    <input type="text" placeholder="Address" name="address" id="address" value=""
                                        required autofocus>
                                    @error('address')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <label for="addr"><b>Select packages</b></label>
                                    <select id="package_id" name="package_id">
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="register__btn-acct">
                        <label class="chckbox">
                            <input type="checkbox" checked="checked" name="remember"> Accept data privacy, terms &
                            conditions,
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
