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
            <form class="form-auth-small" name="signUp" onsubmit="return validatePassword() || validatePhoneNumber()"  action="{{ route('user.signup') }}" method="post">
              <div class="form-group">
                <label for="signup-email" class="control-label sr-only"></label>
                <p>E-mail *</p><input type="email" class="form-control" name="email" id="signup-email" size="10" required>
              </div>
              <div class="form-group">
                  <p>Wachtwoord *</p>
                <label for="signup-password" class="control-label sr-only">Wachtwoord</label>
                <input type="password" class="form-control" name="password" id="signup-password" required>
              </div>
              <div class="form-group">
                  <p>Naam *</p>
                <label for="signup-name" class="control-label sr-only">Naam</label>
                <input type="text" class="form-control" name="name" id="signup-name" required>
              </div>
              <div class="form-group">
                  <p>Adres *</p>
                <label for="signup-address" class="control-label sr-only">Adres</label>
                <input type="text" class="form-control" name="address" id="signup-address" required>
              </div>
              <div class="form-group">
                  <p>Telefoon nummer *</p>
                <label for="signup-telephone" class="control-label sr-only">Telefoon nummer</label>
                <input type="text" class="form-control" name="telephone" id="signup-telephone" required>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTREER</button>
              {{ csrf_field() }}
              <div class="bottom">
                <small>De met een (*) gemarkeerde velden moeten worden ingevuld.</small>
                <br>
                <span class="helper-text">Heb je al een account? <a href="/user/signin">Log in!</a></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END WRAPPER -->
    <script type="text/javascript">

// window.onload = function() {
//     document.getElementById('signup-email').focus();
// }
function validatePassword()
{
     var passwordId = document.signUp.password;
     if (passwordId.value.length < 8) {
         document.signUp.password.style.border = '1px solid #999999';
         alert('het wachtwoord is niet lang genoeg');
         return false;
    }
}

function validatePhoneNumber()
{
    var phoneId = document.signUp.telephone;
    // phoneId.toString().length;
    console.log(phoneId);
    // console.log(phoneId);
    if (phoneId.value.length < 10 || phoneId.value.length > 10) {
        document.signUp.telephone.style.border = '1px solid #999999';
        alert('het telephone is niet lang genoeg');
        return false;
   }
}

// alert(validatePhoneNumber());
    </script>
</body>
</html>
