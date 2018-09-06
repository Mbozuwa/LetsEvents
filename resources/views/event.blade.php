@extends('layouts.app')
@section('content')
            <body>
                <div class="flex-center position-ref full-height">
                    <div class="content" style="margin-right: 400px">
                        <h1>{{$event['name']}}</h1>
                        <span>{{$event['begin_time']}} - {{$event['end_time']}}</span>
                        <p>{{$event['description']}}</p>
                        <span>{{$event['place']}} - {{$event['address']}}</span></br>
                        <span>There are {{$event['participant_amount']}} from the {{$event['max_participant']}} students going</span>
                    </div>

                </div>
            </body>
@endsection
