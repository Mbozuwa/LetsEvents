@extends('layouts.app')
@section('content')
    @if (count($userEvents) == 0)
        <h2>Nog geen evenementen gemaakt.</h2>
        <h2>Maak <a href="/events/create">hier</a> een evenement aan.</h2>
    @else
@foreach ($userEvents as $event)

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

                    {{-- {{dd($event)}} --}}
                    <div class="border">
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
                          <p>test:a:<a href="/events/info/{{$event->id}}">test</a></p>
                          <p><a href="/events/edit/{{$event->id}}">Verander</a></p>
                          <p><a href="/events/category/{{$event->id}}">Kies een categorie</a></p>

                          @if (Auth::check())
                              <p><a href="/delete/{{$event->id}}">Verwijder</a></p>
                          @endif
                    </div>
                    <br>
                                @endforeach
                            <!-- BASIC TABLE -->
                            {{ $userEvents->links() }}
                        @endif

@endsection
