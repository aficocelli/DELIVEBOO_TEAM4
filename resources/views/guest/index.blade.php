@extends('layouts.guest-index')

@section('page-title')
    dropfood
@endsection

@section('content')


{{-- <div class="text-center no_risultati" v-show="userRestaurants.length == 0">
  <h3 class="" > Nessun risultato trovato, cerca per categoria!</h3>
</div> --}}

<!-- small selection dei ristoranti stampando i primi 8-->
<div class="text-center">
  <h3>La nostra top 10 dei ristoranti</h3>
</div>
<div class="carousel_selezione">
  <div class="chev chev_left" @@click="prev(min, max)">
    <i class="fas fa-chevron-left chev__link"></i>
  </div>

  <div class="wrapper_sezione">
    <div class="d-flex flex-no-wrap justify-content-center card_container mt-5 mb-5 mw-75">
      <div v-for="(element, index) in smallSelection.slice(min, max)">
        <div class="card rounded card_custom mt-3 border mr-3 card_container rounded-pill">
          <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/users/'+ element.id">
            <div class="card_image">
              <img :src="element.image_restaurant ? '@/assets/storage/' + element.image_restaurant : 'http://lorempixel.com/400/300/food'" :alt="element.name_restaurant">
            </div>
            <div class="card-body text-center">
              <h3>"@{{element.name_restaurant}}"</h3>
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
  </div>

  <div class="chev chev_right" @@click="next(min, max)">
    <i class="fas fa-chevron-right chev__link"></i>
  </div>
</div>

<!-- ristoranti filtrati tramite input e bottoni-->
<div id="box-scroll" class="d-flex flex-wrap justify-content-center card_container mt-5 mb-5 mw-75">
  <div v-for="element in userRestaurants">
    <div  class="card rounded card_custom mt-3 border mr-3 card_container rounded-pill">
      <a class="text-decoration-none text-reset" :href="'http://127.0.0.1:8000/users/'+ element.id">
        <div class="card_image">
          <img :src="element.image_restaurant ? 'http://127.0.0.1:8000/storage/' + element.image_restaurant : 'http://lorempixel.com/400/300/food'" :alt="element.name_restaurant">
        </div>
        <div class="card-body text-center">
          <h3>"@{{element.name_restaurant}}"</h3>
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

  <!-- back to top button -->
  <button class="back-to-top" @@click="backToTop" :class="chevronBackToTop ? 'back-to-top--active' : '' ">
    <i class="fas fa-chevron-up"></i>
  </button>
  <!-- /back to top button -->

@endsection
