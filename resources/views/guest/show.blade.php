@extends('layouts.guest')

@section('page-title')
    {{$users->name_restaurant}}
@endsection

@section('content')
  
<div id="root">

  <div class="wrapper-restaurant">
      <div class="container">

        <!-- info restaurant -->
        <div class="info-restaurant">
          <div class="info-text">
              <h3>{{$users->name_restaurant}}</h3>
              <p><span><i class="fas fa-user"></i> </span> {{$users->name}}</p>
              <p><span><i class="fas fa-map-marker-alt"></i> </span>{{$users->adress_restaurant}}</p>
              <p><span><i class="fas fa-phone"></i> </span>{{$users->phone_restaurant}}</p>
          @foreach ($users->types as $type)
              <span id="restaurant-types" class="badge badge-primary">{{$type->origin}}</span>
          @endforeach 
        </div>

      </div>
    </div>
  
  {{-- /carrello --}}
  
  
  
  
  
        <div class="container-cart">

                      
            @foreach ($users->foods as $food)
                    
              <div class="row__cart">
                  
                  {{-- box immagine del prodotto --}}
                  <div class="product__image">
                    <img class="product__image"  src="http://127.0.0.1:8000/storage/images/jN5x3YylQzSibL2OwYHhB1JqEQFowEUK7jtmd8Dx.jpg"   alt="">
                  </div>
                  
                  {{-- box informazioni prodotto --}}
                  <div class="product__info">
                     <h4 class="food__name">{{$food->name_food}}</h4>
                     <p class="food__ingredients">{{$food->ingredients}}</p>
                     <small class="food__description">{{$food->description}}</small>
                  </div>
                
                {{-- box del prezze --}}
                <div  class="col__price col-numeric"><p id="prezzo_{{$food->id}}">{{$food->price}}</p> <span class="euro">&euro;</span></div>
                
                {{-- box modifica della quantità del prodotto --}}
                <div class="cart__quantity">
                  <button class="qty qty-minus" value="{{$food->id}}" @@click="lessOne({{$food->id}})">-</button>
                  <input  id="{{$food->id}}" class="input_cart" type="text" value="qty" v-model="qty" readonly="readonly">
                  <button class="qty qty-plus" value="{{$food->id}}" @@click="takeOne({{$food->id}})">+</button>
                </div>
              </div>
            @endforeach
      
            <div class="row-total">
              <div class="total">
                <p>Totale: </p><span id="totale_price">0</span> Euro
              </div>
            </div>
            <div class="actions text-center">
            <a class="inline-block" href="{{route('guest.order.create')}}"><button class="cart__btn inline-block">Procedi al checkout</button></a>
            </div>
        </div>     
                        
  </div> 


@endsection