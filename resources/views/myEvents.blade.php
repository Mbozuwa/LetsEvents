@extends('layouts.app')
@section('content')
    <div class="col-9 justify-content-center bg-dark" style="padding-top:10px; padding-right:10px;">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
        </div>
            <body>
                <div class="flex-center position-ref full-height" >
                    <div class="content col-md-6" style="background-color:white; margin-top:10px; " >
                        <h1>Mijn evenementen</h1>
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
                    <div class="col-md-4" style="background-color:white; margin-top:10px;">
                        <h3>Je gaat/ging naar {{$count}} van de {{$countEvents}} beschikbare evenementen. </h3>
                    </div>
                    <div class="col-md-1" >

                    </div>
                </div>
            </body>
@endsection
