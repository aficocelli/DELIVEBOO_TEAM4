@extends('layouts.app')

@section('content')
    
  <div class="container-sm">
          
    @if (session('message'))
      <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

      <div class="mt-3">
        <h1 class="mb-5 mt-5 text-center">Welcome on board <strong>{{Auth::user()->name}}</strong></h1>
        <h2 class="mb-3">{{Auth::user()->name_restaurant}}</h2>

         {{-- stampo i types --}}
        @foreach ($user->types as $type)
          <h2 class="d-inline"><span class="badge badge-pill badge-warning">{{$type->origin}}</span></h2>
        @endforeach
        {{-- /stampo i types --}}

        <div class="d-flex flex-row mt-5">
          <div class="">
            <img src="{{Auth::user()->image_restaurant ? asset('storage/' . Auth::user()->image_restaurant) : 'http://lorempixel.com/400/200/food'}}" alt="{{Auth::user()->name_restaurant}}" style="width: 300px">
          </div>
          <div class="ml-5">
            <h4 class="mb-3">Phone: <strong>{{Auth::user()->phone_restaurant}}</strong></h4>
            <h4 class="mb-3">Address: <strong>{{Auth::user()->address_restaurant}}</strong></h4>
            <h4 class="mb-3">Email: <strong>{{Auth::user()->email}}</strong></h4>
            <h4 class="mb-3">Vat Number: <strong>{{Auth::user()->vat_number}}</strong></h4>
            <a href="{{route('admin.users.edit', [ 'user' => $user->id ])}}">
              <button type="button" class="btn btn-success">Edit Info Restaurant</button>
            </a>
            <div class="mt-4 d-inline-block">
              @if ($foods->isNotEmpty())
                <a href="{{route('admin.foods.index', [ 'user' => $user->id ])}}">
                  <button type="button" class="btn btn-primary ">Show Foods</button>
                </a>
              @endif 
            </div>
          </div>
        </div>
      </div>
  </div>  
@endsection