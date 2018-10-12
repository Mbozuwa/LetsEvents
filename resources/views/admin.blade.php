@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Admin beheer</h3>
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel">
                            <div class="panel-body">
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
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Evenementen</h3>
                            </div>
                                <div class="panel-body">
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
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
