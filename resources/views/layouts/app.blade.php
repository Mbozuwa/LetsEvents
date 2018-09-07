<!doctype html>
<html lang="en">
<head>
    <title>Lets Event</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<<<<<<< HEAD

    <!-- BOOTSTRAP, FONT-AWESOME, LETS EVENT CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style_alex.css') }}">

    <!-- CALENDAR -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <!-- SCRIPTS -->
=======

    <!-- BOOTSTRAP, FONT-AWESOME, LETS EVENT CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="{{ asset('/css/style_alex.css') }}">

    <!-- CALENDAR -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- Scripts -->
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="#">LETS EVENT</a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">3</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Als user, wil ik kunnen registreren zodat ik evenementen kan aanmaken</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Als user, wil ik mijn profiel kunnen bekijken om het aan te passen.</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>Als student, wil ik alle beschikbare evenementen kunnen inzien zodat ik me daarvoor kan inschrijven</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
<<<<<<< HEAD
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://via.placeholder.com/20?text=Placeholder.com+rocks!" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
=======
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://via.placeholder.com/20?text=Placeholder.com+rocks!" class="img-circle" alt="Avatar"> <span></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
                            @if (Auth::check())
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                    <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                    <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                                </ul>
<<<<<<< HEAD
                            @else
=======
                            @endif
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
                            <ul class="dropdown-menu">
                                <li><a href="/user/signup"><i class="lnr lnr-user"></i> <span>Sign up</span></a></li>
                                <li><a href="/user/signin"><i class="lnr lnr-cog"></i> <span>Sign in</span></a></li>
                            </ul>
<<<<<<< HEAD
                            @endif
=======

>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- LEFT SIDEBAR -->
            @include('layouts.navbar')

        <!-- END LEFT SIDEBAR -->

        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            @yield('content')
            <!-- END MAIN CONTENT -->
        </div>
            <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; <?php echo date("Y"); ?> Lets Event | Alex | Jasper | Michael | Raymond | Laurens</p>
            </div>
        </footer>
    </div>
<<<<<<< HEAD
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
=======
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
</body>
</html>
