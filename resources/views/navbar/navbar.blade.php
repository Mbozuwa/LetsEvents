<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3schools.css">

<div class="w3-sidebar w3-bar-block w3-border-right" style="" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="{{ url('/') }}" class="w3-bar-item w3-button">Home</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>

</div>

  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>
