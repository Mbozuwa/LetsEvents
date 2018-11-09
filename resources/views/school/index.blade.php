@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Scholen</h3>
                <div class="row">
                @foreach ($schools as $school)
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="row justify-content-end">
                                    <div class="col-md-6">
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
                                                <a href="/school/delete/{{$school->id}}">Delete</a>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
@endsection
