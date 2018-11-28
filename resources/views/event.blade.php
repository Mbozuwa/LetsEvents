@extends('layouts.app')
@section('content')
<div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <div class="panel">
                            <div class="event-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="media">
                                            <div class="media-left">
                                                @if(empty($event->image))
                                                <img src="{{ asset('uploads/events/unknown.png') }}" class="event-logo"/>
                                                @else
                                                <img src="{{ asset('uploads/events/'.$event['image'].'') }}" class="event-logo" alt="{{ $event['name'] }}"/>
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h2 class="event-title">{{ $event['name'] }}</h2>
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

                                    @if(Auth::check())
                                        @if(Auth::user()->role_id == 2 || $event['user_id'] == Auth::user()->id)
                                        <div class="col-md-3 text-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ __('msg.event.eventinfo') }} <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    @if(strtotime("now") < strtotime($event['end_time']))
                                                    <li><a href="/events/edit/{{ $event['id'] }}">{{ __('msg.edit') }}</a></li>
                                                    @else
                                                    <li><a style="pointer-events: none;cursor: default;opacity: 0.5;">{{ __('msg.edit') }}</a></li>
                                                    @endif
                                                    <li><a href="../events/info/{{ $event['id' ]}}">{{ __('msg.participants') }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    @endif

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
                                                <span class="value">{{ $count }}/{{ $event['max_participant'] }}</span>
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
                                        <li>{{ __('msg.participantsAmount') }}  <span>{{ $count }}</span></li>
                                        <li>{{ __('msg.participantsMax') }}     <span>{{ $event['max_participant'] }}</span></li>
                                        @if($event['signup_time'] != $event['begin_time'])
                                        <li>{{ __('msg.event.signupTime') }}     <span>{{ date("d-m-Y H:i", strtotime($event['signup_time'])) }}</span></li>
                                        @else
                                        <li>{{ __('msg.event.signupNoTime') }}    <span>{{ __('msg.event.signupAlways') }}</span></li>
                                        @endif

                                        <li><br/>{{ __('msg.event.createdBy') }} {{ $organiser->name }}</li>

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
                                                        <h2 class="event-title">{{ __('msg.event.userStatus') }}</h2>
                                                        @if ($attendence[0]['status'] == "Ik ga")
                                                        <span class="label label-success status"><b>{{ __('msg.event.iGo') }}</b> {{ __('msg.event.tothisevent') }}</span>
                                                        @elseif ($attendence[0]['status'] == "Misschien")
                                                        <span class="label label-warning status"><b>{{ __('msg.event.iMaybe') }}</b> {{ __('msg.event.tothisevent') }}</span>
                                                        @elseif ($attendence[0]['status'] == "Ik ga niet")
                                                        <span class="label label-danger status"><b>{{ __('msg.event.iDontGo') }}</b> {{ __('msg.event.tothisevent') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ strtoupper(__('msg.modify')) }} <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <li name="ga"><a href="/events/updateStatus/{{$event->id}}/Ik ga">{{ __('msg.event.iGo') }}</a></li>
                                                        <li name="mischien"><a href="/events/updateStatus/{{$event->id}}/Misschien">{{ __('msg.event.iMaybe') }}</a></li>
                                                        <li name="niet"><a href="/events/updateStatus/{{$event->id}}/Ik ga niet">{{ __('msg.event.iDontGo') }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h2 class="event-title">{{ __('msg.event.letusknow') }}</h2>
                                                        <a href="/registration/1/{{$event['id']}}" ><button type="button" title="{{ __('msg.event.iGo') }}" class="btn btn-success">V</button></a>
                                                        <a href="/registration/2/{{$event['id']}}" ><button type="button" title="{{ __('msg.event.iMaybe') }}" class="btn btn-warning">?</button></a>
                                                        <a href="/registration/3/{{$event['id']}}" ><button type="button" title="{{ __('msg.event.iDontGo') }}"class="btn btn-danger">X</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="col-md-12">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h2 class="event-title">{{ __('msg.error.event.title1') }}</h2>
                                                    {{ __('msg.error.event.desc1') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="col-md-12">
                                        <div class="media">
                                            <div class="media-body">
                                                <h2 class="event-title">{{ __('msg.error.event.title2') }}</h2>
                                                {{ __('msg.error.event.desc2') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @else
                                    <div class="col-md-12">
                                        <div class="media">
                                            <div class="media-body">
                                                <h2 class="event-title">{{ __('msg.error.event.title3') }}</h2>
                                                <a href="/user/signin"><h5>{{ __('msg.error.event.desc3') }}</h5></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                            <div class="panel">
                                <div class="event-header">
                                    <div class="media">
                                        <div class="media-body" >
                                            <h2 style="margin-top:0px;">Deel: </h2>
                                                                    
                                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            <div class="addthis_inline_share_toolbox"></div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
