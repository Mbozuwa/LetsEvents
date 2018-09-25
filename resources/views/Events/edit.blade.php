@extends('layouts.app')
@section('content')
    <div class="row justify-content-end">
        <div class="col-md-6 bg-light">
            {{-- {{dd($event)}} --}}
            <form action="{{Route('updateEvent', ['id'=> $event->id])}}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Naam:</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Jan Kees" value="{{$event->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Beschrijving:</label>
                    <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" value="{{$event->description}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Plaats:</label>
                    <div class="col-sm-10">
                        <input type="text" name="place" class="form-control" value="{{$event->place}}">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Adres:</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" value="{{$event->address}}">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Max deelnemers:</label>
                    <div class="col-sm-10">
                        <input type="" name="max_participant" class="form-control" value="{{$event->max_participant}}">
                    </div>
                </div>
                <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Betaling:</label>
                   <div class="col-sm-10">
                       <input type="" name="payment" class="form-control" value="{{$event->payment}}">
                   </div>
               </div>
                <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Begin tijd:</label>
                   <div class="col-sm-10">
                       <input type="" name="begin_time" class="form-control" value="{{$correctDate}}">
                   </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Eind tijd:</label>
                  <div class="col-sm-10">
                      <input type="" name="end_time" class="form-control" value="{{$correctDate2}}">
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

              <input id="invisible_id" name="user_id" type="hidden" value="{{Auth::user()->id}}">
              <button type="submit" style="margin-top: 40px;" class="btn bg-success btn-lg">Bewerken</button>
        </form>
        </div>
    </div>
</div>
</div>
</body>
@endsection
