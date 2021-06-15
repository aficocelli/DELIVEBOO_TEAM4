@extends('layouts.welcome')

@section('content')
    <div class="container">
      <div class="card mt-3 mr-3" style="width: 15rem;">
            @if(isset($users->image_restaurant))
              <img src="{{$users->image_restaurant}}" class="card-img-top" alt="{{$users->name_restaurant}}">
            @endif
              <div class="card-body">
              <h3>{{$users->name_restaurant}}</h3>
              <p>{{$users->name}}</p>
              <p>{{$users->address_restaurant}}</p>
              <p>{{$users->phone_restaurant}}</p>
            </div>
        </div>
        
    </div>
@endsection