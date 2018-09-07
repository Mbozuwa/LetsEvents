@include('navbar.navbar')
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/style_alex.css') }}">
@section('content')
@if(Auth::check())
<body class="p">
    <div class="col-md-12">
        {{-- <div class="row justify-content-center">
            <h2 role="presentation"><a class="profile" href="#">Profiel </a></h2>
            <h2 role="presentation"><a class="profile" href="#">Geschiedenis</a></h2> --}}
        {{-- </div> --}}
        <div class="col-9 justify-content-center bg-dark">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h1 class="profile"> Profiel</h1>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-6 bg-light">
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label">adres:</label>
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

                <div class="col-4">
                    <img src="http://suryanation.id/assets/img/profiels/unknown.png">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <form>
                    <div class="form-group">
                        <input style="float:right;margin-right:280;"type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
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
