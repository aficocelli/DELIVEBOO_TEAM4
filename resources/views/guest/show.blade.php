@extends('layouts.guest')

@section('page-title')
    {{$users->name_restaurant}}
@endsection

@section('content')

<div id="root">
<div class="show-bg">

  <div class="wrapper-restaurant">
      <div class="container">
        <!-- info restaurant -->
        <div class="info-restaurant">
          <div class="info-text">
              <h3 class="info__title">{{$users->name_restaurant}}</h3>
              <p class="info__par"><span><i class="fas fa-map-marker-alt"></i> </span>{{$users->address_restaurant}}</p>
              <p class="info__par"><span><i class="fas fa-phone"></i> </span>{{$users->phone_restaurant}}</p>
          @foreach ($users->types as $type)
              <span id="restaurant-types" class="badge badge-primary">{{$type->origin}}</span>
          @endforeach 
          </div>
          <div class="info-image">
            <img src="{{$users->image_restaurant ? asset('storage/' . $users->image_restaurant) : 'http://lorempixel.com/400/300/food'}}" alt="{{$users->name_restaurant}}">
          </div>
              
        </div>

      </div>
    </div>
  
  {{-- /carrello --}}
  
  
  
  
  
        <div class="container-cart">
            <div class="cart-title">
              <h3>Menu</h3>
            </div>
                      
            @foreach ($users->foods as $food)
                    
              <div class="row__cart">
                  
                  {{-- box immagine del prodotto --}}
                  <div class="product__image">
                    <img class="product__image"  src="{{$food->food_image ? asset('storage/' . $food->food_image) : 'http://lorempixel.com/400/200/food'}}"   alt="">
                  </div>
                  
                  {{-- box informazioni prodotto --}}
                  <div class="product__info">
                     <h4 class="food__name">{{$food->name_food}}</h4>
                     <p class="food__ingredients">{{$food->ingredients}}</p>
                     <p class="food__description">{{$food->description}}</p>
                  </div>
                
                {{-- box del prezze --}}
                <div  class="col__price col-numeric">
                  <p id="prezzo_{{$food->id}}">{{$food->price}}</p> 
                  <span class="euro">&euro;</span>
                </div>
                
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
            <div class="actions text-right">
              <a class="inline-block text-right" href="{{route('guest.order.create')}}"><button class="cart__btn inline-block">Procedi al checkout</button></a>
            </div>
        </div>     
                        
</div> 

</div>
@endsection