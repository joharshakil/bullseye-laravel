<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> BullsEye</title>
    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('js/datetimepicker/build/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <!-- jQuery 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyAohti8tMHBtpCwcsoKlDc3cxjByw7QGWE&sensor=false&libraries=places'></script>
    {{--<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCjyEr6sEQTt4X7G8v6hDZHcsJTNDNbV4M&sensor=false&libraries=places'></script>--}}
    <script src="{{ asset('js/locationpicker.jquery.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/datetimepicker/build/jquery.datetimepicker.full.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png')}}" />
</head>
<body>
<div id="app" class="main-app-wrapper">
    <header id="masthead" class="site-header">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="http://bullseyelocating.com">
                        <img class="logo-image" src="{{ asset('img/main-logo.png')}}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="custom-home-login"><a href="{{ route('login') }}">Login</a></li>
                            {{--<li  class="custom-home-login"><a href="{{ route('register') }}">Register</a></li>--}}
                        @else
                            <li class="custom-home-login login2"><a href="http://admin.bullseyelocating.com/home" target="blank">Go To Dashboard</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')


    <footer id="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="footer-logo">
                        <a href="http://admin.bullseyelocating.com"><img class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="2s" src=" {{ asset('/img/footer-logo.png')}}"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-socials">
                        <li class="wow fadeInUp" data-wow-delay="0.5s"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow fadeInUp" data-wow-delay="0.8s"><a href="https://twitter.com/bullseyellc?lang=en" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow fadeInUp" data-wow-delay="1s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="wow fadeInUp" data-wow-delay="1.5s"><a href="https://www.instagram.com/bullseyelocating811/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <ul class="footer-mian-menu">
                    <li class="tab-home wow fadeInUp" data-wow-delay="0.1s"><a href="http://bullseyelocating.com/">HOME</a></li>
                    <li class="tab-about wow fadeInUp" data-wow-delay="0.2s"><a href="http://bullseyelocating.com/about-us/">ABOUT US</a></li>
                    <li class="tab-services wow fadeInUp" data-wow-delay="0.3s"><a href="http://bullseyelocating.com/services/">SERVICES</a></li>
                    <li class="tab-gallery wow fadeInUp" data-wow-delay="0.4s"><a href="http://bullseyelocating.com/gallery/">GALLERY</a></li>
                    <li class="tab-order wow fadeInUp" data-wow-delay="0.5s"><a href="http://bullseyelocating.com/order/">ORDER</a></li>
                    <li class="tab-contact wow fadeInUp" data-wow-delay="0.6s"><a href="http://bullseyelocating.com/contact-us/">CONTACT US</a></li>
                    <li class="tab-faqs wow fadeInUp" data-wow-delay="0.7s"><a href="http://bullseyelocating.com//faqs/">FAQs</a></li>
                    <li class="tab-cart wow fadeInUp" data-wow-delay="0.8s"><a href="http://bullseyelocating.com//login">REGISTER</a></li>
                </ul>
            </div>
            <div class="row text-center">
                <div class="footer-info text-center">
                    <p>© 2019 All rights Reserved <span>Bullseye Locating</span></p>
                </div>
            </div>
        </div>
    </footer>


</div>

<!-- Scripts -->
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyAbLEHyTCJzmT2243kvwH8vm0aNKVCTG-Q&libraries=places'></script>
<script>
    jQuery.datetimepicker.setLocale('en');
    $('#date').datetimepicker({
        minDate: new Date(new Date().getTime() + 3 * 24 * 60 * 60 * 1000),
        disabledWeekDays:[0, 6]
    });

    function updateControls(addressComponents) {
        $('#us9-street1').val(addressComponents.addressLine1);
        $('#us9-city').val(addressComponents.city);
        $('#us9-state').val(addressComponents.stateOrProvince);
        $('#us9-zip').val(addressComponents.postalCode);
        $('#us9-country').val(addressComponents.country);
    }

    function updateControls4(addressComponents) {
        // console.log(addressComponents);
        $('#us4-street1').val(addressComponents.addressLine1);
        $('#us4-city').val(addressComponents.city);
        $('#us4-state').val(addressComponents.stateOrProvince);
        $('#us4-zip').val(addressComponents.postalCode);
        $('#us4-country').val(addressComponents.country);
    }
    $('#us9').locationpicker({

        radius: 30,
        inputBinding: {
            locationNameInput: $('#us3-address'),
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
        },
        mapTypeControl:true,
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            updateControls(addressComponents);
            console.log(addressComponents,currentLocation)
        },
        oninitialized: function(component) {
            var addressComponents = $(component).locationpicker('map').location.addressComponents;
            updateControls(addressComponents);
        }
    });
    $('#us4').locationpicker({
        addressFormat:  'street_address',
        radius: 30,

        mapTypeIds:google.maps.MapTypeId.SATELLITE,
        mapTypeControl: true,

        scrollwheel: true,

        enableAutocomplete: true,
        enableAutocompleteBlur: true,
        autocompleteOptions: true,

        enableReverseGeocode: true,
        draggable: true,
        inputBinding: {
            locationNameInput: $('#us4-address'),
            latitudeInput: $('#us4-lat'),
            longitudeInput: $('#us4-lon'),
        },



        onchanged: function (currentLocation, radius, isMarkerDropped) {
            var addressComponents = $(this).locationpicker('map').location.addressComponents;
            updateControls4(addressComponents);
            console.log(addressComponents,currentLocation)
        },
        oninitialized: function(component) {
            var addressComponents = $(component).locationpicker('map').location.addressComponents;
            updateControls4(addressComponents);
        }
    });
</script>
<script type="text/javascript">
    jQuery(window).scroll(function($){
        if (jQuery(window).scrollTop() > 10){
            jQuery('#masthead').addClass("sticky");
        }else{
            jQuery('#masthead').removeClass("sticky");
        }
    });
</script>
<script type="text/javascript">
    new WOW().init();
</script>
@yield('scripts')
</body>
</html>
