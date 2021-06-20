@extends('layouts.guest-index')

@section('page-title')
    dropfood
@endsection

@section('content') 
  <div class="d-flex flex-wrap justify-content-center card_container mt-5 mb-5">
    <div v-for="element in userRestaurants">
      <div class="card rounded mt-3 border mr-3">
          <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/users/'+ element.id">
            <div class="card_image">
              <img :src="element.image_restaurant ? 'http://127.0.0.1:8000/storage/' + element.image_restaurant : 'http://lorempixel.com/400/300/food'" :alt="element.name_restaurant">
            </div>
            <div class="card-body">
              <h3>@{{element.name_restaurant}}</h3>
              <p>@{{element.name}}</p>
              <p>@{{element.address_restaurant}}</p>
              <p>Tel: @{{element.phone_restaurant}}</p>
              <p>@{{element.email}}</p>
              <p>P.Iva: @{{element.vat_number}}</p>
            </div>
          </a>
      </div>
    </div>
   </div>

   {{-- <div class="d-flex flex-wrap justify-content-center card_container mt-5 mb-5">
    <!-- ristoranti -->
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
        <div  class="card rounded mt-3 border mr-3">
            
              <div class="card_image">
                <img src="http://lorempixel.com/400/300/food" alt="">
              </div>
              <div class="card-body">
                <h3>Ristorante uno</h3>
                <p>Francesca</p>
                <p>Via carducci 28</p>
                <p>328/0963774</p>
                <p>Italiano</p>
              </div>
            </a>
        </div>
  </div> --}}

@endsection
