@extends('layouts.guest')

@section('page-title')
    {{$users->name_restaurant}}
@endsection

@section('content')
  <div id="app">

    <div class="wrapper-restaurant">
      <div class="container">

        <!-- info restaurant -->
        <div class="info-restaurant">
          @if(isset($users->image_restaurant))
            <div class="restaurant-image mr-5">
              <img src="{{$users->image_restaurant}}" class="card-img-top" alt="{{$users->name_restaurant}}">
            </div>
          @endif

          <div class="info-text">
              <h3>{{$users->name_restaurant}}</h3>
              <p><span><i class="fas fa-user"></i> </span> {{$users->name}}</p>
              <p><span><i class="fas fa-map-marker-alt"></i> </span> {{$users->address_restaurant}}</p>
              <p><span><i class="fas fa-phone"></i> </span> {{$users->phone_restaurant}}</p>
              @foreach ($users->types as $type)
                <span id="restaurant-types" class="badge badge-primary">{{$type->origin}}</span>
              @endforeach
          </div>

        </div>

      </div>
    </div>
    <div class="container mt-5">

      <div class="restaurant-menu">
        <ul class="list-inline">
          @foreach ($foods as $food)
              <li class="menu-item">
                <p>{{$food->name_food}}</p>
                <span><button @@click="incrementa">+</button></span> 
                <span><button @@click="decrementa">-</button></span> 
                <span> @{{ordine}} </span>
                {{-- <form action="">
                  <span>
                    <select name="" id="" v-model="mainSelect" v-on:change="">
                      @for ($i = 0; $i <= 5; $i++)
                      <option value="">{{$i}}</option>
                      @endfor
                    </select>
                  </span>

                </form> --}}
                
              </li>
          @endforeach
        </ul>
      </div>
      {{-- carrello --}}
        
      {{-- /carrello --}}
    </div>




    {{-- <div id="card" class="card mt-3 mr-3">
      @if(isset($users->image_restaurant))
        <img src="{{$users->image_restaurant}}" class="card-img-top" alt="{{$users->name_restaurant}}">
      @endif
      <div class="restaurant-infos d-inline">
        <div class="card-body">
          <h3>{{$users->name_restaurant}}</h3>
          <p>{{$users->name}}</p>
          <p>{{$users->address_restaurant}}</p>
          <p>{{$users->phone_restaurant}}</p>
        </div>
      </div>
    </div>   --}}
  

  </div>


@endsection