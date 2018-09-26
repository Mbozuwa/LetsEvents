@extends('layouts.app')
@section('content')
    @if (Auth::id() == $event->user_id)

        <div class="content" style=" padding:10px; margin-right:10px; margin-top:10px; margin-bottom:-10px;">
        <div class="col-md-6" style="background-color: white;">
    @if (count($registered) == 0)
        <h2>Niemand doet mee aan het evenement<a href="/event/{{$event->id}}"> {{$event->name}}</a></h2>
    @else
        <h2>Dit zijn de deelnemers die meedoen aan het evenement:<a href="/event/{{$event->id}}"> {{$event->name}}</a>: </h2>

        @foreach ($registered as $value)
            <h2>Naam: {{$value->user->name }}</h2>
            <h2>E-mail: {{$value->user->email}}</h2>
            <h2>Tel: {{$value->user->telephone}}</h2>

            <br>
        @endforeach
        {{-- <h2>Categorie:</h2> --}}
        {{-- @foreach ($category as $test)
            <h2>{{$test->name}}</h2>

        @endforeach --}}

@endif
@else
<h2>Je hoort hier niet te zijn.</h2>
    @endif


</div>
</div>


@endsection
