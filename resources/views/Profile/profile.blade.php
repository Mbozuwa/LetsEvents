@extends('layouts.app')
@section('content')
@if(Auth::check())
<body class="p">
    <div class="col-9" style="background-color:white;margin-right:50px;margin-top:10px;padding:10px;">
        <div class="col-9 justify-content-center bg-dark">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h1 class="profile">Profiel</h1>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-6 bg-light" style="float=left;">
                    <form action="{{action("ProfileController@update")}}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Naam:</label>
                            <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Jan Kees" value="{{$profile->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail:</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="voorbeeld@gmail.com" value="{{$profile->email}}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Adres:</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" class="form-control" id="inputEmail3" placeholder="Dordrecht" value="{{$profile->address}}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Telefoon:</label>
                            <div class="col-sm-10">
                                <input type="" name="telephone" class="form-control" id="inputEmail3" placeholder="06-12345678" value="{{$profile->telephone}}">
                            </div>
                        </div>
                        
                        <button type="submit" style="margin-top: 40px;" class="btn bg-success btn-lg">Bewerken</button>
                </form>
                </div>
                <div class="col-md-6" style="float-right;">
                <form action="{{action("ProfileController@upload")}}" method="POST" enctype="multipart/form-data">
                    <div class="col-4">
                        {{-- Alert if the image doesn't require the validation --}}
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger">{{$error}}</p>
                                @endforeach
                        @endif

                        <img src="/uploads/{{$profile->image}}" style="max-height:200px;max-width:300px;">
                        <input style="margin-top:30px;" type="file" name="image" id="file">
                        <input type="submit" value="Upload" name="submit">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token"> 
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@else
<div class="container">
    <h1>You are not logged in.</h1>
</div>
@endif
@endsection
