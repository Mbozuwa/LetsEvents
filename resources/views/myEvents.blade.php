@extends('layouts.app')
@section('content')
            <body>
                <div class="flex-center position-ref full-height">
                    <h1>Mijn Events</h1>
                    <div class="content col-md-6" >
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
                    <div class="col-md-4" style="background-color:white; min-height: 130px;">
                        .Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <div class="col-md-2" >
                        
                    </div>

                </div>
            </body>
@endsection
