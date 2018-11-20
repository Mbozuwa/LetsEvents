@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">{{__('msg.school.schools')}}</h3>
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
                                                    <span class="title">{{__('msg.school.name')}}:</span>
                                                    <span class="value">{{$school->name}}</span>
                                                </div>
                                                <div class="main-info-item">
                                                    <span class="title">{{__('msg.school.place')}}:</span>
                                                    <span class="value">{{$school->place}}</span>
                                                </div>
                                                <div class="main-info-item">
                                                    <span class="title">{{__('msg.school.address')}}:</span>
                                                    <span class="value">{{$school->address}}</span>
                                                </div>
                                                <a href="/school/edit/{{$school->id}}">{{__('msg.school.edit')}}</a>
                                                <a href="/school/delete/{{$school->id}}">{{__('msg.school.delete')}}</a>
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
