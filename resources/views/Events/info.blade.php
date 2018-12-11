@extends('layouts.app')
@section('content')
    @push('graphBar')
    <!--  EVENT INFO -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    @endpush
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
                <h3 class="page-title">Deelnemers aan dit evenement
                    <p class="page-subtitle"><a href="/event/{{$event->id}}">{{ $event->name }}</a></p>
                </h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <div id="graph" style="height: 250px; width: 70%;"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div id="bar" style="height: 250px; width: 70%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <table class="table table-hover table-striped">
                                   <thead>
                                      <tr>
                                         <th>{{ __('msg.name') }}</th>
                                         <th>{{ __('msg.email') }}</th>
                                         <th>{{ __('msg.telephone') }}</th>
                                         <th>Betalingsstatus</th>
                                         <th></th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                      @foreach ($registered as $value)
                                      <tr>
                                         <td>{{ $value->user->name }}</td>
                                         <td>{{ $value->user->email }}</td>
                                         <td>{{ $value->user->telephone }}</td>
                                         <td>---</td>
                                         <td>
                                            @if($event->payment >= 0 && !empty($event->payment))
                                            <form method="POST" action="{{ action('EventController@sendPaymentReminder') }}">
                                               @csrf   
                                               <input name="userid" type="hidden" value="{{ $value->user->id }}">  
                                               <input name="eventid" type="hidden" value="{{ $event->id }}">      
                                               <input type="submit" class="btn btn-sm btn-primary" value="{{ __('msg.event.info.sendPayReminder') }}">
                                            </form>
                                            @endif
                                         </td>
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
        <script>
            var paid = JSON.parse("{{ json_encode($usersPaid) }}");
            var going = JSON.parse("{{ json_encode($usersGoing) }}");
            var maybe = JSON.parse("{{ json_encode($usersMaybe) }}");
            var notGoing = JSON.parse("{{ json_encode($usersNotGoing) }}");
        </script>
        <script>
            Morris.Donut({
              element: 'graph',
              data: [
                {value: paid, label: 'Betaald'},
                {value: going, label: 'Gaat'},
                {value: maybe, label: 'Gaat Misschien'},
                {value: notGoing, label: 'Gaat Niet'}
              ],
              colors: [
                '#4286f4',
                '#52fc3f',
                '#f4f13d',
                '#e82c29'
              ],
              formatter: function (x) { return x + " gebruiker(s)"}
            });
        </script>
        <script>
            Morris.Bar({
              element: 'bar',
              data: [
                { y: 'Gaat', a: going },
                { y: 'Betaald', a: paid },
              ],
              xkey: 'y',
              ykeys: ['a'],
              labels: ['aantal gebruikers']
            });
        </script>
@endsection
