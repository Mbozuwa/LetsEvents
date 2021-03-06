@extends('layouts.app')
@section('content')
    @push('dateTimePicker')
<!-- EVENT CREATE / EDIT -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap-datetimepicker.js') }}"></script>
    @endpush
    <div class="col-9 justify-content-center bg-dark" style="padding-top:10px; padding-right:10px;">
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
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">{{ __('msg.event.create.title') }}</h3>
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
                                <form action="{{ action('EventController@create') }}" method="post" enctype="multipart/form-data" name="form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.name') }}: *</label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ __('msg.event.name') }}" id="input" value="{{ old('name') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.desc') }}: *</label>
                                        <textarea class="form-control" name="description" placeholder="{{ __('msg.event.desc') }}" rows="4" maxlength="420" id="input" required/>{{ old('description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.place') }}: *</label>
                                        <input type="text" class="form-control" name="place" placeholder="{{ __('msg.event.place') }}" id="input" value="{{ old('place') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.address') }}: *</label>
                                        <input type="text" name="address" class="form-control" placeholder="{{ __('msg.event.address') }}" id="input" value="{{ old('address') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.maxparticipants') }}: *</label>
                                        <input type="text" name="max_participant" class="form-control" placeholder="{{ __('msg.event.maxparticipants') }}" id="input" value="{{ old('max_participant') }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.regfees') }}: *</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input  id="regFees" name="payment" class="form-control" placeholder="{{ __('msg.event.regfees') }}" value="{{ old('payment') }}" type="text"/>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group" id="reminderDays"></div>
                                        <script type="text/javascript">
                                            $('#regFees').on('change', function() {
                                                if(parseInt(this.value.replace(/,/g, '.') * 100) > 0){
                                                    $('#reminderDays').html('<label class="h2">{{ __('msg.event.paymentreminder') }}: *</label><div class="input-group"><span class="input-group-addon"><i class="fab fa-paypal"></i></span><input type="number" min="1" name="payreminder" class="form-control" placeholder="{{ __('msg.event.paymentreminder.days') }}" id="input" value=""/></div><span class="h6">{{ __('msg.event.paymentreminder.info') }}</span>');
                                                }else{
                                                    $('#reminderDays').html('');
                                                }
                                                });
                                        </script> --}}

                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.create.startdate') }}: *</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="begin_time" class="form-control" id="startTime" placeholder="dd-mm-jjjj --:--"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.create.enddate') }}: *</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="end_time" id="endTime" class="form-control" placeholder="dd-mm-jjjj --:--"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.signupTime') }}:</label>
                                        <div class="input-group date" style="width:100%;">
                                            <input type="text" name="signup_time" id="signupTime" class="form-control" placeholder="dd-mm-jjjj --:--" autocomplete="off"/>
                                        </div>
                                        <br>
                                        <span class="h6">{{ __('msg.event.create.signupNoTime') }}</span>
                                        <span style="float:right;" class="h6">{{ __('msg.event.required') }}</span>
                                    </div>
                                    {{ csrf_field() }}
                                    <button type="submit" class="inputCheckBtn btn btn-primary btn-lg" onclick="inputCheck()">{{ __('msg.event.create.submit') }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ __('msg.event.image.title') }}</h3>
                            </div>
                                <div class="panel-body">
                                    <input type="file" name="image" id="file" accept="image/*" required/>
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
                    minDate: moment().add(1, "h").toDate(),
                    locale: "nl"
                });
                $('#signupTime').datetimepicker(
                {
                    format: "DD-MM-YYYY HH:mm",
                    locale: "nl"
                });
            });
            function inputCheck() {
                $('form').submit(function() {
                  $('button.btn-primary').prop("disabled", "disabled");
                })
                var returnValue = true;

                jQuery("input").each(function(){
                    if(jQuery(this).attr("required")){
                        if(jQuery(this).val().length <= 0){
                            // jQuery(this).css("border", "1px solid red").css("background-color", "#ffcccc");
                            returnValue = false;
                        }
                    }
                })
                jQuery("textarea").each(function() {
                    if(jQuery(this).attr("required")) {
                        if(jQuery(this).val().length <= 0) {
                            // jQuery(this).css("border", "1px solid red").css("background-color", "#ffcccc");
                            returnValue = false;
                        }
                    }
                })
                // jQuery("#file").each(function() {
                //         if (jQuery(this).val() == null) {
                //             returnValue = false;
                //             console.log('foto');
                //         }
                // })
                if(!returnValue){
                    $('button.btn-primary').prop("disabled", false);
                }

                return returnValue;
            }
        </script>
@endsection
