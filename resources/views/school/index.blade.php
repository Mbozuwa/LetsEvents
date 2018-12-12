@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
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
            <div class="container-fluid">
                <h3 class="page-title">{{ __('msg.school.schools') }}</h3>
                <div class="row">
                @foreach ($schools as $school)
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title"><a href="/school/edit/{{ $school->id }}">{{ $school->name }}</a></h2>
                            </div>
                            <div class="panel-body">
                                <div class="main-info-item">
                                    <span class="title">{{ __('msg.place') }}:</span>
                                    <span class="value">{{ $school->place }}</span>
                                </div>
                                <div class="main-info-item">
                                    <span class="title">{{ __('msg.address') }}:</span>
                                    <span class="value">{{ $school->address }}</span>
                                </div>
                                <a href="/school/edit/{{ $school->id }}">{{ __('msg.school.edit') }}</a>
                                <a onclick="popup('{{ $school->id }}')" href="#">{{ __('msg.school.delete') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <script>
                        function popup(id) {
                            if (confirm("{{ __('msg.school.confirm') }}")) {
                                window.location.href = "/school/delete/" + id;
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
@endsection
