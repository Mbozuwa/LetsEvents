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
                <h3 class="page-title">{{ __('msg.event.edit.title') }}</h3>
                <div class="row">
                    <div class="col-md-7">
                        <div class="panel">
                            <div class="panel-body">
                            @if (Auth::id() == $event->user_id || Auth::user()->role_id == 2)
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                  @foreach ($errors->all() as $error)
                                    <p>{{$error}}</p>
                                  @endforeach
                                </div>
                                @endif
                                <form action="{{ Route('updateEvent', ['id'=> $event->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.name') }}: *</label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ __('msg.event.name') }}" value="{{ $event->name }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.desc') }}: *</label>
                                        <textarea class="form-control" name="description" placeholder="{{ __('msg.event.desc') }}" rows="4" maxlength="420" required>{{ $event->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.place') }}: *</label>
                                        <input type="text" class="form-control" name="place" placeholder="{{ __('msg.event.place') }}" value="{{ $event->place }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.address') }}: *</label>
                                        <input type="text" name="address" class="form-control" placeholder="{{ __('msg.event.address') }}" value="{{ $event->address }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.maxparticipants') }}: *</label>
                                        <input type="text" name="max_participant" class="form-control" placeholder="Max deelnemers" value="{{ $event->max_participant }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="h2">{{ __('msg.event.regfees') }}: *</label>
                                       <div class="input-group">
                                           <span class="input-group-addon">&euro;</span>
                                           <input name="payment" class="form-control" type="text" value="{{ $event->payment }}"/>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="h2">{{ __('msg.event.create.startdate') }}: *</label>
                                       <div class="input-group date" style="width:100%;">
                                           <input type="text" name="begin_time" class="form-control" id="startTime" value="{{ date('d-m-Y H:i', strtotime($event->begin_time)) }}" placeholder="dd-mm-jjjj --:--" autocomplete="off"/>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="h2">{{ __('msg.event.create.enddate') }}: *</label>
                                       <div class="input-group date" style="width:100%;">
                                           <input type="text" name="end_time" id="endTime" class="form-control" value="{{ date('d-m-Y H:i', strtotime($event->end_time)) }}"placeholder="dd-mm-jjjj --:--" autocomplete="off"/>
                                       </div>
                                   </div>

                                   {{-- <div class="form-group row">
                                   <label for="category" class="col-sm-2 col-form-label">Categorie:</label>
                                   <select name="category_id" id="category_id" class="form-control">
                                   <option value="">Geen</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                   </select> --}}
                                        <span style="float:right;" class="h6">{{ __('msg.event.required') }}</span>

                                   <input id="invisible_id" name="user_id" type="hidden" value="{{ $event->user_id }}">
                                   {{ csrf_field() }}
                                   <button type="submit" class="btn btn-primary btn-lg" action="">{{ __('msg.event.edit.submit') }}</button>
                               @else
                                   {{ url()->previous() }}
                               @endif
                           </div>
                       </div>
                   </div>

                   <div class="col-md-4">
                       <div class="panel">
                           <div class="panel-heading">
                               <h3 class="panel-title">{{ __('msg.event.image.title') }}</h3>
                           </div>
                               <div class="panel-body">
                                   <input type="file" name="image" id="file" accept="image/*">
                                   <input type="hidden" value="{{ csrf_token() }}" name="_token">
                               </div>
                           </form>
                       </div>
                   </div>

                   @if(!empty($event->image))
                   <div class="col-md-4">
                       <div class="panel">
                           <div class="panel-heading">
                               <h3 class="panel-title">{{ __('msg.event.edit.image.title') }}</h3>
                           </div>
                           <div class="panel-body">
                               <img src="{{ asset('uploads/events/'.$event['image'].'') }}" class="event-logo-edit" alt="{{ $event['name'] }}"/>
                               <span class="event-logo-edit-caption">{{ __('msg.event.edit.image.desc') }}</span>
                           </div>
                       </div>
                   </div>
                   @endif

               </div>
           </div>
       </div>

       <script type="text/javascript">
           $(function () {
               $("#startTime").datetimepicker(
               {
                   format: "DD-MM-YYYY HH:mm",
                   locale: "nl"
               });
               $('#endTime').datetimepicker(
               {
                    format: "DD-MM-YYYY HH:mm",
                    locale: "nl"
                });
            });
        </script>
@endsection
