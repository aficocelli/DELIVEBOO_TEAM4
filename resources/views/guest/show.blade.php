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
              <img src="{{'http://127.0.0.1:8000/storage/' . $users->image_restaurant}}" class="card-img-top" alt="{{$users->name_restaurant}}">
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
      <div class="restaurant-menu">
        <ul class="list-inline">
          @foreach ($foods as $food)
              <li class="menu_item">
                <p class="menu_text">{{$food->name_food}}</p>
                <button class="btn_contatore mr-2 ml-2" @@click="incrementa"><i class="fas fa-plus-circle"></i></button>
                <button class="btn_contatore mr-2" @@click="decrementa"><i class="fas fa-minus-circle"></i></button> 
                <p class="menu_text">@{{ordine}}</p>
                {{-- <form action="">
                  <span>
                    <select name="" id="" v-model="mainSelect" v-on:change="">
                      @for ($i = 0; $i <= 5; $i++)
                      <option value="">{{$i}}</option>
                      @endfor
                    </select>
                  </span>

                </form> --}}
                
              </li>
          @endforeach
        </ul>
      </div>
      
      <section>
        
      <aside v-if="!show">
        <div class="container-cart >
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

                <div class="row row-operations">
                  <div class="col__name col-product product_image">
                    <img class="product__image" src="https://via.placeholder.com/150/0000FF/808080 ?Text=Digital.comC/O https://placeholder.com/"  alt="" />
                    <p class="cart__par">Pizza</p>
                  </div>
                  
                  <div class="col__name col-price col-numeric">@{{basePrice}}$</div>
                  
                  <div class="col__name col-qnt">
                    <button class="qty qty-minus" @@click="takeOne">-</button>
                    <input class="input_cart" type="numeric" value="" v-model="qty"/>
                    <button class="qty qty-plus" @@click="addOne">+</button>
                  </div>

                </div>
                <div class="row-total">
                    <div class="total">
                        <p>Total: @{{total}} $</p>
                    </div>
                </div>
                {{-- bottoni --}}
                <div class="actions">
                <a href="{{route('guest.order.create')}}"><button class="cart__btn">Procedi al checkout</button></a>
                <a href=""><button class="cart__btn " @@click="calc">Update cart</button></a>
                </div>
            </div>
          </div>    
        </div>
      </section>
    </div>
    </aside>




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