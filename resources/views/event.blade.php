@extends('layouts.app')
@section('content')
            <body>
                <div class="flex-center position-ref full-height" >
                    <div class="content col-md-6" style="background-color: white;">
                        <h1>{{$event['name']}}</h1>
                        <p>{{$newDate}} - {{$newDateEnd}}</p>
                        <p>{{$event['description']}}</p>
                        <p>{{$event['place']}} - {{$event['address']}}</p>
                        <p>Er zijn {{$count}} van de {{$event['max_participant']}} studenten die gaan</p>
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="500" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q={{$event['address']}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{text-align:left;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
                        </div>
                    </div>
                    <div class="col-md-1" >
                        
                    </div>
                    <div class="col-md-4" style="background-color:white; min-height: 130px;">
                        @if (empty($attendence[0]))
                        <a href="/registration/1/{{$event['id']}}" ><button type="button" title="Ik ga" class="btn btn-success">V</button></a>
                        <a href="/registration/2/{{$event['id']}}" ><button type="button" title="Ik ga misschien" class="btn btn-warning">?</button></a>
                        <a href="/registration/3/{{$event['id']}}" ><button type="button" title="Ik ga niet"class="btn btn-danger">X</button></a>
                        @else 
                        <h3>Je huidige status is: <br />
                        <b>{{$attendence[0]['status']}}</b></h3>
                        {{-- <h4>Status wijzigen</h4> --}}
                        @endif
                        <!-- @if (!empty($user)) -->
                        @if (empty($attendence[0]))
                        <h2>Laat weten of je komt</h2><br>
                        @else 
                        <h2>Verander je status</h2>
                        {{-- <form action="post"> --}}
                            <select class="form-control">
                                <option value="1">Ik ga</option>
                                <option value="2" selected="selected">Ik ga misschien</option>
                                <option value="2">Ik ga niet</option>
                            </select>
                            <a href="/event/{{$event['id']}}" style="color: white;"><button style="margin-top: 10px;" class="btn bg-success btn-lg">Pas aan</button></a>
                        {{-- </form> --}}
                        @endif
                        <!-- @else 
                        <h3>U bent op het moment niet ingelogd</h3>
                        <a href="/user/signin"><h4>klik hier om naar het login scherm te gaan</h4></a>
                        @endif -->
                        @if ( Auth::user()->role_id == 2)
                        <p>Dit evenement is aangemaakt door: {{$organiser->name}}</p>
                        <a href="edit/{{$event['id']}}" style="color: white;"><button style="margin-bottom: 10px;" class="btn bg-success btn-lg">Bewerken</button></a>
                        @elseif ($event['user_id'] == Auth::user()->id)
                        <br>
                        <a href="edit/{{$event['id']}}" style="color: white;"><button style="margin-bottom: 10px;" class="btn bg-success btn-lg">Bewerken</button></a>
                        @endif
                    </div>
                    <div class="col-md-1" >
                        
                    </div>

                </div>
            </body>
@endsection
