@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">{{ __('msg.admin') }}</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>{{ __('msg.adm.user') }}</th>
                                    <th>{{ __('msg.adm.email') }}</th>
                                    <th>{{ __('msg.adm.activity') }}</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                  <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="/events/index/{{$user->name}}">
                                            <button type="button" class="btn btn-primary">{{ __('msg.adm.activity') }}</button>
                                        </a>
                                    </td>
                                    <td style="padding-left:0px;">
                                        <a href="/profile/{{$user->id}}">
                                            <i class="fas fa-pencil-alt" style="margin-right: 5px;"></i>
                                        </a>
                                    @if ($user->active == 1)
                                        <a onclick="popup('{{$user->id}}')">
                                            <i class="fas fa-ban"></i>
                                        </a>
                                    </td>
                                        <script>
                                            function popup(id) {
                                                if (confirm("{{ __('msg.adm.confirm') }}")) {
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
                </div>
            </div>
        </div>
@endsection
