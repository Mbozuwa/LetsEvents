@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">{{__('msg.school.makeSchoolTitle')}}</h3>
            <div class="row">
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-body">
                            @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <i class="fa fa-times-circle"></i> {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form action="{{ Route('createSchool') }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                      <label class="h2">{{ __('msg.school.school') }}: *</label>
                                      <input type="text" class="form-control" name="schoolname" placeholder="{{ __('msg.school.school') }}" value="{{ old('schoolname') }}" required/>
                                  </div>
                                  <div class="form-group">
                                      <label class="h2">{{ __('msg.address') }}: *</label>
                                      <input type="text" class="form-control" name="address" placeholder="Naam" value="{{ old('address') }}" required/>
                                  </div>
                                  <div class="form-group">
                                      <label class="h2">{{ __('msg.place') }}: *</label>
                                      <input type="text" class="form-control" name="place" placeholder="{{ __('msg.place') }}" value="{{ old('place') }}" required/>
                                  </div>
                                  {{ csrf_field() }}
                                <span style="float:right;" class="h6">{{ __('msg.event.required') }}</span>
                                <button type="submit" class="btn btn-primary btn-lg" action="">{{__('msg.school.new')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
