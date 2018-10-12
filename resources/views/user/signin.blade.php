<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
    <title>Lets Event</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- BOOTSTRAP, FONT-AWESOME, LETS EVENT CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/linearicons/style.css"/>
    <link rel="stylesheet" href="{{ asset('/css/style_alex.css') }}"/>

    <!-- CALENDAR -->
    <link rel="stylesheet" href="{{ asset('/css/calendar/fullcalendar.css') }}"/>
    <script src="{{ asset('/js/calendar/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('/js/calendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('/js/calendar/nl-be.js') }}"></script>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                defaultView: 'listMonth',
                locale: 'nl-be',
                editable: false,
                eventLimit: false,
                events: {!! $currentEvents !!}
            });
        });
    </script>
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center">LETS EVENT</div>
                                <p class="lead">Login met je account</p>
                            </div>
                            @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                              @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                              @endforeach
                            </div>
                            @endif
                            <form class="form-auth-small" action="{{ route('login') }}" method="post">

                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Emailadres</label>
                                    <input type="email" class="form-control" name="email" id="signin-email" placeholder="Emailadres" required>
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Wachtwoord</label>
                                    <input type="password" class="form-control" name="password" id="signin-password" placeholder="Wachtwoord" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" action="">LOG IN</button>
                                {{ csrf_field() }}
                                <div class="bottom">
                                    <span class="helper-text">Heb je geen account? <a href="{{ route('user.signup') }}">Registreer je hier!</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="content">
                            <div class="overlay"><div id='calendar'></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>
