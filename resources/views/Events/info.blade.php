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
                <h3 class="page-title">Deelnemers aan dit evenement</h3>
                <div class="row">
                    <div class="col-md-11">
                        <div class="panel">
                            <div class="panel-body">
                                @if (Auth::id() == $event->user_id || Auth::user()->role_id)
                                    @if (count($registered) == 0)
                                    <h2>Niemand doet mee aan het evenement<a href="/event/{{$event->id}}"> {{$event->name}}</a></h2>
                                    @else
                                    <h2>Deelnemers van evenement:<a href="/event/{{$event->id}}"> {{$event->name}}</a> </h2>

                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('msg.name') }}</th>
                                                <th>{{ __('msg.email') }}</th>
                                                <th>{{ __('msg.telephone') }}</th>
                                                <th>{{ __('msg.status') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($registered as $value)
                                            <tr>
                                                <td>{{ $value[2][0]['name'] }}</td>
                                                <td>{{ $value[2][0]['email'] }}</td>
                                                <td>{{ $value[2][0]['telephone'] }}</td>
                                                @if($value[1][0]['payment_status'] === 'approved')
                                                    <td>{{ __('msg.paid') }}</td>
                                                @else
                                                    <td>{{ __('msg.notpaid') }}</td>
                                                @endif
                                                
                                                {{-- <td>
                                                    @if($event->payment >= 0 && !empty($event->payment))
                                                    <form method="POST" action="{{ action('EventController@sendPaymentReminder') }}">
                                                      @csrf   
                                                      <input name="userid" type="hidden" value="{{ $value->user->id }}">  
                                                      <input name="eventid" type="hidden" value="{{ $event->id }}">      
                                                      <input type="submit" class="btn btn-sm btn-primary" value="{{ __('msg.event.info.sendPayReminder') }}">
                                                    </form>
                                                    @endif --}}
                                                {{-- </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    @endif
                                @else
                                    <h2>Je hoort hier niet te zijn.</h2>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
