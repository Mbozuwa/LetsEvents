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
              <div class="logo text-center">{{ __('msg.app.name') }}</div>
              <p class="lead">{{ __('msg.signup.createacc') }}</p>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
              @endforeach
            </div>
            @endif
            <form class="form-auth-small" name="signUp" onsubmit="return validatePassword()"  action="{{ route('user.signup') }}" method="post">
              <div class="form-group">
                <label for="signup-email" class="control-label sr-only"></label>
                <p>{{ __('msg.email') }} *</p><input type="email" class="form-control" name="email" id="signup-email" size="10" required>
              </div>
              <div class="form-group">
                  <p>{{ __('msg.password') }} *</p>
                <label for="signup-password" class="control-label sr-only">{{ __('msg.password') }}</label>
                <input type="password" class="form-control" name="password" id="signup-password" required>
              </div>
              <div class="form-group">
                  <p>{{ __('msg.signup.name') }} *</p>
                <label for="signup-name" class="control-label sr-only">{{ __('msg.signup.name') }}</label>
                <input type="text" class="form-control" name="name" id="signup-name" required>
              </div>
              <div class="form-group">
                  <p>{{ __('msg.signup.address') }} *</p>
                <label for="signup-address" class="control-label sr-only">{{ __('msg.signup.address') }}</label>
                <input type="text" class="form-control" name="address" id="signup-address" required>
              </div>
              <div class="form-group">
                  <p>{{ __('msg.signup.phone') }} *</p>
                <label for="signup-telephone" class="control-label sr-only">{{ __('msg.signup.phone') }}</label>
                <input type="text" class="form-control" name="telephone" id="signup-telephone" placeholder="061-2345-6789" required>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('msg.signup.btn') }}</button>
              {{ csrf_field() }}
              <div class="bottom">
                <small>{{ __('msg.signup.requiredfields') }}</small>
                <br>
                <span class="helper-text">{{ __('msg.signup.alreadyacc') }} <a href="/user/signin">{{ __('msg.signup.login') }}</a></span>
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

    </script>
</body>
</html>
