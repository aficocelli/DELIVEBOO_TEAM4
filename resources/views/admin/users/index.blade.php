@extends('layouts.admin')

@section('pageTitle')
    {{Auth::user()->name_restaurant}}
@endsection

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
 
      <div class=" pl-3 col col-12">
        <div class="mt-3">
          <h1 class="mb-5 mt-5 text-center">Welcome on board <strong class="text-capitalize">{{Auth::user()->name}}</strong></h1>
          <h2 class="mb-3 text-capitalize">{{Auth::user()->name_restaurant}}</h2>
        </div>
          {{-- stampo i types --}}
          @foreach ($user->types as $type)
            <h2 class="d-inline"><span class="badge badge-pill badge-warning">{{$type->origin}}</span></h2>
          @endforeach
          {{-- /stampo i types --}}
      </div>
      <div class=" pt-5 pb-5 row pl-3">
          {{-- colonna immagine --}}
          <div class="col pb-3 col-12 col-lg-4">
            <img src="{{Auth::user()->image_restaurant ? asset('storage/' . Auth::user()->image_restaurant) : 'http://lorempixel.com/400/200/food'}}" alt="{{Auth::user()->name_restaurant}}" style="width: 300px">
          </div>
          
          {{-- colonna text --}}
          <div class=" pb-3 col col-12 col-lg-8">
            <h4 class="mb-3">Phone: <strong>{{Auth::user()->phone_restaurant}}</strong></h4>
            <h4 class="mb-3">Address: <strong class="text-capitalize">{{Auth::user()->address_restaurant}}</strong></h4>
            <h4 class="mb-3">Email: <strong>{{Auth::user()->email}}</strong></h4>
            <h4 class="mb-3">Vat Number: <strong>{{Auth::user()->vat_number}}</strong></h4> 
      </div>
      </div>
          {{-- colonna bottoni --}}
          <div class=" pl-3 col col-lg-12 pb-5">
             <a href="{{route('admin.users.edit', [ 'user' => $user->id ])}}">
              <button type="button" class="btn btn-success">Edit Info Restaurant</button>
              </a>
	            <a href="{{route('admin.foods.create')}}"><button type="button" class="btn btn-warning">Add Foods</button></a>
              @if ($foods->isNotEmpty())
                <a href="{{route('admin.foods.index', [ 'user' => $user->id ])}}">
                  <button type="button" class="btn btn-primary ">Show Foods</button>
                </a>
              @endif 
          </div>
        </div>
      </div>
  </div>


  <div class="container-sm bg-white">
    <h2>Riepilogo ordini</h2>

    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">N. Ordini</th>
        <th scope="col">Ordine Cliente N.</th>
        <th scope="col">Totale</th>
        <th scope="col">Data Ordine</th>
        <th scope="col">Email Cliente</th>
        <th scope="col">Note Cliente</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $key => $order)
    
      <tr>
        <td>{{$key + 1}}</td>
        <td>{{$order->order_id}}</td>
        <td>{{$order->totale}} €</td>
        <td>{{$order->created_at}}</td>
        <td>{{$order->email_guest}}</td>
        <td>{{$order->notes}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection