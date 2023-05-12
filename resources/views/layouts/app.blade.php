<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hiverooms</title>
    <link rel="stylesheet" href="{{ mix('css/login.css') }}">
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ mix('css/hotels.css') }}">
    <link rel="stylesheet" href="{{ mix('css/profile.css') }}">
    <link rel="stylesheet" href="{{ mix('css/transactions.css') }}">
    <link rel="stylesheet" href="{{ mix('css/component.css') }}">
    <link rel="stylesheet" href="{{ mix('css/booking.css') }}">
    <link rel="stylesheet" href="{{ mix('css/commission.css') }}">
    <link rel="stylesheet" href="{{ mix('css/points.css') }}">
    <link rel="stylesheet" href="{{ mix('css/create_booking.css') }}">
    <link rel="stylesheet" href="{{ mix('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ mix('css/search_results.css') }}">
    <link rel="stylesheet" href="{{ mix('css/search_confirmation.css') }}">
    <link rel="stylesheet" href="{{ mix('css/final_confirmation.css') }}">
    <link rel="stylesheet" href="{{ mix('css/booking_success.css') }}">
    <link rel="stylesheet" href="{{ mix('css/referral.css') }}">
    <link rel="stylesheet" href="{{ mix('css/swiper.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ mix('css/styles.css') }}">


    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- flatpicker date --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>




</head>
<body class="template-{{ $viewName }}">


    @yield('content')


<footer>

<script src="{{ mix('js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.0/js/intlTelInput.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.8/jquery.inputmask.bundle.min.js'></script>

{{-- flatpicker date --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ mix('js/swiper.js') }}"></script>
<script src="{{ mix('js/bootstrap.js') }}"></script>

</footer>

</body>
</html>