@extends('layouts.app')
  @section('content')
    {{-- <h2>{{$categories->name}}</h2> --}}
      @foreach ($events    as $event)
                <h3>{{$event->name}}</h3>
      @endforeach
    <a href="{{ url()->previous() }}">Ga terug</a>
  </hr>
  <hr>
@endsection
