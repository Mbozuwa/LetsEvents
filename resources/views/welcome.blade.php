@extends('layouts.app')
@section('content')
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title" style="color: black;">Welkom, bij de hoofd pagina.</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- BASIC TABLE -->
                            <div class="panel">
                                <div class="panel-body">

                            <div id="calendar"></div>
                                <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
                                <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
                                <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
                        </div>
                    </div>
                </div>
                            <!-- END BASIC TABLE -->
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
@endsection
