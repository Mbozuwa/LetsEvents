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
        @if (count($events) >= 1)
            <div class="col-md-12">
                <div class="panel dataTable">
                <script>
                    $(document).ready( function () {
                        $('#table_id').DataTable({
                          "search": {
                            "search": "{{ $name }}"
                          }
                        });
                    } );
                </script>
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ __('msg.eventtable.name') }}</th>
                            <th>{{ __('msg.eventtable.place') }}</th>
                            <th>{{ __('msg.eventtable.address') }}</th>
                            <th>{{ __('msg.eventtable.maxparticipants') }}</th>
                            <th>{{ __('msg.eventtable.begintime') }}</th>
                            <th>{{ __('msg.eventtable.endtime') }}</th>
                            <th>{{ __('msg.eventtable.eventby') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td><a href="/event/{{ $event->id }}">{{ $event['name'] }}</a></td>
                            <td>{{ $event['place'] }}</td>
                            <td>{{ $event['address'] }}</td>
                            <td>{{ $event['max_participant'] }}</td>
                            <td>@dateFormat($event->begin_time)</td>
                            <td>@dateFormat($event->end_time)</td>
                            <td>{{ $event->user['name'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <h3 class="page-title">{{ __('msg.eventtable.noEvents.title') }}</h3>
        <div class="row">
            <div class="col-md-11">
                <div class="panel">
                    <div class="panel-body">
                        {{ __('msg.eventtable.noEvents.desc1') }}<br/>
                        <a href="/events/create">{{ __('msg.eventtable.noEvents.click') }}</a> {{ __('msg.eventtable.noEvents.desc2') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
