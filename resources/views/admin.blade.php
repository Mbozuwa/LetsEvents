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
                    <td><a href="/profile/{{$user->id}}"><i class="fas fa-pencil-alt" style="margin-right: 5px;"></i></a>  
                    @if ($user->active == 1) 
                        <a onclick="popup('{{$user->id}}')"><i class="fas fa-ban"></i></a></td>
                        <script>
                            function popup(id) {
                                if (confirm("Weet u zeker dat u deze gebruiker op non-actief wil zetten?")) {
                                    window.location.href = "/ban/" + id;
                                } else {
                                }
                            }
                        </script>
                    @else
                        <a href="unban/{{$user->id}}"><i class="far fa-circle"></i></a></td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
              <p id="demo"></p>

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
