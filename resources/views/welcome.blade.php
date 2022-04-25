<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Bullseye!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .top-right.links a{
                background: #c62227 !important;
                margin: 0 !important;
                padding: 10px 20px !important;
                color: #fff;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        {{--<a href="{{ route('register') }}">Register</a>--}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="content-wrapper" style="
    background: green;
    font-size: xx-large;
    color: black;
">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('status'))
                        <div class="alert alert-danger">{{ session('status') }}</div>
                    @endif
                    @yield('content')
                </div>
                <div class="title m-b-md">
                    <img src="{{asset('logo.png')}}" alt="">
                </div>

                <div class="links">



                    {{--<a href="{{route('es')}}">(EM) Electromagnetic Locating Service</a>--}}
                    {{--<a href="{{route('gpr')}}">GPR Service</a>--}}
                    {{--<a href="{{route('cement')}}">GPR Cement Service</a>--}}

                </div>
            </div>
        </div>
    </body>
</html>
