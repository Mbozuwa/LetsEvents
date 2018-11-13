@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Wijzigen van het evenement</h3>
            <div class="row">
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-body">
                            <form action="{{ Route('updateSchool', ['id'=> $school->id]) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                      <label class="h2">De school:</label>
                                      <input type="text" class="form-control" name="name" placeholder="Naam" value="{{ $school->name }}" required/>
                                  </div>
                                  <div class="form-group">
                                      <label class="h2">De plaats:</label>
                                      <input type="text" class="form-control" name="place" placeholder="Naam" value="{{ $school->place }}" required/>
                                  </div>
                                  <div class="form-group">
                                      <label class="h2">Het adres:</label>
                                      <input type="text" class="form-control" name="address" placeholder="Naam" value="{{ $school->address }}" required/>
                                  </div>
                                  {{ csrf_field() }}
                              <button type="submit" class="btn btn-primary btn-lg" action="">Wijzig het evenement</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

                  </form>
@endsection
