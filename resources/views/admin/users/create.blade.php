
@extends('layouts.admin')

@section('pageTitle')
    Inserisci il ristorante
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <form action="{{route('admin.restaurants.store')}}" method="POST">
      
    @csrf
    @method('post')

    <div class="form-group">
        <label for="name_restaurant">Nome del ristorante</label>
        <input type="text" class="form-control" id="name_restaurant" name="name_restaurant" placeholder="nome del ristorante">
    </div>

    <div class="form-group">
        <label for="phone_restaurant">Numero di telefono</label>
        <input type="text" class="form-control" id="phone_restaurant" name="phone_restaurant" placeholder="Numero di telefono">
    </div>

    <div class="form-group">
        <label for="address_restaurant">Indirizzo</label>
        <input class="form-control" type="text" id="address_restaurant" name="address_restaurant" placeholder="Indirizzo">
    </div>
     <div class="form-group">
        <label for="vat_number">p.Iva</label>
        <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="p.Iva">
    </div>

    
    <div class="mt-3">
    <button type="submit" class="btn btn-primary">Crea ristorante</button>
    </div>
  </form>
<div class="mt-5">
    <a href="{{route('admin.restaurants.index')}}">Torna alla lista degli articoli</a>

</div>

@endsection
