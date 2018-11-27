@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">{{ $category->name }}</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="padding: 10px;">
                        <script>
                            $(document).ready( function () {
                                $('#eventsInCategory').DataTable({
                                });
                            } );
                        </script>
                        <table id="eventsInCategory" class="display">
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
    </div>
@endsection