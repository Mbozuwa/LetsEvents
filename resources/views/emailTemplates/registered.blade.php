<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container">
            <img alt="My Image" class="img" src="{{ asset('/assets/img/event-distribution.png')}}" max-width="100%" />
            <div class="centered">
                <h1>Hey {{$user->name}}</h1>
                <h2>{{__('msg.reminder.firstLine')}}</h2>
                <h2>{{__('msg.reminder.secondLine')}}: {{$event->name}}</h2>
                <p>{{__('msg.reminder.description')}}: {{$event->description}}</p>
                @if ($event->payment > 0)
                    <small>{{__('msg.reminder.payment')}}.</small>
                @endif
            </div>

        </div>
    </body>
</html>
