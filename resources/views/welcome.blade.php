@include('navbar.navbar')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Let's event</title>

        

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

                <div class="top-right links">

                        <a href="{{ url('/home') }}">Home</a>

                    @if(Auth::check())
                        <li><a class="nav-link" href="#">User profile</a></li>
                          <li><a class="nav-link" href="{{route('user.logout')}}">log out</a></li>
                        <a href="{{ url('/welcome') }}">Home</a>
                    @else
                        <li><a href="{{route('user.signup')}}">Signup</a></li>
                        <li><a href="{{route('user.signin')}}">Signin</a></li>
                    @endif

                </div>


            <div class="content" style="margin-right: 400px">
                <div class="title m-b-md">
                    Let's Event
                </div>

                <div id="calendar"></div>
                    <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
                    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
                
            </div>
        </div>
    </body>
</html>
