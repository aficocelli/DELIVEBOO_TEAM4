<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <title>Document</title>
</head>
<body>
    <section id="root">
    <div class="pre-checkout">
     <div class="container">
  <div class="heading">
    <h1>
      <span class="shopper">s</span> Shopping Cart
    </h1>
    
    <a href="#" class="visibility-cart transition is-open">X</a>    
  </div>
  
  <div class="cart transition is-open">
  
  
    
    <div class="table">
      
      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center "> 
          Price
        </div>
        <div class="col col-qty align-center">QTY</div>
    
      </div>
      
      <div class="layout-inline row">
        
        <div class="col col-pro layout-inline">
          <img src="https://via.placeholder.com/150/0000FF/808080 ?Text=Digital.comC/O https://placeholder.com/" alt="" />
          <p>Pizza</p>
        </div>
        
        <div class="col col-price col-numeric align-center ">
          <p>@{{basePrice}} $</p>
        </div>

        <div class="col col-qty layout-inline">
          <a href="#" class="qty qty-minus" @click="takeOne">-</a>
            <input type="numeric" value="" v-model="qty"/>
          <a href="#" class="qty qty-plus" @click="addOne">+</a>
        </div>
       <div class="col col-total col-numeric"><p></p>
        </div>
      </div> 
  
  
       <div class="tf">
         <div class="row layout-inline">
          <div class="col"></div>
         </div>
          <div class="row layout-inline">
           <div class="col">
             <p>Total: @{{total}} $</p>
           </div>
           <div class="col"></div>
         </div>
       </div>         
  </div>
  <div class="menu">

    <div>
      <a href="#" class="btn btn-update" @@click="calc">Update cart</a> 
    </div>
     <div>
      <a href='http://localhost:3000/' class="btn btn-primary">Proceed to checkout</a>
    </div>
    <div>
      
    </div>
    
  </div>
  
</div>



  </div>
  </section>
   <script src="{{asset('js/myScript.js')}}"></script>
</body>
</html>






