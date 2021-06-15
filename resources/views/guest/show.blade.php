
@extends('layouts.app')


@section('content')
    
      <div class="wrapper-header">
        <div class="container">
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
            </div>
          </div>
        </div>
      </div>

      {{-- <div class="menu">
        @foreach ($foods as $food)
            
        @endforeach
      </div> --}}



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