@extends('layouts.app')
@section('content')
            <body>
                <div class="flex-center position-ref full-height" >
                    <div class="content col-md-6" style="background-color:white; " >
                        <h1>Mijn Events</h1>
                        @foreach($registrations as $registration)
                            <a href="/event/{{$registration->event->id}}"><h2>{{$registration->event->name}} 
                                @if ($date > strtotime($registration->event->end_time))
                                    <span class="badge bg-danger" >Verlopen</span>
                                @endif</h2></a>
                            <p>{{$registration->event->description}}</p>
                            <p>{{$registration->event->place}} - {{$registration->event->address}}</p>
                            
                        @endforeach
                    </div>
                    </div>
                    <div class="col-md-1" >
                        
                    </div>
                    <div class="col-md-4" style="background-color:white; ">
                        <h3>Je gaat/ging naar {{$count}} van de {{$countEvents}} beschikbare evenementen. </h3>                   
                    </div>
                    <div class="col-md-1" >
                        
                    </div>
                </div>
            </body>
@endsection
