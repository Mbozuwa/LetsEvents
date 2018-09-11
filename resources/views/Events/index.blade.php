@extends('layouts.app')
@section('content')
@foreach ($events as $event)
                    <style media="screen">
                        #welcome{
                            color: black;
                        }
                        .border{
                            border-style:solid;
                            margin-right: 200px;
                            margin-bottom: 20px;
                        }
                    </style>
                    <div class="border">
                          <h1>Het evenement: {{$event->name}}</h1>
                          <h2 class="card-text mb-auto">beschrijving: {{$event->description}}</h2>
                          <h2>Hoeveel mensen mogen mee doen: {{$event->max_participant}}</h2>
                          <h3>Aantal mensen die mee doen: {{$event->participant_amount}}</h3>
                          <h3>Begint: {{$event->begin_time}}</h3>
                          <h3>Eindigt: {{$event->end_time}}</h3>
                          <h3>Het adres:{{$event->address}},{{$event->place}}</h3>
                          <p>Bekijk meer details:<a href="/event/{{$event->id}}">Event pagina</a></p>
                    </div>
                                @endforeach
                            <!-- BASIC TABLE -->
                            {{ $events->links() }}
@endsection
