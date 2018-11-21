@extends('layouts.app')
@section('content')
@if(Auth::check())
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">{{__('msg.profile.header')}}</h3>
                <div class="row">
                    <div class="col-md-11">
                        <div class="panel">
                            <div class="panel-body">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                                @endif
                                {{-- <div class="panel">
                                    <div class="panel-body">
                                        {{$profile->id}}
                                    </div>
                                </div> --}}
                                <div class="row justify-content-end">
                                    <div class="col-md-6 bg-light" style="float=left;">
                                        <form action="{{action("ProfileController@update")}}" method="POST">
                                        @csrf
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('msg.profile.name')}}:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Jan Kees" value="{{$profile->name}}">
                                                    <input type="hidden" name="id" class="form-control" value="{{$profile->id}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('msg.profile.email')}}:</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="voorbeeld@gmail.com" value="{{$profile->email}}">
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('msg.profile.address')}}:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="address" class="form-control" id="inputEmail3" placeholder="Dordrecht" value="{{$profile->address}}">
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('msg.profile.phoneNumber')}}:</label>
                                                <div class="col-sm-10">
                                                    <input type="" name="telephone" class="form-control" id="inputEmail3" placeholder="061-2345-678" value="{{$profile->telephone}}">
                                                </div>
                                            </div>
                                            @if($user['role_id'] == 2)
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('msg.profile.type')}}:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="role_id" id="sel1">
                                                        @if ($profile['role_id'] == 2)
                                                            <option value="1">{{__('msg.profile.user')}}</option>
                                                            <option value="2" selected="selected">{{__('msg.profile.admin')}}</option>
                                                        @else
                                                            <option value="1" selected="selected">{{__('msg.profile.user')}}</option>
                                                            <option value="2">{{__('msg.profile.admin')}}</option>
                                                        @endif
                                                  </select>
                                                </div>
                                            </div>
                                            @else
                                                <input type="hidden" value="1" name="role_id">
                                            @endif
                                            <button type="submit" style="margin-top: 40px;color:white;" class="btn bg-success btn-lg">{{__('msg.profile.edit')}}</button>
                                    </form>
                                    @if($user['role_id'] != 2) 
                                    <form class="" action="{{Route('editStudent', ['id' => Auth::user()->id])}}" method="post">
                                        @csrf
                                            <div class="form-group row">
                                                <label for="school" class="col-sm-2 col-form-label">{{__('msg.school.school')}}:</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control d-inline col-8"  name="school">
                                                        @foreach ($schools as $school)
                                                            @php
                                                                $selected='';
                                                            @endphp
                                                            @if ($selectedSchool)
                                                                @foreach ($selectedSchool as $key)
                                                                    @php
                                                                        if ($key['id'] == $school->id) {
                                                                            $selected = 'selected = "selected"';
                                                                        }
                                                                    @endphp
                                                                @endforeach
                                                            @endif
                                                            <option name="school"  value="{{$school->id}}" {{$selected}}>{{$school->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary btn-sm d-inline col-4">Kies</button>
                                            </div>
                                    </form>
                                @endif

                                    {{-- @endif --}}
                                    </div>
                                    <div class="col-md-6" style="float-right;">
                                    <form action="{{action("ProfileController@upload")}}" method="POST" enctype="multipart/form-data">
                                        <div class="col-4">
                                            {{-- Alert if the image doesn't require the correct validation --}}
                                            @if(count($errors)>0)
                                                @foreach($errors->all() as $error)
                                                    <p class="alert alert-danger">{{$error}}</p>
                                                @endforeach
                                            @endif
                                            @if(empty($profile->image))
                                            <img src="/uploads/unknown.png" class="profile-image"/>
                                            @else
                                            <img src="/uploads/{{ $profile->image }}" class="profile-image"/>
                                            @endif
                                            <input style="margin-top:30px;" type="file" name="image" id="file">
                                            <input style="margin-top:10px" type="submit" value="Upload" name="submit">
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                            <p style="margin-top:40px;float:right;">{{__('msg.profile.image')}}</p>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@else
<div class="container">
    <h1>You are not logged in.</h1>
</div>
@endif
@endsection
