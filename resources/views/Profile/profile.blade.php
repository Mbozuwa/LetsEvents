@include('navbar.navbar')
@include('css.profile')
@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <ul class="nav nav-tabs">
            <h2 role="presentation" class="active"> 
                <a style="margin-right: 40px;" href="#">Profiel</a>
            </h2>
            <h2 role="presentation"><a href="#">Geschiedenis</a></h2>
        </ul>
    </div>

    <div class="row justify-content-around">
            <div class="col-4">
                <h1 class="profile"> Profiel </h1>            
            </div>
            <div class="col-4">
                <img style="height: 40%;" src="http://via.placeholder.com/300?text=Placeholder.com+rocks!"
            </div>
          </div>
    </div>
</div>


@endsection
