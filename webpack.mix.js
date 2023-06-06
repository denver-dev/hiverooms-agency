const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


 mix.js('resources/js/bootstrap.js', 'public/js');
 mix.js('resources/js/app.js', 'public/js');
 mix.js('resources/js/swiper.js', 'public/js');
 
 mix.sass('resources/sass/swiper.scss', 'public/css');
 mix.sass('resources/sass/register.scss', 'public/css');
 mix.sass('resources/sass/login.scss', 'public/css');
 mix.sass('resources/sass/app.scss', 'public/css');
 mix.sass('resources/sass/dashboard.scss', 'public/css');
 mix.sass('resources/sass/styles.scss', 'public/css');
 mix.sass('resources/sass/variables.scss', 'public/css');
 mix.sass('resources/sass/hotels.scss', 'public/css');
 mix.sass('resources/sass/profile.scss', 'public/css');
 mix.sass('resources/sass/transactions.scss', 'public/css');
 mix.sass('resources/sass/component.scss', 'public/css');
 mix.sass('resources/sass/booking.scss', 'public/css');
 mix.sass('resources/sass/commission.scss', 'public/css');
 mix.sass('resources/sass/points.scss', 'public/css');
 mix.sass('resources/sass/create_booking.scss', 'public/css');
 mix.sass('resources/sass/sidebar.scss', 'public/css');
 mix.sass('resources/sass/search_results.scss', 'public/css');
 mix.sass('resources/sass/search_confirmation.scss', 'public/css');
 mix.sass('resources/sass/final_confirmation.scss', 'public/css');
 mix.sass('resources/sass/booking_success.scss', 'public/css');
 mix.sass('resources/sass/referral.scss', 'public/css');

 