@extends('layouts.app')

@section('content')
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
                                  {{-- <div class="form-group row">
                                  <label for="category" class="col-sm-2 col-form-label">Categorie:</label>
                                  <select name="category_id" id="category_id" class="form-control">
                                  <option value="">Geen</option>
                                       @foreach ($categories as $category)
                                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                                       @endforeach
                                  </select> --}}

                                  {{-- <input id="invisible_id" name="user_id" type="hidden" value="{{ $event->user_id }}"> --}}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-primary btn-lg" action="">Wijzig het evenement</button>
                          </div>
                      </div>
@endsection
