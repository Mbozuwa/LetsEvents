@extends('layouts.app')
@section('content')
<body>
    <div class="col-9 justify-content-center bg-dark" style="padding-top:10px; padding-right:10px;">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
        </div>
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
                        <a href="/unban/{{$user->id}}"><i class="far fa-circle"></i></a></td>
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
            <h1>Evenementen</h1>
            <table class="table table-hover">
            @if ($activities)
                @foreach($activities as $activity)
                <tr>
                    <td><a href="/event/{{$activity->id}}">{{$activity->name}}</a></td>
                </tr>
                @endforeach
            @endif
            </table>


                </div>
            </div>
        </div>
    </div>
</body>
@endsection
