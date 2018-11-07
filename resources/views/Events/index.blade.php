@extends('layouts.app')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        @if (count($events) >= 1)
            <div class="col-md-12">
                <div class="panel" style="padding: 10px;">
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
</div>
        @else
            <h3 class="page-title">Geen evenementen</h3>
            <div class="row">
                <div class="col-md-11">
                    <div class="panel">
                        <div class="panel-body">
                            Op dit moment zijn er geen evenementen aangemaakt.<br/>
                            <a href="/events/create">Klik hier</a> om een evenement aan te maken.
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection
