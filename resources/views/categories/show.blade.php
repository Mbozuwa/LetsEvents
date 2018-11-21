@extends('layouts.app')
@section('content')
@if(Auth::check())
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">{{$category->name}}</h3>
            <div class="row">
                <div class="col-md-11">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row justify-content-end">
                                <div class="col-md-12 bg-light" style="float=left;">
                                  <table class="table table-hover table-condensed">
                                    <thead>
                                      <tr>
                                        <th>Evenement naam</th>
                                        <th>Plaats - Adres</th>
                                        <th>Max. deelnemers</th>
                                        <th>Begin tijd</th>
                                        <th>Eind tijd</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($events as $event)
                                      <tr>
                                        <td><a href="/event/{{$event->id}}">{{$event->name}}</a></td>
                                        <td>{{$event->place}} - {{$event->address}}</td>
                                        <td>{{$event->max_participant}}</td>
                                        <td>@dateFormat($event->begin_time)</td>
                                        <td>@dateFormat($event->end_time)</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="container">
    <h1>You are not logged in.</h1>
</div>
@endif
@endsection