@extends('layouts.app')
@section('content')
<<<<<<< HEAD
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
=======
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Welkom</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- BASIC TABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                </div>
                            </div>
                            <div id="calendar"></div>
                                <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
                                <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
                                <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

                        </div>
                            <!-- END BASIC TABLE -->
                        </div>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">-</h3>
                                </div>
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <body>
                <div class="flex-center position-ref full-height">
                    <div class="content" style="margin-right: 400px">
                        <div class="title m-b-md">
                            Let's Event
                        </div>

                </div>
            </body>
>>>>>>> 91d39561c1a86d84e3ed171b95777a4d62823af2
@endsection
