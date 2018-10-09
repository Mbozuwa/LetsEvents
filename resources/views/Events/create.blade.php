@extends('layouts.app')
@section('content')
    @push('dateTimePicker')
<!-- EVENT CREATE / EDIT -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap-datetimepicker.js') }}"></script>
    @endpush
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Maak een evenement aan</h3>
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel">
                            <div class="panel-body">
                                @if(count($errors)>0)
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <i class="fa fa-times-circle"></i> {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                <form action="{{ action('EventController@create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="h2">De naam: *</label>
                                        <input type="text" class="form-control" name="name" placeholder="Naam" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">De beschrijving: *</label>
                                        <textarea class="form-control" name="description" placeholder="Beschrijving" rows="4" maxlength="420" required/></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">De plaats: *</label>
                                        <input type="text" class="form-control" name="place" placeholder="Plaats" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Het adres: *</label>
                                        <input type="text" name="address" class="form-control" placeholder="Adres" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Maximaal aantal deelnemers: *</label>
                                        <input type="text" name="max_participant" class="form-control" placeholder="Max deelnemers" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Bedrag in euro's: *</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input name="payment" class="form-control" value="0" type="text"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Start tijd: *</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="begin_time" class="form-control" id="startTime" placeholder="dd-mm-jjjj --:--" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Eind tijd: *</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="end_time" id="endTime" class="form-control" placeholder="dd-mm-jjjj --:--" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">Max aanmeld tijd:</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="signup_time" id="signupTime" class="form-control" placeholder="dd-mm-jjjj --:--" autocomplete="off"/>
                                        </div>
                                        <br>
                                        <span class="h6">Dit veld leeghouden als deelnemers zich altijd mogen aanmelden.</span>
                                        <span style="float:right;" class="h6">Dit is verplicht *</span>
                                    </div>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary btn-lg" action="">Maak een evenement aan.</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Afbeeldingen uploaden voor evenement</h3>
                            </div>
                                <div class="panel-body">
                                    <input type="file" name="image" id="file" accept="image/*">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token"> 
                                </div>
                            </form>
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
                    minDate: moment().add("h", 1).toDate(),
                    locale: "nl"
                });
                $('#signupTime').datetimepicker(
                {
                    format: "DD-MM-YYYY HH:mm",
                    locale: "nl"
                });
            });
        </script>
@endsection
