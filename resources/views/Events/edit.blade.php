@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height" >
        {{-- <div class="content" style="background-color: white; padding:10px; margin-right:10px;"> --}}
            <div class="col-lg-6 " style="background-color: white; padding:10px; margin-top:10px; margin-bottom:10px;">
            {{-- {{dd($event)}} --}}
            <form action="{{Route('updateEvent', ['id'=> $event->id])}}" method="POST">
            @csrf
                <div class="form-group">
                    <h2>Naam:</h2><input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Jan Kees" value="{{$event->name}}">
                </div>
                <div class="form-group">
                <h2>Beschrijving:</h2><input type="text" name="description" class="form-control" value="{{$event->description}}">
                </div>
                <div class="form-group">
                <h2>Plaats:</h2><input type="text" name="place" class="form-control" value="{{$event->place}}">
                </div>
                 <div class="form-group">
                    <h2>Het adres: <input type="text" name="address" class="form-control" value="{{$event->address}}">
                </div>
                 <div class="form-group">
                        <h2>Maximum aantal deelnemers:</h2><input type="" name="max_participant" class="form-control" value="{{$event->max_participant}}">
                </div>
                <div class="form-group">
                     <h2>Betaling in euro's:</h2>  <input type="" name="payment" class="form-control"  placeholder="Mag leeg zijn."value="{{$event->payment}}">
               </div>
                <div class="form-group">
                    <h2>Begin tijd:</h2><input type="" name="begin_time" class="form-control" value="{{$correctDate}}">
               </div>
               <div class="form-group">
                      <h2>Eind tijd:</h2><input type="" name="end_time" class="form-control" value="{{$correctDate2}}">
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
              <button type="submit" style="margin-top: 40px;" class="btn btn-primary btn-lg">Bewerken</button>
        </form>
        </div>
    </div>
</div>

</body>
@endsection
