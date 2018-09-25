@extends('layouts.app')
@section('content')
    @if (Auth::id() == $event->user_id)

        <h2>Event:{{$event->name}}</h2>

        @foreach ($registered as $value)
            <h2>User:{{$value->user->name }}</h2>
        @endforeach
        <h2>Categorie:</h2>
        @foreach ($category as $test)
            <h2>{{$test->name}}</h2>

        @endforeach
@else
<h2>Je hoort hier niet te zijn</h2>
    @endif
@endsection
