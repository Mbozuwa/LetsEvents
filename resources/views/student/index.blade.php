@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <h2>{{$student->student_id}}</h2>
    @endif
@endSection
