<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
    <title>Lets Event</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- BOOTSTRAP, FONT-AWESOME, LETS EVENT CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style_alex.css') }}">

    <!-- CALENDAR -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

</head>
<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <div class="vertical-align-wrap">
      <div class="vertical-align-middle">
        <div class="auth-box register">
          <div class="content">
            <div class="header">
              <div class="logo text-center">LETS EVENT</div>
              <p class="lead">Maak een account</p>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
              @endforeach
            </div>
            @endif
            <form class="form-auth-small" action="{{ route('user.signup') }}" method="post">
              <div class="form-group">
                <label for="signup-email" class="control-label sr-only">Emailadres</label>
                <input type="email" class="form-control" name="email" id="signup-email" placeholder="Emailadres">
              </div>
              <div class="form-group">
                <label for="signup-password" class="control-label sr-only">Wachtwoord</label>
                <input type="password" class="form-control" name="password" id="signup-password" placeholder="Wachtwoord">
              </div>
              <div class="form-group">
                <label for="signup-name" class="control-label sr-only">Naam</label>
                <input type="text" class="form-control" name="name" id="signup-name" placeholder="Naam">
              </div>
              <div class="form-group">
                <label for="signup-address" class="control-label sr-only">Adres</label>
                <input type="text" class="form-control" name="address" id="signup-address" placeholder="Adres">
              </div>
              <div class="form-group">
                <label for="signup-telephone" class="control-label sr-only">Telefoon nummer</label>
                <input type="text" class="form-control" name="telephone" id="signup-telephone" placeholder="Telefoon nummer">
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTREER</button>
              {{ csrf_field() }}
              <div class="bottom">
                <span class="helper-text">Heb je al een account? <a href="/user/signin">Log in!</a></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END WRAPPER -->

</body>
</html>
