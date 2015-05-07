<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title') - Ghost in the shell </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Midsummer night's dream">
    <meta name="author" content="Radu C.">

    <!-- CSS  -->
    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link rel="stylesheet" href="/css/styles.css"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="/css/font-awesome.css">
    <!-- favicon and touch icons -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" >

    @yield('header')

</head>
<body>

<!-- header section goes here -->
@if (Auth::check())
    @include('partials.navMenuLoggedIn')
@else
    @include('partials.navMenu')
@endif

<div id="site-content">
    <div class="container main-content-area">
        <div class="row">

            <!-- Main content -->
            <div class="main col-xs-12 col-sm-12 col-md-8 pull-left">

                <!-- main goes here -->
                @yield('content')

            </div> <!-- end main -->


            <!-- side bar content goes here -->
            @section('sidebar')
                @include('partials.sidebar')
            @show

        </div><!-- end .row -->

        <!-- footer section goes here -->
        @include('partials.footer')

    </div><!-- End main .container -->



</div><!-- End .site-content -->

<!-- Laravel js REST-full delete -->

<!-- Java Script -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="/js/bootstrap.js"></script>
@yield('footer')

</body>
</html>