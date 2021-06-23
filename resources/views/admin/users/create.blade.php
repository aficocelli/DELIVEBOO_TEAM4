@extends('layouts.admin')

@section('pageTitle')
    {{Auth::user()->name_restaurant}}
@endsection


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






