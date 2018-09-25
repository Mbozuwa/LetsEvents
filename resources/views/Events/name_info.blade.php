@extends('layouts.app')
@section('content')
@foreach ($event as $info)
<div class="row">
    <div class="col-md-6 textbox" style="float: left;">
          <h1>Het evenement: {{$info->name}}</h1>
          <h2 class="card-text mb-auto">beschrijving: {{$info->description}}</h2>
          <h2>Hoeveel mensen mogen mee doen: {{$info->max_participant}}</h2>
            {{-- <h2>Wie komen er mee:{{$user['id']->user_id}}</h2> --}}
            {{-- $registrations = Registration::where('user_id' , $user['id'])->get(); --}}
            {{-- $username = Registration::where('$user['id'] , 'user_id')->get(); --}}
            
          <h3>Het adres:{{$info->address}},{{$info->place}}</h3>
    </div>
</div>
@endforeach
@endsection