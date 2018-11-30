@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
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
            <div class="container-fluid">
                <h3 class="page-title">{{ __('msg.welcome') }}</h3>
                <div class="row">

                    <div class="col-md-5">
                        <div class="panel">
                            <div class="panel-body">
                                <div id="calendar"></div>
                                <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
                                <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
                                <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-body">
                                <table class="table">
                                    <tbody>
                                      <tr>
                                        <td><div class="event-category green"></div></td>
                                        <td>{{ __('msg.event.iGo') }}</td>
                                      </tr>
                                      <tr>
                                        <td><div class="event-category yellow"></div></td>
                                        <td>{{ __('msg.event.iMaybe') }}</td>
                                      </tr>
                                      <tr>
                                        <td><div class="event-category orange"></div></td>
                                        <td>{{ __('msg.event.iDontGo') }}</td>
                                      </tr>
                                      <tr>
                                        <td><div class="event-category blue"></div></td>
                                        <td>{{ __('msg.event.noStatus') }}</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
