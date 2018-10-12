@extends('layouts.app')
@section('content')
<div class="main-content">
            <div class="container-fluid">
            @if (count($events) >= 1)
                    <div class="col-md-12" style="margin-top: -25px;">
                        <!-- PAGINATE FUNCTION -->
                        {{ $events->links() }}
                    </div>
@foreach ($events as $event)
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="event-header">
                                <div class="row">
                                    <div class="col-md-7">
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

                                    <a class="btn btn-primary" href="/event/{{ $event['id'] }}"><span>MEER INFO EN DEELNEMEN</span></a>
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
                                                <span class="value">{{ App\Registration::where('event_id', $event['id'])->where('status' , "Ik ga")->get()->count() }}/{{ $event['max_participant'] }}</span>
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
                                        <li>Aantal deelnemers <span>{{ App\Registration::where('event_id', $event['id'])->where('status' , "Ik ga")->get()->count() }}</span></li>
                                        <li>Max. deelnemers <span>{{ $event['max_participant'] }}</span></li>
                                        @if($event['signup_time'] != $event['begin_time'])
                                        <li>Aanmelden kan tot <span>{{ date("d-m-Y H:i", strtotime($event['signup_time'])) }}</span></li>
                                        @else
                                        <li>Aanmelden kan <span>altijd</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
                <h3 class="page-title">Geen evenementen</h3>
                <div class="row">
                    <div class="col-md-11">
                        <div class="panel">
                            <div class="panel-body">
                                Op dit moment zijn er geen evenementen aangemaakt.<br/>
                                <a href="/events/create">Klik hier</a> om een evenement aan te maken.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
@endsection
