@extends('layouts.app')
@section('content')
@foreach ($events as $event)
                    <style media="screen">
                        #welcome{
                            color: black;
                        }
                        .textbox{
                       
                            padding-right: 0px;
                            background-color: white;
                         
                        }
                        .image{
                            max-width: 500px;
                            height: auto;
                            display: block;
                            margin-left: auto;
                            margin-right: auto;
                            text-align: center;
                        }
                    </style>
                <div class="row">
                    <div class="col-md-6 textbox" style="float: left;">
                          <h1>Het evenement: {{$event->name}}</h1>
                          <h2 class="card-text mb-auto">beschrijving: {{$event->description}}</h2>
                          <h2>Hoeveel mensen mogen mee doen: {{$event->max_participant}}</h2>
                          <h3>Begint: {{$event->begin_time}}</h3>
                          <h3>Eindigt: {{$event->end_time}}</h3>
                          <h3>Het adres:{{$event->address}},{{$event->place}}</h3>
                          <p>Bekijk meer details:<a href="/event/{{$event->id}}">Event pagina</a></p>
                    </div>
                    <div class="col-md-6 image">
                        <img src="../assets/img/Event1.jpg">
                    </div>
                </div>
                                @endforeach
                            <!-- BASIC TABLE -->
                            {{ $events->links() }}
@endsection
