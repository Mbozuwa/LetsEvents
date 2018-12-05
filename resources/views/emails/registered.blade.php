@component('mail::layout')
    @slot('header')
       @component('mail::header', ['url' => config('ao-letsevent.url')])
           Lets-event
       @endcomponent
   @endslot
    ![Event]({{ asset('/assets/img/event-distribution.png')}})

<div class="centered">
    {{-- <img alt="My Image" class="img" src="{{ asset('/assets/img/event-distribution.png')}}" max-width="100%" /> --}}
    <h2>Hey {{$user->name}},</h2>
    <h2>{{__('msg.reminder.firstLine')}} {{$event->name}}!</h2>
    {{-- <p>{{__('msg.reminder.description')}}: {{$event->description}}</p> --}}
    {{-- <p>{{__('msg.event.startdate')}}: @dateFormat($event->begin_time)</p>
    <p>{{__('msg.event.enddate')}}: @dateFormat($event->end_time)</p> --}}
    <p>Datum: @dateFormat($event->begin_time) t/m @dateFormat($event->end_time)</p>
    @if ($event->payment > 0)
        <small>{{__('msg.reminder.payment')}}: €{{$event->payment}}.</small>
    @endif
</div>
@slot('footer')
       @component('mail::footer')
           © {{ date('Y') }} - Ao-letsevent
       @endcomponent
   @endslot
@endcomponent
{{-- ![Benjamin Bannekat](https://octodex.github.com/images/bannekat.png) --}}
