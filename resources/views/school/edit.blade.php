@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">{{__('msg.school.editSchoolTitle')}}</h3>
            <div class="row">
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-body">
                            <form action="{{ Route('updateSchool', ['id'=> $school->id]) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                      <label class="h2">{{__('msg.school.school')}}:</label>
                                      <input type="text" class="form-control" name="name" placeholder="Naam" value="{{ $school->name }}" required/>
                                  </div>
                                  <div class="form-group">
                                      <label class="h2">{{__('msg.school.place')}}:</label>
                                      <input type="text" class="form-control" name="place" placeholder="Naam" value="{{ $school->place }}" required/>
                                  </div>
                                  <div class="form-group">
                                      <label class="h2">{{__('msg.school.address')}}:</label>
                                      <input type="text" class="form-control" name="address" placeholder="Naam" value="{{ $school->address }}" required/>
                                  </div>
                                  {{ csrf_field() }}
                              <button type="submit" class="btn btn-primary btn-lg" action="">{{__('msg.school.editSchool')}}</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

                  </form>
@endsection
