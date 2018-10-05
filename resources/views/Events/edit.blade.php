@extends('layouts.app')
@section('content')
    @push('dateTimePicker')
<!-- EVENT CREATE / EDIT -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap-datetimepicker.js') }}"></script>
    @endpush<p>@if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Wijzigen van het evenement</h3>
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel">
                            <div class="panel-body">
                            @if (Auth::id() == $event->user_id)
                                <form action="{{ Route('updateEvent', ['id'=> $event->id]) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="h2">De naam:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Naam" value="{{ $event->name }}" autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">De beschrijving:</label>
                                        <textarea class="form-control" name="description" placeholder="Beschrijving" rows="4" maxlength="420">{{ $event->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">De plaats:</label>
                                        <input type="text" class="form-control" name="place" placeholder="Plaats" value="{{ $event->place }}" autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Het adres:</label>
                                        <input type="text" name="address" class="form-control" placeholder="Adres" value="{{ $event->address }}" autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Maximaal aantal deelnemers:</label>
                                        <input type="text" name="max_participant" class="form-control" placeholder="Max deelnemers" value="{{ $event->max_participant }}" autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Bedrag in euro's:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input name="payment" class="form-control" value="0" type="text" value="{{ $event->payment }}" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Start tijd:</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="begin_time" class="form-control" id="startTime" value="{{ $correctDate }}" placeholder="dd-mm-jjjj --:--" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Eind tijd:</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="end_time" id="endTime" class="form-control" value="{{ $correctDate2 }}" placeholder="dd-mm-jjjj --:--" autocomplete="off"/>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                    <label for="cateogory" class="col-sm-2 col-form-label">Categorie:</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Geen</option>
                                         @foreach ($categories as $category)
                                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                                         @endforeach
                                    </select> --}}

                                    <input id="invisible_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="btn btn-primary btn-lg" action="">Wijzig het evenement</button>
                                    {{ csrf_field() }}
                                </form>
                                @else
                                    <h2>You do not belong here!!!</h2>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $("#startTime").datetimepicker(
                {
                    format: "DD-MM-YYYY HH:mm",
                    minDate: moment().toDate(),
                    locale: "nl"
                });
                $('#endTime').datetimepicker(
                {
                    format: "DD-MM-YYYY HH:mm",
                    minDate: moment().add("d", 1).toDate(),
                    locale: "nl"
                });
                $('#signupTime').datetimepicker(
                {
                    format: "DD-MM-YYYY HH:mm",
                    minDate: moment().subtract("h", 1).toDate(),
                    locale: "nl"
                });
            });
        </script>
@endsection
