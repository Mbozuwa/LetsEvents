@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            </div>

            <div class="container-fluid">
                <h3 class="page-title">{{ __('msg.school.schools') }}</h3>
                {{ $schools->links() }}
                <div class="row">
                @foreach ($schools as $school)
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title"><a href="{{ action('SchoolController@edit', ['id' => $school->id]) }}">{{ $school->name }}</a></h2>
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

                                <div style="float:right;">
                                    <a class="btn btn-default btn-xs" href="{{ action('SchoolController@edit', ['id' => $school->id]) }}" role="button">
                                        <i class="fas fa-pencil-alt"></i> {{ __('msg.school.edit') }}
                                    </a>

                                    <form action="{{action('SchoolController@destroy', ['id' => $school->id])}}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('{{ __('msg.school.confirm') }}');" type="submit">
                                            <i class="far fa-trash-alt"></i> {{ __('msg.school.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
@endsection
