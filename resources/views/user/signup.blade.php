@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1>Registreer</h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
    </div>
    @endif
    <form action="{{ route('user.signup') }}" method="post">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Wachtwoord</label>
        <input type="password" id="password" name="password" class="form-control">
      </div>
      <div class="form-group">
        <label for="name">Naam</label>
        <input type="text" id="name" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="address">Adres</label>
        <input type="text" id="address" name="address" class="form-control">
      </div>
      <div class="form-group">
        <label for="name">Telefoon nummer</label>
        <input type="number" id="telephone" name="telephone" class="form-control">
    </div>
      {{-- <div class="form-group">
        <label for="name">school</label>
        <input type="text" id="school" name="school" class="form-control">
      </div> --}}
      <button type="submit" class="btn btn-primary">Registreer</button>
      {{ csrf_field() }}

  </div>
</div>
</div>
@endsection
