@extends('layouts.app')
@section('content')
<div class="main-content">
            <div class="container-fluid">
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if (count($events) >= 1)
                <div class="col-md-12" style="margin-top: -25px;">
                    <!-- PAGINATE FUNCTION -->
                    {{ $events->links() }}
                </div>
            </div>
            <div class="row justify-content-center">
                    <a href="/events/madeAll"><button style="background-color:#00A0F0; float:left; margin-left:15px" class="btn bg-primary btn-lg">Show old events</button></a><a href="/events/made"><button style="background-color:#00A0F0; float:left; margin-left:15px" class="btn bg-primary btn-lg">Hide old events</button></a><br><br><br>
                @foreach ($events as $event)
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="event-header">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="media">
                                            <div class="media-left">
                                                @if(empty($event['image']))
                                                    <img src="{{ asset('uploads/events/unknown.png') }}" class="event-logo"/>
                                                @else
                                                    <img src="{{ asset('uploads/events/'.$event['image'].'') }}" class="event-logo" alt="{{ $event['name'] }}"/>
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h2 class="event-title">{{ $event['name'] }}</h2>

                                                @if(Auth::user()->role_id == 2)
                                                    <span class="label label-warning status">ID: {{ $event->id }}</span>
                                                @endif

                                                @if(strtotime("now") >= strtotime($event['begin_time']) && strtotime("now") <= strtotime($event['end_time']))
                                                    <span class="label label-success status">{{ __('msg.event.info.now') }}</span>
                                                @elseif(strtotime("now") >= strtotime($event['end_time']))                                          
                                                    <span class="label label-default status">{{ __('msg.event.info.ended') }}</span>
                                                @else
                                                    <span class="label label-info status">{{ __('msg.event.info.soon') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5 text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ __('msg.event.eventinfo') }} <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                <li><a href="../event/{{ $event['id'] }}">{{ __('msg.event.showevent') }}</a></li>
                                                @if(strtotime("now") < strtotime($event['end_time']))
                                                <li><a href="/events/edit/{{ $event['id'] }}">{{ __('msg.edit') }}</a></li>
                                                @else
                                                <li><a style="pointer-events: none;cursor: default;opacity: 0.5;">{{ __('msg.edit') }}</a></li>
                                                @endif
                                                <li><a href="../events/info/{{ $event['id' ]}}">{{ __('msg.participants') }}</a></li>
                                                <li><a href="../events/categories/{{ $event['id' ]}}">{{ __('msg.categories') }}</a></li>
                                                <li><a href="../events/delete/{{ $event->id }}" style="background-color:#F9354C;color:#FFF;">{{ __('msg.delete') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="event-subheader">
                                    <div class="layout-table event-metrics">
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">{{ __('msg.event.startdate') }}</span>
                                                <span class="value">@dateFormat($event->begin_time)</span>
                                            </div>
                                        </div>
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">{{ __('msg.event.enddate') }}</span>
                                                <span class="value">@dateFormat($event->end_time)</span>
                                            </div>
                                        </div>
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">{{ __('msg.event.regFees') }}</span>
                                                @if(empty($event['payment']))
                                                <span class="value">{{ __('msg.event.regFree') }}</span>
                                                @else 
                                                <span class="value">&euro; {{ $event['payment'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="cell">
                                            <div class="main-info-item">
                                                <span class="title">{{ strtoupper(__('msg.participants')) }}</span>
                                                <span class="value">{{ App\Registration::where('event_id', $event['id'])->where('status' , "Ik ga")->get()->count() }}/{{ $event['max_participant'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="event-info">
                                    <h3 class="info-header">{{ __('msg.event.about') }}</h3>
                                    <p class="event-description">{{ $event['description'] }}</p>
                                </div>
                                <div class="event-info">
                                    <h3 class="info-header">{{ __('msg.event.info') }}</h3>
                                    <ul class="list-unstyled list-justify">
                                        <li>{{ __('msg.address') }}             <span>{{ $event['address'] }}</span></li>
                                        <li>{{ __('msg.place') }}               <span>{{ $event['place'] }}</span></li>
                                        <li>{{ __('msg.participantsAmount') }}  <span>{{ App\Registration::where('event_id', $event['id'])->where('status' , "Ik ga")->get()->count() }}</span></li>
                                        <li>{{ __('msg.participantsMax') }}     <span>{{ $event['max_participant'] }}</span></li>
                                        @if($event['signup_time'] != $event['begin_time'])
                                        <li>{{ __('msg.event.signupTime') }}     <span>{{ date("d-m-Y H:i", strtotime($event['signup_time'])) }}</span></li>
                                        @else
                                        <li>{{ __('msg.event.signupNoTime') }}    <span>{{ __('msg.event.signupAlways') }}</span></li>
                                        @endif

                                    </ul>
                                </div>
                                
                                <a href="/events/info/{{$event->id}}"><button style="margin-top: 40px;" class="btn bg-warning btn-lg"><i class="fas fa-users" style="color:white;"></i></button></a>
                                <a href="/events/categories/{{$event->id}}"><button style="margin-top: 40px;" class="btn bg-primary btn-lg"><i class="fas fa-grip-horizontal" style="color:white;"></i></button></a>
                                <a href="/events/edit/{{$event->id}}"><button style="margin-top: 40px;" class="btn bg-success btn-lg"><i class="far fa-edit" style="color:white;"></i></button></a>
                                @if (Auth::check())
                                <a href="/events/delete/{{$event->id}}"><button style="margin-top: 40px;" class="btn bg-danger btn-lg"><i class="fas fa-trash-alt" style="color:white;"></i></button></a>
                                @endif
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
