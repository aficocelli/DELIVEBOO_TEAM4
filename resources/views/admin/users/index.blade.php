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
        <h1 class="mb-5">{{Auth::user()->name_restaurant}}</h1>
        <img class="mb-5" src="{{Auth::user()->image_restaurant ? Auth::user()->image_restaurant : 'https://via.placeholder.com/200'}}" alt="{{Auth::user()->name_restaurant}}" style="width: 100px">
        <h4>Telefono: {{Auth::user()->phone_restaurant}}</h4>
        <h4>Indirizzo: {{Auth::user()->address_restaurant}}</h4>
        <h4>Partita IVA: {{Auth::user()->vat_number}}</h4>
      </div>

      
      <a href="{{route('admin.users.edit', [ 'user' => $user->id ])}}">
        <button type="button" class="btn btn-success ">Modifica</button>
      </a>
          <div class="mt-4 d-inline-block">
        <form action="{{route('admin.users.destroy', [ 'user' => $user->id ])}}" method="POST">
          @csrf
          @method('DELETE')

        <button type="submit" class="btn btn-danger d-inline">Elimina</button>
      </a>
      <a href="{{route('admin.foods.create')}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Aggiungi un nuovo menu</button></a>
     </form>
    
        @if ($foods->isNotEmpty())
        <a href="{{route('admin.foods.index', [ 'user' => $user->id ])}}">
          <button type="button" class="btn btn-primary ">Visualizza il tuo menu</button>
        </a>
            
        @endif
    
         
    

     </div>
    </div>
    
@endsection