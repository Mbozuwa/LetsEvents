@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <h2>Het studenten id is:{{$student->student_id}}</h2>
    @endif
@endSection
