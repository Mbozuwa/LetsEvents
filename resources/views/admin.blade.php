@extends('layouts.app')
@section('content')
<body>
    <div class="flex-center position-ref full-height" >
        <div class="content col-md-6" style="background-color: white; margin-top: 10px;">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Gebruiker</th>
                    <th>Email</th>
                    <th>Activiteit</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="/activity/{{$user->id}}"><button type="button" class="btn btn-primary">Activiteit</button></a></td>
                    <td><a href="/profile/{{$user->id}}"><i class="fas fa-pencil-alt" style="margin-right: 5px;"></i></a>   <a href=""><i class="fas fa-ban"></i></a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
        <div class="col-md-1" >
            
        </div>
        <div class="col-md-4" style="background-color:white; margin-top: 10px;">
            @if ($activities)
                <h1>Evenementen</h1>
                @foreach($activities as $activity)
                <h3><a href="/event/{{$activity->id}}">{{$activity->name}}</a></h3>
                @endforeach
            @endif

        </div>
        <div class="col-md-1" >
            
        </div>

    </div>
</body>
@endsection
