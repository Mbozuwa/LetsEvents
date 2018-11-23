@extends('layouts.app')
@section('content')
    {{-- {{$user}} --}}
    {{-- @if ($student != null) --}}
        {{-- {{dd($student->user->name)}} --}}
    {{-- @endif --}}
    <form class="" action="{{Route('chooseSchool')}}" method="post">
        @csrf
        {{-- <div class="form-group">
            <label class="h2">De beschrijving:</label>
                <select name="school">
                    @foreach ()
                        <option value="{{$school->id}}">{{$school->name}}</option>
                    @endforeach
                </select>
        </div> --}}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-lg">Kies een school</button>
    @endSection
    </form>
