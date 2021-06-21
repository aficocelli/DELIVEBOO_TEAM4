@extends('layouts.guest')

@section('page-title')
    {{$users->name_restaurant}}
@endsection

@section('content')
  <div id="">
  
    <div class="wrapper-restaurant">
      <div class="container">

        <!-- info restaurant -->
        <div class="info-restaurant">
          @if(isset($users->image_restaurant))
            <div class="restaurant-image mr-5">
              <img src="{{'http://127.0.0.1:8000/storage/' . $users->image_restaurant}}" class="card-img-top" alt="{{$users->name_restaurant}}" style="width: 500px;">
            </div>
          @endif

          <div class="info-text">
              <h3>{{$users->name_restaurant}}</h3>
              <p><span><i class="fas fa-user"></i> </span> {{$users->name}}</p>
              <p><span><i class="fas fa-map-marker-alt"></i> </span> {{$users->address_restaurant}}</p>
              <p><span><i class="fas fa-phone"></i> </span> {{$users->phone_restaurant}}</p>
              @foreach ($users->types as $type)
                <span id="restaurant-types" class="badge badge-primary">{{$type->origin}}</span>
              @endforeach
          </div>

        </div>

      </div>
    </div>
     <div class="container mt-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Prodotto</th>
                <th scope="col">Immagine</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Descrizione</th>
              </tr>
            </thead>
            <tbody>
        @foreach ($users->foods as $food)
        <tr>
          <td><h5>{{$food->name_food}}</h5></td>
          <td><img class="" src="{{'http://127.0.0.1:8000/storage/' . $food->food_image}}" style="max-width: 100px"></td>
          <td><h5>{{$food->price}}</h5></td>
          <td><h5>{{$food->description}}</h5></td>
        </tr>
        @endforeach
       </tbody>
      </table>
   
      {{-- <div class="restaurant-menu">
        <ul class="list-inline">
            @foreach ($users->foods as $food)
              <li class="menu_item">
                <h4>{{$food->name_food}}</h4>
                <div><img src="{{'http://127.0.0.1:8000/storage/' . $food->food_image}}"></div>
                
                <h4>{{$food->price}}</h4>
                
              </li>
            @endforeach
        </ul>
      </div> --}}
      
    <section>
        

        {{-- carrello --}}
    <aside v-if="!show">
        <div class="container-cart">
            {{-- corpo del carrello --}}
            <div class="cart-body">
              <div class="cart-header">
                <h1 class="main__title">Dropfood</h1>
                <div class="show__hide">X</div>
              </div>
              <div class="cart-main">
                <div class="row row-names">
                  <div class="col__name col-product">Prodotto</div>
                  <div class="col__name col-price">Prezzo</div>
                  <div class="col__name col-qnt">Quantità</div>
                </div>  

                @foreach ($users->foods as $food)
                <div class="row row-operations">
                  
                  <div class="col__name col-product product_image">
                    <img class="product__image" src="{{$food->food_image}}"  alt="">
                    <p class="cart__par">{{$food->name_food}}</p>
                  </div>
                  
                  <div  class="col__name col-price col-numeric"><p id="prezzo_{{$food->id}}">{{$food->price}}</p>  E</div>
                  <div class="col__name col-qnt">
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
                {{-- bottoni --}}
                <div class="actions text-center">
                <a class="inline-block" href="{{route('guest.order.create')}}"><button class="cart__btn inline-block ">Procedi al checkout</button></a>
                {{-- <a href=""><button class="cart__btn " @@click="calc">Update cart</button></a> --}}
                </div>
            </div>
          </div>   
        </div>
    </aside>
    </section>
    </div>
    {{-- /carrello --}}




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