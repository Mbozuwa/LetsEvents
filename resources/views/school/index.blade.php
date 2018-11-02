@extends('layouts.app')
@section('content')

<div class="row justify-content-center">

    @foreach ($schools as $school)
<div class="col-md-6">
    <div class="panel">
        <div class="event-header">
            <div class="row">
                <div class="col-md-7">
                    <div class="media">
                        <div class="media-left">
                            <div class="main-info-item">
                                <span class="title">De school:</span>
                                <span class="value">{{$school->name}}</span>
                            </div>
                            <div class="main-info-item">
                                <span class="title">De plaats:</span>
                                <span class="value">{{$school->place}}</span>
                            </div>
                            <div class="main-info-item">
                                <span class="title">Het adres:</span>
                                <span class="value">{{$school->address}}</span>
                            </div>
                                <a href="/school/edit/{{$school->id}}">Edit</a>
                                <a href="/school/delete/{{$school->id}}">Delete</a><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
