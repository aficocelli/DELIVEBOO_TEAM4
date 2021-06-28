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
 
      <div class=" pl-3 col col-12 text-center mb-5">
        <div class="mt-3 text-center">
          <h2 class="mb-5 mt-5 text-center text-capitalize" >Welcome on board {{Auth::user()->name}}</h2>
          <h1 class="mb-1 text-capitalize" style="font-family: Permanent Marker, cursive; font-size: 40px;" >{{Auth::user()->name_restaurant}}</h1>
          @foreach ($user->types as $type)
            <h2 class="d-inline "><span class="badge badge-primary" style="background-color: #ff9900; font-size: 16px;" >{{$type->origin}}</span></h2>
          @endforeach
        </div>
          {{-- stampo i types --}}
          {{-- /stampo i types --}}
      </div>
      <div class=" d-flex justify-content-around flex-wrap pb-5 bg-white shadow" style="border-radius: 50px;">
          {{-- colonna immagine --}}
        <div class="mt-3">
          <img src="{{Auth::user()->image_restaurant ? asset('storage/' . Auth::user()->image_restaurant) : 'http://lorempixel.com/400/200/food'}}" alt="{{Auth::user()->name_restaurant}}" style="width: 400px; border-radius: 20px;">
        </div>
          
          {{-- colonna text --}}
        <div class="text-right mt-5 pt-3">
          <h4 class="mb-3">Phone: <strong>{{Auth::user()->phone_restaurant}}</strong></h4>
          <h4 class="mb-3">Address: <strong class="text-capitalize">{{Auth::user()->address_restaurant}}</strong></h4>
          <h4 class="mb-3">Email: <strong>{{Auth::user()->email}}</strong></h4>
          <h4 class="mb-3">Vat Number: <strong>{{Auth::user()->vat_number}}</strong></h4> 
        </div>
      </div>
      <div class="pb-3 text-center mt-5">
        <a class="text-decoration-none" href="{{route('admin.users.edit', [ 'user' => $user->id ])}}">
          <button type="button" class="btn btn-success mb-3 p-2 border border-light rounded-pill"">Edit Restaurant</button>
        </a>
        <a  href="{{route('admin.foods.create')}}"><button type="button" class="btn btn-warning mb-3 p-2 border border-light rounded-pill"">Add Foods</button></a>
          @if ($foods->isNotEmpty())
          <a class="text-decoration-none" href="{{route('admin.foods.index', [ 'user' => $user->id ])}}">
            <button type="button" class="btn btn-primary mb-3 p-2 border border-light rounded-pill" ">Show Foods</button>
          </a>
          @endif 
      </div>
          {{-- colonna bottoni --}}
    </div>


  <div class="container-sm bg-white table-responsive-sm p-5 shadow" style=" border-radius: 50px;">
    <h2 class="text-center mb-5" style="font-family: Permanent Marker, cursive;">Orders Received</h2>

    <table class="table table-hover container bg-white pl-3 table-warning">
      <thead>
        <tr>
          <th class="table-warning" scope="col">Id Order</th>
          <th class="table-warning" scope="col">Id Customer Order</th>
          <th class="table-warning" scope="col">Total</th>
          <th class="table-warning" scope="col">Date</th>
          <th class="table-warning" scope="col">Email</th>
          <th class="table-warning" scope="col">Notes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $key => $order)
        <tr>
          <td >{{$key + 1}}</td>
          <td>{{$order->order_id}}</td>
          <td>{{$order->totale}} €</td>
          <td>{{$order->created_at}}</td>
          <td>{{$order->email_guest}}</td>
          <td>{{$order->notes}}</td>
        </tr>
        @endforeach
        <tr>
          <td> <strong>Overall:</strong></td>
          <td></td>
          <td> <strong>{{$total}} €</strong></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection