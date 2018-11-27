@extends('layouts.app')
@section('content')
    <div class="col-9 justify-content-center bg-dark" style="padding-top:10px; padding-right:10px;">
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
            <body>
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">{{ __('msg.event.myParticipatedEvents.title') }}
                    <p class="page-subtitle">{{ __('msg.event.myParticipatedEvents.subtitle1') }} {{ $count }} {{ __('msg.event.myParticipatedEvents.subtitle2') }} {{ $countEvents }} {{ __('msg.event.myParticipatedEvents.subtitle3') }}</p>
                </h3>
                <div class="row">
                    @foreach($registrations as $registration)
                    <div class="col-md-4">
                        <div class="panel myParticipatedEvents">
                            <div class="panel-heading">
                                <h2 class="panel-title"><a href="../event/{{ $registration->event->id }}">{{ $registration->event->name }}</a></h2>
                            </div>
                            <div class="panel-body">
                                <div class="info">
                                    <span class="title">{{ __('msg.event.myParticipatedEvents.date') }}</span>
                                    <span class="info">{{ strftime("%#d %b, %#Y %H:%M", strtotime($registration->event['begin_time'])) }} - {{ strftime("%#d %b, %#Y %H:%M", strtotime($registration->event['end_time'])) }}</span>
                                </div>
                                <div class="info">
                                    <span class="title">{{ __('msg.event.myParticipatedEvents.addressplace') }}</span>
                                    <span class="info">{{ $registration->event->address }}, {{ $registration->event->place }}</span>
                                </div>
                                <div class="info">
                                    <span class="title">{{ __('msg.participantsAmount') }}</span>
                                    <span class="info">{{ App\Registration::where('event_id', $registration->event['id'])->where('status' , "Ik ga")->get()->count() }} / {{ $registration->event->max_participant }}</span>
                                </div>

                                <div class="clearfix"></div>
                                <div class="urlToEvent">
                                    <a href="../event/{{ $registration->event->id }}"><i class="fa fa-eye"></i>{{ __('msg.event.myParticipatedEvents.showevent') }}</a>
                                    <div class="event-status">
                                        @if(strtotime("now") >= strtotime($registration->event['begin_time']) && strtotime("now") <= strtotime($registration->event['end_time']))
                                        <span class="label label-success status">{{ __('msg.event.myParticipatedEvents.now') }}</span>
                                        @elseif(strtotime("now") >= strtotime($registration->event['end_time']))
                                        <span class="label label-default status">{{ __('msg.event.myParticipatedEvents.ended') }}</span>
                                        @else
                                        <span class="label label-info status">{{ __('msg.event.myParticipatedEvents.soon') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
