@extends('layouts.app')
@section('content')
    <br>
    <div class="flex-center position-ref full-height" >

        <div class="col-lg-6 " style="background-color: white; padding:10px; margin-top:10px; margin-bottom:10px;">



    <h2>Maak een evenement aan:</h2>
    <form action="{{action('EventController@create')}}" method="post">
        @csrf
        <div class="form-group">
            <h2>De naam:</h2><input type="text" class="form-control" name="name" placeholder="Naam">
        </div>
        <div class="form-group">
            <h2>De beschrijving:</h2><input type="text" class="form-control" name="description" placeholder="Beschrijving">
        </div>
        <div class="form-group">
            <h2>De plaats:</h2><input type="text" class="form-control" name="place" placeholder="Plaats">
        </div>
        <div class="form-group">
            <h2>Het adres:</h2><input type="text" name="address" class="form-control" placeholder="Adres">
        </div>
        <div class="form-group">
            <h2>Maximaal aantal deelnemers:</h2><input type="text" name="max_participant" class="form-control" placeholder="Max deelnemer">
        </div>
        <div class="form-group">
            <h2>Bedrag in euro's:</h2><input name="payment" class="form-control" value="0">
        </div>
        <div class="form-group">
            <h2>Start tijd:</h2><input type="dateTime-local"  name="begin_time" class="form-control" value="dd/mm/jj --:--">
        </div>
        <div class="form-group">
            <h2>Eind tijd:</h2><input type="datetime-local" name="end_time" class="form-control" value="dd/mm/jj --:--">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" action="">Maak een evenement aan.</button>
        {{ csrf_field() }}
    </form>
    <br>
</div>
</div>
</div>

@endsection
