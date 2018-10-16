@extends('layouts.app')
@section('content')
    @if (count($userEvents) == 0)
        <h2>Nog geen evenementen gemaakt.</h2>
        <h2>Maak <a href="/events/create">hier</a> een evenement aan.</h2>
    @else
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif    
@foreach ($userEvents as $event)



                    {{-- {{dd($event)}} --}}
                    <div class="flex-center position-ref full-height" >
                        <div class="content" style="background-color: white; padding:10px; margin-right:10px; margin-top:10px; margin-bottom:-10px;">
                        <div  style="background-color: white;">
                          <h1>Het evenement: {{$event->name}}</h1>
                          <h2 class="card-text mb-auto">Beschrijving: {{$event->description}}</h2>
                          <h2>Maximum aantal deelnemers: {{$event->max_participant}}</h2>
                          <h3>Begin tijd: @dateFormat($event->begin_time)</h3>
                          <h3>Eind tijd: @dateFormat($event->end_time) </h3>
                          <h3>Adres: {{$event->address}}, {{$event->place}}</h3>
                          {{-- <h3>De categorie:{{$categories->event}}</h3> --}}
                          @if ($event->payment > 0)
                              <h3>De prijs: €{{$event->payment}}</h3>
                          @endif
                          <p>Bekijk meer details: <a href="/event/{{$event->id}}">Event pagina</a></p>
                          <p>Mensen die mee doen: <a href="/events/info/{{$event->id}}">Klik hier</a></p>
                          
                            <button style="margin-top: 40px;" class="btn bg-success btn-lg"><a href="/events/edit/{{$event->id}}"><i class="far fa-edit" style="color:white;"></i></a></button>
                            @if (Auth::check())
                                  <button style="margin-top: 40px;" class="btn bg-danger btn-lg"><a href="/delete/{{$event->id}}"><i class="fas fa-trash-alt" style="color:white;"></i></a></button>
                              
                          @endif
                          <div class="right_float" >

                            <form action="{{action('EventController@saveCategory', $event->id)}}" method="post">
                                {{-- <input type="checkbox" @if (false) checked @endif> --}}
                                @csrf
                                @foreach ($categories as $category)
                                    
                                    @foreach ($category->events as $catEvent)
                                        @if($catEvent->id == $event->id)
                                            <input type="checkbox" id="category_name" name="category_name" value="{{$category->id}}" checked />
                                        @else
                                            <input type="checkbox" id="category_name" name="category_name" value="{{$category->id}}" />
                                        @endif 
                                        
                                    @endforeach
                                    
                           @foreach ($categoryEvents as $catEvents)
                               
                           <input type="checkbox" id="category_name" name="category_name" value="{{$catEvents->id}}" checked="checked" />
                           <label for="category_name">{{ $catEvents->category_id }}</label><br>

                            @endforeach
                           <button type="submit">verzenden</button>
                           
                           </form>


                           {{-- @else --}}
                            
                            
                                    <label for="category_name">{{ $category->name }}</label><br>
                                @endforeach
                                
                                <button type="submit">verzenden</button>
                            
                            </form>
                            {{-- <a href="/events/categories/{{$event->id}}"><i class="fas fa-plus-circle" style="color:green; margin:5px;"></i></a><a href="/categories/{{ $category->id }}">{{ $category->name }}</a><br> --}}
                            
    
                        </div>
                      </div>
                    </div>
                    <br>
                    
                                @endforeach
                            <!-- BASIC TABLE -->
                            {{ $userEvents->links() }}
                        @endif
                    </div>
                </div>
@endsection
