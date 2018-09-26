@extends('layouts.app')
  @section('content')
    {{-- <h2>{{$categories->name}}</h2> --}}
    <div class="flex-center position-ref full-height" >
        <div class="content col-md-6" style="background-color: white; margin-top:10px;">
            <h2>{{$category->name}}</h2>
          @foreach ($events as $event)
                    <h3>{{$event->name}}<a href="/event/{{$event->id}}"> Weergeven</a></h3>
          @endforeach
      </div>
  </div>
@endsection
