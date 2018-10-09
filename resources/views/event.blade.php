@extends('layouts.app')
@section('content')
<div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel">
                            <div class="event-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="{{ asset('uploads/events/'.$event['image'].'') }}" class="event-logo" alt="{{ $event['name'] }}"/>
                                            </div>
                                            <div class="media-body">
                                                <h2 class="event-title">{{ $event['name'] }}</h2>
                                                @if(strtotime("now") >= strtotime($event['begin_time']) && strtotime("now") <= strtotime($event['end_time']))
                                                <span class="label label-success status">DIT EVENEMENT IS NU BEZIG</span>
                                                @elseif(strtotime("now") >= strtotime($event['end_time']))
                                                <span class="label label-default status">DIT EVENEMENT IS AFGELOPEN</span>
                                                @else
                                                <span class="label label-info status">DIT EVENEMENT BEGINT BINNENKORT</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_id == 2 || $event['user_id'] == Auth::user()->id)
                                    <div class="col-md-3 text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">EVENT INFORMATIE <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                <li><a href="edit/{{ $event['id'] }}">Bewerken</a></li>
                                                <li><a href="../events/info/{{ $event['id' ]}}">Deelnemers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="event-subheader">
                                    <div class="layout-table event-metrics">
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">BEGINDATUM</span>
                                                <span class="value">@dateFormat($event->begin_time)</span>
                                            </div>
                                        </div>
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">EINDDATUM</span>
                                                <span class="value">@dateFormat($event->end_time)</span>
                                            </div>
                                        </div>
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">INSCHRIJFKOSTEN</span>
                                                <span class="value">&euro; {{ $event['payment'] }}</span>
                                            </div>
                                        </div>
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">DEELNEMERS</span>
                                                <span class="value">{{ $count }}/{{ $event['max_participant'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="event-info">
                                    <h3 class="info-header">OVER DIT EVENEMENT</h3>
                                    <p class="event-description">{{ $event['description'] }}</p>
                                </div>
                                <div class="event-info">
                                    <h3 class="info-header">ALGEMENE INFORMATIE</h3>
                                    <ul class="list-unstyled list-justify">
                                        <li>Adres <span>{{ $event['address'] }}</span></li>
                                        <li>Plaats <span>{{ $event['place'] }}</span></li>
                                        <li>Aantal deelnemers <span>{{ $count }}</span></li>
                                        <li>Max. deelnemers <span>{{ $event['max_participant'] }}</span></li>
                                        @if($event['signup_time'] != $event['begin_time'])
                                        <li>Aanmelden kan tot <span>{{ date("d-m-Y H:i", strtotime($event['signup_time'])) }}</span></li>
                                        @else
                                        <li>Aanmelden kan <span>altijd</span></li>
                                        @endif
                                        <li><br/>Dit evenement is gemaakt door {{ $organiser->name }}</li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe width="404" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $event['address'] }}&t=&z=13&ie=UTF8&iwloc=&output=embed" class="embed-responsive-item" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                        </div>
                                        <style>.mapouter{text-align:left;height:300px;width:404px;}.gmap_canvas{overflow:hidden;background:none!important;height:300px;width:404px;}</style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-md-4">
                    <div class="panel">
                        <div class="event-header">
                            <div class="row">
                            @if (!empty($user))
                                @if($count < $event['max_participant'])
                                    @if(strtotime($event['signup_time']) == strtotime($event['begin_time']) || strtotime($event['signup_time']) >= strtotime("now"))
                                        @if (!empty($attendence[0]))
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h2 class="event-title">Je huidige status</h2>
                                                        @if ($attendence[0]['status'] == "Ik ga")
                                                        <span class="label label-success status"><b>{{ $attendence[0]['status'] }}</b> naar dit evenement</span>
                                                        @elseif ($attendence[0]['status'] == "Misschien")
                                                        <span class="label label-warning status">Ik ga <b>{{ strtolower($attendence[0]['status']) }}</b> naar dit evenement</span>
                                                        @elseif ($attendence[0]['status'] == "Ik ga niet")
                                                        <span class="label label-danger status"><b>{{ $attendence[0]['status'] }}</b> naar dit evenement</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">WIJZIGEN <span class="caret"></span>
                                                    </button>
                                                    {{-- {{dd($event->id)}} --}}
                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                        {{-- Zou hetzelfde moeten werken als de aanmeldknoppen alleen een update ipv insert. --}}
                                                        <li name="ga"><a href="/events/updateStatus/{{$event->id}}/Ik ga">Ik ga</a></li>
                                                        <li name="mischien"><a href="/events/updateStatus/{{$event->id}}/Misschien">Ik ga misschien</a></li>
                                                        <li name="niet"><a href="/events/updateStatus/{{$event->id}}/Ik ga niet">Ik ga niet</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h2 class="event-title">Laat weten of je komt</h2>
                                                        <a href="/registration/1/{{$event['id']}}" ><button type="button" title="Ik ga" class="btn btn-success">V</button></a>
                                                        <a href="/registration/2/{{$event['id']}}" ><button type="button" title="Ik ga misschien" class="btn btn-warning">?</button></a>
                                                        <a href="/registration/3/{{$event['id']}}" ><button type="button" title="Ik ga niet"class="btn btn-danger">X</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="col-md-12">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h2 class="event-title">Aanmeldtijd verlopen!</h2>
                                                    Helaas, de tijd om je aan te melden voor dit evenement is voorbij. Als je je al eerder hebt aangemeld voor dit evenement, dan is het niet meer mogelijk om je af te melden.
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="col-md-12">
                                        <div class="media">
                                            <div class="media-body">
                                                <h2 class="event-title">Maximaal aantal deelnemers!</h2>
                                                Helaas, dit evenement zit aan het maximaal aantal deelnemers, hierdoor kan je je niet meer aanmelden.
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @else
                                    <div class="col-md-12">
                                        <div class="media">
                                            <div class="media-body">
                                                <h2 class="event-title">Je bent op dit moment niet ingelogd!</h2>
                                                <a href="/user/signin"><h5>Klik hier om in te loggen en je aan te melden voor dit evenement.</h5></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection