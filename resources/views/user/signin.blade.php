{{-- @extends('layouts.app') --}}
<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
    <title>Lets Event</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- BOOTSTRAP, FONT-AWESOME, LETS EVENT CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
=======
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
    <link rel="stylesheet" href="/assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="{{ asset('/css/style_alex.css') }}">

    <!-- CALENDAR -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

<<<<<<< HEAD
  <script>
=======

     <script>
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            defaultView: 'listMonth',
            defaultDate: '2018-09-01',
            editable: false,
            eventLimit: false,
            /*events: 'load.php',
            foreach($result as $row)
            {
             $data[] = array(
              'id'   => $row["id"],
              'title'   => $row["name"],
              'event_date'   => $row["event_date"],
              //'start'   => $row["start_event"],
              //'end'   => $row["end_event"]
             );
            }*/
          events: [
            {
              title: 'Start project: Lets Event',
              start: '2018-06-15'
            },
            {
              title: 'Trello backlog',
              start: '2018-06-15 11:24',
              end: '2018-06-15 12:00'
            },
            {
              title: 'Project kickoff',
              start: '2018-06-19'
            },
            {
              title: 'Stand up',
              start: '2018-06-20 08:45'
            },
            {
              title: 'Weekend',
              start: '2018-06-23'
            },
            {
              title: 'Zomervakantie',
              start: '2018-06-30'
            },

            {
              title: 'Nieuw schooljaar',
              start: '2018-08-29'
            },
            {
              title: 'Stand-up',
              start: '2018-08-29'
            },
            {
              title: 'NIEUWE MAAND TEST',
              start: '2018-09-03'
            },
            {
              title: 'NIEUWE MAAND TEST MET EINDTIJD',
              start: '2018-09-04 09:40',
              end: '2018-09-04 12:00'
            }
          ]
        });

      });
<<<<<<< HEAD
  </script>
=======

    </script>
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
<style>

  #calendar {
    max-width: 630px;
    margin: 0 auto;
  }

</style>
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
                                <p class="lead">Login to your account</p>
                            </div>
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                              @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                              @endforeach
                            </div>
                            @endif
                            <form class="form-auth-small" action="{{ route('login') }}" method="post">

                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" name="email" id="signin-email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" name="password" id="signin-password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" action="">SIGN IN</button>
                                {{ csrf_field() }}
                                <div class="bottom">
                                    <span class="helper-text">Don't have an account? <a href="{{ route('user.signup') }}">Sign up!</a></span>
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
