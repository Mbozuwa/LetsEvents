@extends('layouts.app')
@section('content')
            <div class="main-content">
                <div class="container-fluid">
                    <style media="screen">
                        #welcome{
                            color: black;
                        }
                    </style>
                    <h3 class="page-title" id="welcome" style="color = black">Welkom</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- BASIC TABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div id="calendar"></div>
                                            <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
                                            <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
                                            <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
                                        </div>
                                        <div class="col-sm-4" style="color: black;">
                                            <table class="table">
                                                <tbody>
                                                  <tr>
                                                    <td><div class="event-category green"></div></td>
                                                    <td>Ik ga</td>
                                                  </tr>
                                                  <tr>
                                                    <td><div class="event-category yellow"></div></td>
                                                    <td>Ik ga misschien</td>
                                                  </tr>
                                                  <tr>
                                                    <td><div class="event-category orange"></div></td>
                                                    <td>Ik ga niet</td>

                                                  <tr>
                                                    <td><div class="event-category blue"></div></td>
                                                    <td>Geen status</td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                            <!-- END BASIC TABLE -->
                        </div>

                    </div>
                </div>
            </div>
@endsection
