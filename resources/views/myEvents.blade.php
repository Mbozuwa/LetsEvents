@extends('layouts.app')
@section('content')
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Mijn evenementen</h3>
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel">
                            <div class="panel-body">
                                @foreach($registrations as $registration)
                                    <a href="/event/{{$registration->event->id}}"><h2>{{$registration->event->name}}
                                        @if ($date > strtotime($registration->event->end_time))
                                            <span class="badge bg-danger" >Verlopen</span>
                                        @endif</h2></a>
                                    <p>{{$registration->event->description}}</p>
                                    <p>{{$registration->event->place}} - {{$registration->event->address}}</p>

                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        Je gaat/ging naar {{$count}} van de {{$countEvents}} beschikbare evenementen.
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>
@endsection
