@extends('layouts.app')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <!-- OVERVIEW -->
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Dashboard</h3>
                <p class="panel-subtitle">You are logged in!</p>
            </div>
        </div>
        <!-- END OVERVIEW -->

        <div class="row">
            <div class="col-md-6">
                <!-- EVENT CALENDAR -->
                <div class="panel">
                    <div class="panel-body">
                        <div id="calendar"></div>
                        <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
                        <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
                        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
                    </div>
                </div>
                <!-- END EVENT CALENDAR -->
            </div>
        </div>
    </div>
</div>
@endsection
