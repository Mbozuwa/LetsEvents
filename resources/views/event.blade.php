@extends('layouts.app')
@section('content')
            <body>
                <div class="flex-center position-ref full-height">
                    <div class="content col-md-6">
                        <h1>{{$event['name']}}</h1>
                        <p>{{$event['begin_time']}} - {{$event['end_time']}}</p>
                        <p>{{$event['description']}}</p>
                        <p>{{$event['place']}} - {{$event['address']}}</p>
                        <p>Er zijn {{$count}} van de {{$event['max_participant']}} studenten die gaan</p>
                    </div>
                    <div class="col-md-4" style="background-color:white;">
                        <!-- @if (!empty($user)) -->
                        @if (empty($attendence[0]))
                        <h2>Laat weten of je komt</h2><br>
                        @else 
                        <h2>Verander je status</h2>
                        @endif
                        @if (empty($attendence[0]))
                        <a href="/registration/1/{{$event['id']}}"><button type="button" class="btn btn-success">Ik kom</button></a>
                        <a href="/registration/2/{{$event['id']}}"><button type="button" class="btn btn-warning">Ik kom misschien</button></a>
                        <a href="/registration/3/{{$event['id']}}"><button type="button" class="btn btn-danger">Ik kom niet</button></a>
                        @else 
                        <h3>Je huidige status is <b>{{$attendence[0]['status']}}</b></h3>
                        <h4>Status aanpassen, klik hier</h4>
                        @endif
                        <!-- @else 
                        <h3>U bent op het moment niet ingelogd</h3>
                        <a href="/user/signin"><h4>klik hier om naar het login scherm te gaan</h4></a>
                        @endif -->
                    </div>
                    <div class="col-md-2" >
                        
                    </div>

                </div>
            </body>
@endsection