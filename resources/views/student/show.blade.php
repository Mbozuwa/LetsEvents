@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <h2>{{$user}}</h2>
    @endif
    <h2>You are not logged in</h2>
@endSection
