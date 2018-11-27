@extends('layouts.app')
@section('content')
<script type="text/javascript" src="{{ URL::asset('js/dropdown.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>

<form autocomplete="off" action="/action_page.php">
  <div class="autocomplete" style="width:300px;">
    <input id="countries" type="text" name="myCountry" placeholder="Country">
  </div>
  <input type="submit">
</form>
<script type="text/javascript">
var options = {

  url: '/test/json',

  getValue: "data",

  list: {
    match: {
      enabled: true
    }
  },

  theme: "square"
};

$("#countries").easyAutocomplete(options);
</script>
@endsection
