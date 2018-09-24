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
                        .border{
                            border-style:solid;
                            margin-right: 200px;
                            margin-bottom: 20px;
                        }
                    </style>

                    <div class="border">
                        {{-- @foreach ($category as $test)
                            {{$test}}
                        @endforeach --}}

                          <h1>Het evenement: {{$event->name}}</h1>
                          <h2 class="card-text mb-auto">beschrijving: {{$event->description}}</h2>
                          <h2>Hoeveel mensen mogen mee doen: {{$event->max_participant}}</h2>
                          <h3>Begint: {{ \Carbon\Carbon::parse($event->begin_time)->format('d-m-Y H:i')}}</h3>
                          <h3>Eindigt: {{ \Carbon\Carbon::parse($event->end_time)->format('d-m-Y H:i')}}</h3>
                          <h3>Het adres:{{$event->address}},{{$event->place}}</h3>
                          @if ($event->payment > 0)
                              <h3>De prijs:{{$event->payment}}</h3>
                          @endif
                          <p>Bekijk meer details:<a href="/event/{{$event->id}}">Event pagina</a></p>
                    </div>
                                @endforeach
                            <!-- BASIC TABLE -->
                            {{ $events->links() }}
@endif
@endsection
