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
              <div class="container__types">
          @foreach ($users->types as $type)
              <span id="restaurant-types" class="badge badge-primary">{{$type->origin}}</span>
          @endforeach
              </div> 
          </div>
          <div class="info-image">
            <img class="image__restaurant" src="{{$users->image_restaurant ? asset('storage/' . $users->image_restaurant) : 'http://lorempixel.com/400/300/food'}}" alt="{{$users->name_restaurant}}">
          </div>         
        </div>
      </div>
    </div>
  
  {{-- /carrello --}}
        <div class="container-cart">
            <div class="cart-title">
              <h2>- Menu -</h2>
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
                  <p id="prezzo_{{$food->id}}">{{$food->price = number_format($food->price, 2)}}</p> 
                  <span class="euro">&euro;</span>
                </div>
                
                {{-- box modifica della quantità del prodotto --}}
                <div id='cart' class="cart__quantity">
                  <button class="qty qty-minus transition" value="{{$food->id}}" @@click="lessOne({{$food->id}})"><i class="fas fa-minus-circle"></i></button>
                  <input  id="{{$food->id}}" class="input_cart" type="number"  v-model="qty" readonly="readonly" name="{{$food->id}}">
                  <button class="qty qty-plus transition" value="{{$food->id}}" @@click="takeOne({{$food->id}})"><i class="fas fa-plus-circle"></i></button>
                </div>
              </div>
            @endforeach
      
            <div class="row-total mt-5">
              <div class="total">
                <p>Totale: </p><span id="totale_price">0</span> Euro
              </div>
            </div>
            <div class="actions text-right">
              
              <a  class="inline-block text-right" href="{{route('guest.order.create')}}"><button id="button-check" class="cart__btn inline-block">Procedi al checkout</button></a>
              
            </div>
        </div>     
 </div>  
  
</div>
<script>
   
  //     window.onload = function() {

  //     var retrievedObject = localStorage.getItem('indexQty');

  //     console.log(retrievedObject);

      

  //     document.getElementsByClassName("input_cart").value = localStorage.getItem(retrievedObject.qty);
  //  };

//   Storage.prototype.getObject = function(key) {
//     return JSON.parse(this.getItem(key));
// }

</script>
                      
@endsection