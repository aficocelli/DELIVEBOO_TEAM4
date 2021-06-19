<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
        </div>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <title>Document</title>
</head>
<body>
<section id="root">
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

          <div class="row row-operations">
            <div class="col__name col-product product_image">
              <img class="product__image" src="https://via.placeholder.com/150/0000FF/808080 ?Text=Digital.comC/O https://placeholder.com/"  alt="" />
              <p class="cart__par">Pizza</p>
            </div>
            
            <div class="col__name col-price col-numeric">@{{basePrice}}$</div>
            
            <div class="col__name col-qnt">
              <button class="qty qty-minus" @@click="takeOne">-</button>
              <input type="numeric" value="" v-model="qty"/>
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
          <a href="#"><button class="cart__btn">Procedi al checkout</button></a>
          <a href="#"><button class="cart__btn " @@click="calc">Update cart</button></a>
          </div>
      </div>
    </div>


        
      
   </div>
</section>
   <script src="{{asset('js/myScript.js')}}"></script>
</body>
</html>






