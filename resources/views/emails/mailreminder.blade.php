@component('mail::layout')
    @slot('header')
       @component('mail::header', ['url' => config('ao-letsevent.url')])
           Lets Event
       @endcomponent
   @endslot
<div class="centered">
    <p>Hey {{ $user->name }},</p>
    <p>Je ontvangt deze e-mail omdat uit onze administratie gebleken is dat je betaling voor het evenement: "<b>{{ $event->name }}</b>" nog niet is voldaan en je hierdoor nog niet volledig staat geregistreerd voor dit evenement.</p>

    <p>Wij verzoeken je vriendelijk het openstaande bedrag van <b>&euro; {{ $event->payment }}</b> alsnog aan ons over te maken.</p>

	@component('mail::button', ['url' => config('app.url').'/event/'.$event->id])
	Inschrijfkosten betalen
	@endcomponent

    <p>Met vriendelijke groet,<br/>Lets Event</p>
</div>
@slot('footer')
       @component('mail::footer')
           &copy; {{ date('Y') }} - AO-LetsEvent
       @endcomponent
   @endslot
@endcomponent