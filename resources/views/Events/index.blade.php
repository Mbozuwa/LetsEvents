@extends('layouts.app')
@section('content')
    @if (count($events) == 0)
        <h2>Er zijn nog geen evenementen gemaakt.</h2>
        <h2>Maak<a href="/events/create">hier</a> een evenement aan.</h2>
    @else
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
                    <div class="content" style=" padding:10px; margin-right:10px; margin-top:10px; margin-bottom:-10px;">
                    <div class="col-md-6" style="background-color: white;">
                          <h1>Het evenement: {{$event->name}}</h1>
                          <h2 class="card-text mb-auto">Beschrijving: {{$event->description}}</h2>
                          <h2>Maximum aantal deelnemers: {{$event->max_participant}}</h2>
                          <h3>Begin tijd: @dateFormat($event->begin_time)</h3>
                          <h3>Eind tijd: @dateFormat($event->end_time)</h3>
                          <h3>Adres: {{$event->address}}, {{$event->place}}</h3>
                          @if ($event->payment > 0)
                              <h3>De prijs: €{{$event->payment}}</h3>
                          @endif
                          <p>Bekijk meer details: <a href="/event/{{$event->id}}">Event pagina</a></p>
                    </div>
                    <div class="col-lg-6" >
                        <img src="/assets/img/login-bg.jpg" style="height: 475px; width: 600px; margin-bottom: 20px">
                    </div>
                </div>

                                @endforeach
                            <!-- BASIC TABLE -->
                            {{ $events->links() }}
@endif
@endsection
