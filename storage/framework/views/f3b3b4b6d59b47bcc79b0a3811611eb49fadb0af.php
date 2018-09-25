<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3schools.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-sidebar w3-bar-block w3-border-right" style="color:rgb(52, 123, 237);" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Sluit &times;</button>
  <a href="<?php echo e(url('/')); ?>" class="w3-bar-item w3-button">Home</a>
  <?php if(Auth::check()): ?>
      <a class="w3-bar-item w3-button" href="<?php echo e(route('profile.profile', auth()->user())); ?>" class="w3-bar-item w3-button">Profiel</a>
      <a class="w3-bar-item w3-button" href="<?php echo e(route('user.logout')); ?>">log out</a>
  <?php else: ?>
      <a class="w3-bar-item w3-button" href="<?php echo e(route('user.signup')); ?>">Registreer</a>
      <a class="w3-bar-item w3-button" href="<?php echo e(route('user.signin')); ?>">Log in</a>
  <?php endif; ?>

</div>
<button class="w3-button w3-black w3-xlarge" onclick="w3_open()">☰</button>
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>
