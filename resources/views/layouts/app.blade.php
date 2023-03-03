<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Link to global CSS file -->
    <!-- Yield section for page-specific CSS files -->
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @section('css')
    <!-- Link to page-specific CSS file -->
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
    @endsection
    @yield('css')
</head>
<body>
    <!-- Global header HTML code -->
    <header>
        <nav>
            <!-- Navigation links -->
            {{-- <h1>HIVEROOMS</h1> --}}
        </nav>
    </header>
    
    <!-- Yield section for page-specific HTML content -->
    @yield('content')
    
    <!-- Global footer HTML code -->
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>