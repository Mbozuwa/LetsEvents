@extends('layouts.app')
@section('content')
    {{-- @if (Auth::check()) --}}
    @foreach ($students as $student)
        <h2>Het studenten id is:{{$student->id}}</h2>
        <h2>De gebruiker:{{$student->user->name}}</h2>
        <h2>De school is:{{$student->school->name}}</h2><br>

        @if ($student->user_id == Auth::user()->id)
            <a href="/student/edit/{{$student->user_id}}">Student</a>
        @else
            <a href="/student/show/">Student</a>
        @endif

    @endforeach
    {{-- @foreach ($users as $user)
        <h2>{{$user->student}}</h2>
    @endforeach --}}

    {{-- @endif --}}
@endSection
